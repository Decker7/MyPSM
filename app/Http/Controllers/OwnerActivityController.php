<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Time;

class OwnerActivityController extends Controller
{
    public function showOwnerActivityForm()
    {
        return view('Owner-Page.OwnerActivity');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'activity_level' => 'required|string|max:255',
            'budget' => 'required|numeric',
            'time_frame' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Create a new activity
        $activity = new Activity();
        $activity->user_id = auth()->user()->id;
        $activity->name = $validated['name'];
        $activity->activity_level = $validated['activity_level'];
        $activity->budget = $validated['budget'];
        $activity->time_frame = $validated['time_frame'];
        $activity->address = $validated['address'];
        $activity->description = $validated['description'];
        $activity->save();

        // Create a new time entry associated with the activity
        $time = new Time();
        $time->activity_id = $activity->id;
        $time->date = $validated['date'];
        $time->time = $validated['time'];
        $time->save();

        return redirect()->route('Owner.Activity')->with('success', 'Owner activity created successfully!');
    }
}
