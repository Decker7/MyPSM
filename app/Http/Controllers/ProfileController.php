<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show profile page
    public function show()
    {
        return view('Manage-Profile.ViewProfile');
    }

    // Update profile information
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate inputs with a rule that requires 'current_password' for any update
        $request->validate([
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'current_password' => 'required|current_password', // Now required for any changes
            'new_password' => 'nullable|string|min:6|confirmed', // Optional if new password is being set
        ], [
            'current_password.required' => 'You need to enter your current password to save any changes.',
            'current_password.current_password' => 'Your current password is incorrect.',
        ]);

        // Update profile information only if 'current_password' is provided and correct
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->bio = $request->input('bio');
        
        // Update password if new_password is filled and current password is provided
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
