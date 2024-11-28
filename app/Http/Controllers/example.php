<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function filterActivities(Request $request)
    {
        // Step 1: Retrieve and filter the data
        $activities = Activity::query();

        // Apply filters based on request inputs
        if ($request->filled('activity_level')) {
            $activities->whereIn('activity_level', $request->activity_level);
        }

        if ($request->filled('budget')) {
            $budgets = $request->budget;
            $activities->where(function ($query) use ($budgets) {
                if (in_array('Under $50', $budgets)) {
                    $query->orWhere('budget', '<', 50);
                }
                if (in_array('Over $100', $budgets)) {
                    $query->orWhere('budget', '>', 100);
                }
                if (in_array('Flexible Budget', $budgets)) {
                    $query->orWhereNotNull('budget'); // Match flexible criteria
                }
            });
        }

        if ($request->filled('time_frame')) {
            $activities->whereIn('time_frame', $request->time_frame);
        }

        // Retrieve the filtered activities
        $filteredActivities = $activities->get();

        if ($filteredActivities->isEmpty()) {
            return view('Main-HomePage.ViewDiscover', ['activities' => collect()]); // Return empty if no results
        }

        // Step 2: Prepare data for TOPSIS
        $decisionMatrix = [];
        foreach ($filteredActivities as $activity) {
            $decisionMatrix[] = [
                'budget' => $activity->budget, // Cost criterion
                'activity_level' => $this->mapActivityLevel($activity->activity_level), // Benefit criterion
                'time_frame' => $this->mapTimeFrame($activity->time_frame), // Benefit criterion
            ];
        }

        $weights = [0.4, 0.3, 0.3]; // Define weights for criteria
        $criteria = ['cost', 'benefit', 'benefit']; // Define criteria types

        // Step 3: Apply TOPSIS
        $rankedActivities = $this->applyTopsis($filteredActivities, $decisionMatrix, $weights, $criteria);

        // Step 4: Pass ranked activities to the view
        return view('Main-HomePage.ViewDiscover', ['activities' => $rankedActivities]);
    }

    /**
     * Map activity levels to numeric values.
     */
    private function mapActivityLevel($activityLevel)
    {
        return match ($activityLevel) {
            'Low' => 1,
            'Medium' => 2,
            'High' => 3,
            default => 0,
        };
    }

    /**
     * Map time frames to numeric values.
     */
    private function mapTimeFrame($timeFrame)
    {
        return match ($timeFrame) {
            'One Week' => 1,
            'Two Weeks' => 2,
            'One Month' => 3,
            default => 0,
        };
    }

    /**
     * Apply the TOPSIS algorithm.
     */
    private function applyTopsis($activities, $decisionMatrix, $weights, $criteria)
    {
        $matrix = collect($decisionMatrix);

        // Normalize the matrix
        $normalizedMatrix = $matrix->map(function ($row) use ($matrix) {
            return [
                'budget' => $row['budget'] / sqrt($matrix->sum(fn($r) => pow($r['budget'], 2))),
                'activity_level' => $row['activity_level'] / sqrt($matrix->sum(fn($r) => pow($r['activity_level'], 2))),
                'time_frame' => $row['time_frame'] / sqrt($matrix->sum(fn($r) => pow($r['time_frame'], 2))),
            ];
        });

        // Weighted normalized matrix
        $weightedMatrix = $normalizedMatrix->map(function ($row) use ($weights) {
            return [
                'budget' => $row['budget'] * $weights[0],
                'activity_level' => $row['activity_level'] * $weights[1],
                'time_frame' => $row['time_frame'] * $weights[2],
            ];
        });

        // Ideal and negative-ideal solutions
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

        // Calculate separation measures
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

        // Calculate closeness to the ideal solution
        $scores = $separation->map(fn($sep) => $sep['sMinus'] / ($sep['sPlus'] + $sep['sMinus']));

        // Rank activities by scores
        $rankedActivities = $activities->zip($scores)->sortByDesc(fn($pair) => $pair[1])->map(fn($pair) => $pair[0]);

        return $rankedActivities;
    }
}
