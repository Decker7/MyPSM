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

        $user = auth()->user();  // This gives the entire user object, including the name


        // Count the total activities for the user
        $totalActivities = Activity::where('user_id', $userId)->count();

        $activities = Activity::where('user_id', $userId)->get();

        // Get all payments for the activities belonging to the user
        $totalRevenue = Payment::whereIn('activity_id', $activities->pluck('id'))->sum('total_price');


        // dd($totalRevenue);

        // Pass the total activities to the view
        return view('Owner-Page.OwnerDashboard', compact('totalActivities','user', 'totalRevenue'));
    }

    
}
