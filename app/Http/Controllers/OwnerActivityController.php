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
            'time' => 'required|date_format:H:i'
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

    public function displayListActivity()
    {
        // Retrieve activities for the current logged-in user
        $activities = Activity::where('user_id', auth()->user()->id)->get();

        // Pass the activities to the view
        return view('Owner-Page.OwnerListActivity', compact('activities'));
    }

    public function edit($id)
    {
        // Retrieve the activity by ID, ensuring the current user owns it
        $activity = Activity::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        return view('Owner-Page.EditActivity', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'activity_level' => 'required|string|max:255',
            'budget' => 'required|numeric',
            'time_frame' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the activity and ensure the current user owns it
        $activity = Activity::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        // Update the activity
        $activity->update($validated);

        return redirect()->route('owner.list.activity')->with('success', 'Activity updated successfully!');
    }

    public function destroy($id)
    {
        // Fetch the activity by ID and ensure it's owned by the authenticated user
        $activity = Activity::where('id', $id)->where('user_id', auth()->id())->first();

        if ($activity) {
            // Delete the activity from the database
            $activity->delete();

            // Redirect back with a success message
            return redirect()->route('owner.list.activity')->with('success', 'Activity deleted successfully!');
        } else {
            // If activity not found or user doesn't own it, redirect with error message
            return redirect()->route('owner.list.activity')->with('error', 'Activity not found or you don’t have permission to delete it.');
        }
    }
}
