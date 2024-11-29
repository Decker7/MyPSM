<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        // Retrieve the authenticated user's ID
        $userId = auth()->user();

        // Pass the user ID to the view
        return view('Owner-Page.OwnerDashboard', ['userId' => $userId]);
    }
}
