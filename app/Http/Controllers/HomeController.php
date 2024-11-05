<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function filterActivities(Request $request)
    {
        // Retrieve the query builder instance
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

        // dd($request->all());

        // Pass results to the view
        return view('Main-HomePage.ViewDiscover', ['activities' => $filteredActivities]);
    }
}
