<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function filterActivities(Request $request)
    {
        // Retrieve all activities for ranking
        $allActivities = Activity::all();

        // Extract weights from request and normalize them to sum up to 1 for processing.
        $weights = [
            $request->input('weight_activity_level', 33) / 10,
            $request->input('weight_budget', 33) / 10,
            $request->input('weight_time_frame', 33) / 10,
        ];

        // Normalize weights to ensure they sum to 1
        $totalWeight = array_sum($weights);
        if ($totalWeight > 0) {
            $weights = array_map(fn($w) => $w / $totalWeight, $weights);
        } else {
            return back()->withErrors(['Weights must sum to more than zero.']);
        }

        // Map filters
        $selectedActivityLevels = $request->get('activity_level', []);
        $selectedBudgets = $request->get('budget', []);
        $selectedTimeFrames = $request->get('time_frame', []);

        // Prepare decision matrix including all activities
        $decisionMatrix = $allActivities->map(function ($activity) use ($selectedActivityLevels, $selectedBudgets, $selectedTimeFrames) {
            return [
                'budget' => $this->mapBudget($activity->budget, $selectedBudgets),
                'activity_level' => in_array($activity->activity_level, $selectedActivityLevels) ? 1 : 0,
                'time_frame' => in_array($activity->time_frame, $selectedTimeFrames) ? 1 : 0,
            ];
        })->all();

        // Apply TOPSIS to rank activities based on filter matches
        $rankedActivities = $this->applyTopsis($allActivities, $decisionMatrix, $weights, ['benefit', 'benefit', 'benefit']);

        // Pass ranked activities to the view
        return view('Main-HomePage.ViewDiscover', ['activities' => $rankedActivities]);
    }

    private function mapBudget($activityBudget, $selectedBudgets)
    {
        if (in_array('Under $50', $selectedBudgets) && $activityBudget < 50) {
            return 1;
        } elseif (in_array('Over $100', $selectedBudgets) && $activityBudget > 100) {
            return 1;
        } elseif (in_array('Flexible Budget', $selectedBudgets)) {
            return 1;
        }
        return 0;
    }

    private function mapActivityLevel($activityLevel)
    {
        return match ($activityLevel) {
            'Low' => 1,
            'Medium' => 2,
            'High' => 3,
            default => 0,
        };
    }

    private function mapTimeFrame($timeFrame)
    {
        return match ($timeFrame) {
            'One Week' => 1,
            'Two Weeks' => 2,
            'One Month' => 3,
            default => 0,
        };
    }

    private function applyTopsis($activities, $decisionMatrix, $weights, $criteria)
    {
        $matrix = collect($decisionMatrix);

        // Normalize the decision matrix
        $normalizedMatrix = $matrix->map(function ($row) use ($matrix) {
            return [
                'budget' => $this->safeDivide($row['budget'], sqrt($matrix->sum(fn($r) => pow($r['budget'], 2)))),
                'activity_level' => $this->safeDivide($row['activity_level'], sqrt($matrix->sum(fn($r) => pow($r['activity_level'], 2)))),
                'time_frame' => $this->safeDivide($row['time_frame'], sqrt($matrix->sum(fn($r) => pow($r['time_frame'], 2)))),
            ];
        });

        // Apply weights
        $weightedMatrix = $normalizedMatrix->map(function ($row) use ($weights) {
            return [
                'budget' => $row['budget'] * $weights[0],
                'activity_level' => $row['activity_level'] * $weights[1],
                'time_frame' => $row['time_frame'] * $weights[2],
            ];
        });

        // Determine ideal and negative-ideal solutions
        $ideal = [
            'budget' => $weightedMatrix->min('budget'),
            'activity_level' => $weightedMatrix->max('activity_level'),
            'time_frame' => $weightedMatrix->max('time_frame'),
        ];
        $negativeIdeal = [
            'budget' => $weightedMatrix->max('budget'),
            'activity_level' => $weightedMatrix->min('activity_level'),
            'time_frame' => $weightedMatrix->min('time_frame'),
        ];

        // Separation measures
        $separation = $weightedMatrix->map(function ($row) use ($ideal, $negativeIdeal) {
            $sPlus = sqrt(
                pow($row['budget'] - $ideal['budget'], 2) +
                    pow($row['activity_level'] - $ideal['activity_level'], 2) +
                    pow($row['time_frame'] - $ideal['time_frame'], 2)
            );
            $sMinus = sqrt(
                pow($row['budget'] - $negativeIdeal['budget'], 2) +
                    pow($row['activity_level'] - $negativeIdeal['activity_level'], 2) +
                    pow($row['time_frame'] - $negativeIdeal['time_frame'], 2)
            );
            return ['sPlus' => $sPlus, 'sMinus' => $sMinus];
        });

        // Closeness coefficient
        $scores = $separation->map(fn($sep) => $this->safeDivide($sep['sMinus'], $sep['sPlus'] + $sep['sMinus']));

        // Rank activities
        $rankedActivities = $activities->zip($scores)->sortByDesc(fn($pair) => $pair[1])->map(fn($pair) => $pair[0]);

        return $rankedActivities;
    }

    private function safeDivide($numerator, $denominator)
    {
        return $denominator == 0 ? 0 : $numerator / $denominator;
    }
}
