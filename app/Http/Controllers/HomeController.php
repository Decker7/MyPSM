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
