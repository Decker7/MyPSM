<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    

    public function discover()
    {
        $alternatives = Activity::orderBy('created_at', 'desc')->get();
        return view('Main-HomePage.ViewDiscover', compact('alternatives'));
    }
    public function filterActivities(Request $request)
    {
        // Validate input weights
        $request->validate([
            'weight_activity_level' => 'required|numeric|min:0|max:100',
            'weight_budget' => 'required|numeric|min:0|max:100',
            'weight_time_frame' => 'required|numeric|min:0|max:100',
            'weight_rating' => 'required|numeric|min:0|max:100',
        ]);

        // Get all activities from database
        $activities = Activity::all();

        // Calculate MCDM scores
        $scoredActivities = $this->applyMCDM($activities, $request);

        // Update database with new scores
        DB::transaction(function () use ($scoredActivities) {
            foreach ($scoredActivities as $activity) {
                Activity::where('id', $activity['id'])
                    ->update(['score' => $activity['final_score']]);
            }
        });

        // Get sorted activities with updated scores
        $alternatives = Activity::whereIn('id', collect($scoredActivities)->pluck('id'))
            ->orderByDesc('score')
            ->get();

        return view('Main-HomePage.ViewDiscover', compact('alternatives'));
    }

    private function applyMCDM($activities, Request $request)
    {
        // Step 1: Extract and normalize weights
        $weights = $this->normalizeWeights([
            'activity_level' => $request->input('weight_activity_level'),
            'budget' => $request->input('weight_budget'),
            'time_frame' => $request->input('weight_time_frame'),
            'rating' => $request->input('weight_rating')
        ]);

        // Step 2: Create decision matrix
        $matrix = $this->createDecisionMatrix($activities);

        // Step 3: Normalize the decision matrix
        $normalizedMatrix = $this->normalizeMatrix($matrix);

        // Step 4: Calculate weighted normalized matrix and final scores
        $scoredActivities = [];
        foreach ($activities as $index => $activity) {
            $weightedScores = [
                'activity_level' => $normalizedMatrix['activity_level'][$index] * $weights['activity_level'],
                'budget' => $normalizedMatrix['budget'][$index] * $weights['budget'],
                'time_frame' => $normalizedMatrix['time_frame'][$index] * $weights['time_frame'],
                'rating' => $normalizedMatrix['rating'][$index] * $weights['rating']
            ];

            $finalScore = array_sum($weightedScores);

            $scoredActivities[] = [
                'id' => $activity->id,
                'name' => $activity->name,
                'final_score' => $finalScore,
                'criteria_scores' => $weightedScores
            ];
        }

        return $scoredActivities;
    }

    private function normalizeWeights($weights)
    {
        $total = array_sum($weights);
        return array_map(function ($weight) use ($total) {
            return $weight / $total;
        }, $weights);
    }

    private function createDecisionMatrix($activities)
    {
        $matrix = [
            'activity_level' => [],
            'budget' => [],
            'time_frame' => [],
            'rating' => []
        ];

        foreach ($activities as $activity) {
            $matrix['activity_level'][] = $this->getActivityLevelValue($activity->activity_level);
            $matrix['budget'][] = $activity->budget;
            $matrix['time_frame'][] = $this->getTimeFrameValue($activity->time_frame);
            $matrix['rating'][] = $activity->rating;
        }

        return $matrix;
    }

    private function normalizeMatrix($matrix)
    {
        $normalized = [];

        foreach ($matrix as $criterion => $values) {
            $max = max($values);
            $min = min($values);
            $range = $max - $min;

            if ($criterion == 'budget') {
                // For budget, lower is better (cost minimization)
                $normalized[$criterion] = array_map(function ($value) use ($max, $min, $range) {
                    return $range != 0 ? ($max - $value) / $range : 1;
                }, $values);
            } else {
                // For other criteria, higher is better
                $normalized[$criterion] = array_map(function ($value) use ($max, $min, $range) {
                    return $range != 0 ? ($value - $min) / $range : 1;
                }, $values);
            }
        }

        return $normalized;
    }

    private function getActivityLevelValue($level)
    {
        return [
            'Leisurely' => 1,
            'Moderate' => 2,
            'Challenging' => 3
        ][$level] ?? 2;
    }

    private function getTimeFrameValue($timeFrame)
    {
        return [
            'Short' => 1,
            'Medium' => 2,
            'Long' => 3
        ][$timeFrame] ?? 2;
    }
}
