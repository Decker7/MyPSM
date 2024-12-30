<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use App\Models\Contact;





use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function DashboardView()
    {
        // Retrieve data from the database
        $totalActivities = Activity::count(); // Count total activities
        $totalUsers = User::count();         // Count total users
        $totalFeedback = Contact::count();  // Count total feedback

        // Retrieve recent data
        $recentActivities = Activity::latest()->take(5)->get(); // Get 5 most recent activities
        $recentFeedback = Contact::latest()->take(5)->get();    // Get 5 most recent feedbacks
        $recentUsers = User::latest()->take(5)->get();          // Get 5 most recent users

        // Pass data to the view
        return view('Admin-Page.AdminDashboard', compact(
            'totalActivities',
            'totalUsers',
            'totalFeedback',
            'recentActivities',
            'recentFeedback',
            'recentUsers'
        ));
    }


    // View all activities
    public function listActivities()
    {
        $activities = Activity::all();
        return view('Admin-Page.AdminListActivity', compact('activities'));
    }

    // Update activity
    public function updateActivity(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $activity->update([
            'name' => $request->name,
            'activity_level' => $request->activity_level,
            'budget' => $request->budget,
            'time_frame' => $request->time_frame,
            'address' => $request->address,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);

        return redirect()->route('admin.activities.list')->with('success', 'Activity updated successfully.');
    }

    // Delete activity
    public function deleteActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()->route('admin.activities.list')->with('success', 'Activity deleted successfully.');
    }

    // List all users
    public function listUsers()
    {
        $users = User::all();
        return view('Admin-Page.AdminListUser', compact('users'));
    }

    // Show edit form for a user
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('Admin-Page.AdminEditUser', compact('user'));
    }

    // Update user details
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['first_name', 'last_name', 'name', 'email', 'user_type', 'bio']));
        return redirect()->route('admin.users.list')->with('success', 'User updated successfully');
    }

    // Delete a user
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.list')->with('success', 'User deleted successfully');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_type' => 'required|in:admin,activity_owner,customer',
        ]);

        User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'user_type' => $validated['user_type'],
            'password' => bcrypt('password123'), // Default password, you can make it configurable.
        ]);

        return redirect()->route('admin.users.list')->with('success', 'User created successfully!');
    }

    public function listFeedback()
    {
        $feedbacks = Contact::all();
        return view('Admin-Page.AdminListFeedback', compact('feedbacks'));
    }

    public function editFeedback($id)
    {
        $feedback = Contact::findOrFail($id);
        return view('Admin-Page.EditFeedback', compact('feedback'));
    }

    public function updateFeedback(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $feedback = Contact::findOrFail($id);
        $feedback->update($request->all());

        return redirect()->route('admin.feedback.list')->with('success', 'Feedback updated successfully!');
    }

    public function deleteFeedback($id)
    {
        $feedback = Contact::findOrFail($id);
        $feedback->delete();

        return redirect()->route('admin.feedback.list')->with('success', 'Feedback deleted successfully!');
    }
}
