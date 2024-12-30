<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Payment;
use Illuminate\Http\Request;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->id();

        // Get the authenticated user object
        $user = auth()->user();

        // Count the total activities for the user
        $totalActivities = Activity::where('user_id', $userId)->count();

        // Retrieve all activities for the user
        $activities = Activity::where('user_id', $userId)->get();

        // Calculate the total revenue for the user's activities
        $totalRevenue = Payment::whereIn('activity_id', $activities->pluck('id'))->sum('total_price');

        // Count the number of upcoming bookings
        $upcomingBookings = Payment::whereIn('activity_id', $activities->pluck('id'))->count();

        // Prepare data for analytics (e.g., graphs)
        $activityData = $activities->groupBy('activity_level')->map(function ($group) {
            return $group->count();
        });

        $budgetData = $activities->groupBy('budget')->map(function ($group) {
            return $group->count();
        });

        // Pass the data to the view
        return view('Owner-Page.OwnerDashboard', compact(
            'totalActivities',
            'user',
            'totalRevenue',
            'upcomingBookings',
            'activityData',
            'budgetData'
        ));
    }
}
