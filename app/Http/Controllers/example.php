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


// MCDM

<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function filterActivities(Request $request)
    {
        // Fetch activities based on initial filter
        $query = Activity::query();

        // Apply filters if provided
        if ($request->has('activity_level')) {
            $query->whereIn('activity_level', $request->input('activity_level'));
        }
        if ($request->has('budget')) {
            $query->whereIn('budget_category', $request->input('budget'));
        }
        if ($request->has('time_frame')) {
            $query->whereIn('time_frame', $request->input('time_frame'));
        }
        if ($request->has('rating')) {
            $query->whereIn('rating_category', $request->input('rating'));
        }

        // Fetch all matching activities
        $activities = $query->get();

        // Apply MCDM if weights are provided
        $alternatives = $this->applyMCDM($activities, $request);

        return view('Main-HomePage.ViewDiscover', compact('alternatives'));
    }

    private function applyMCDM($activities, Request $request)
    {
        // Step 1 & 2: Alternatives and Criteria are already defined

        // Step 3: Determine levels for each criterion
        $weightActivityLevel = $request->input('weight_activity_level', 25) / 100;
        $weightBudget = $request->input('weight_budget', 25) / 100;
        $weightTimeFrame = $request->input('weight_time_frame', 25) / 100;
        $weightRating = $request->input('weight_rating', 25) / 100;

        // Validate total weights
        $totalWeight = $weightActivityLevel + $weightBudget + $weightTimeFrame + $weightRating;
        if (abs($totalWeight - 1) > 0.01) {
            // Normalize weights if they don't sum to 1
            $weightActivityLevel /= $totalWeight;
            $weightBudget /= $totalWeight;
            $weightTimeFrame /= $totalWeight;
            $weightRating /= $totalWeight;
        }

        // Step 4-7: Normalize and evaluate criteria
        $normalizedActivities = $activities->map(function ($activity) {
            return [
                'id' => $activity->id,
                'name' => $activity->name,
                'activity_level_score' => $this->normalizeActivityLevel($activity->activity_level),
                'budget_score' => $this->normalizeBudget($activity->budget),
                'time_frame_score' => $this->normalizeTimeFrame($activity->time_frame),
                'rating_score' => $this->normalizeRating($activity->rating)
            ];
        });

        // Step 8 & 9: Calculate weighted scores
        $scoredActivities = $normalizedActivities->map(function ($activity) use (
            $weightActivityLevel,
            $weightBudget,
            $weightTimeFrame,
            $weightRating
        ) {
            $weightedScore =
                ($activity['activity_level_score'] * $weightActivityLevel) +
                ($activity['budget_score'] * $weightBudget) +
                ($activity['time_frame_score'] * $weightTimeFrame) +
                ($activity['rating_score'] * $weightRating);

            return [
                'id' => $activity['id'],
                'name' => $activity['name'],
                'weighted_score' => $weightedScore
            ];
        });

        // Step 10: Rank alternatives
        $rankedActivities = $scoredActivities->sortByDesc('weighted_score');

        // Fetch full activity details for the top-ranked activities
        $alternativeIds = $rankedActivities->pluck('id');
        $alternatives = Activity::whereIn('id', $alternativeIds)
            ->orderByRaw('FIELD(id, ' . $alternativeIds->implode(',') . ')')
            ->get();

        return $alternatives;
    }

    // Normalization helper methods
    private function normalizeActivityLevel($level)
    {
        switch ($level) {
            case 'Leisurely':
                return 1.0;
            case 'Moderate':
                return 0.5;
            case 'Challenging':
                return 0.0;
            default:
                return 0.5;
        }
    }

    private function normalizeBudget($budget)
    {
        // Assuming budget is directly the price
        // You might want to adjust this based on your specific budget ranges
        $maxBudget = Activity::max('budget');
        $minBudget = Activity::min('budget');

        return $maxBudget > $minBudget
            ? (1 - ($budget - $minBudget) / ($maxBudget - $minBudget))
            : 0.5;
    }

    private function normalizeTimeFrame($timeFrame)
    {
        switch ($timeFrame) {
            case 'Short':
                return 1.0;
            case 'Medium':
                return 0.5;
            case 'Long':
                return 0.0;
            default:
                return 0.5;
        }
    }

    private function normalizeRating($rating)
    {
        // Normalize rating assuming 5 is the max
        return $rating / 5.0;
    }
}
