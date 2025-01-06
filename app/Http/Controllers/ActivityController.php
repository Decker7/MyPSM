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

        // Retrieve associated photos for this activity
        $photos = Photo::where('activities_id', $id)->get();

        // dd($activity);

        // Return the view with activity and photos
        return view('Manage-Booking-Activities.ViewDetailsActivity', compact('photos', 'activity'));
    }

  
}
