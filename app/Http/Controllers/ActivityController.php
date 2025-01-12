<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Photo;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showDetails($id)
    {
        // Find the activity by ID
        $activity = Activity::findOrFail($id);

        // Retrieve the first photo for this activity
        $photo = Photo::where('activities_id', $id)->first();

        // Return the view with activity and photo
        return view('Manage-Booking-Activities.ViewDetailsActivity', compact('activity', 'photo'));
    }
}
