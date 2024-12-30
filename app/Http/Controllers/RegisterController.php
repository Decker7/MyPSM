<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Payment;

class RegisterController extends Controller
{
    public function create($bookingId)
    {
        $booking = Payment::findOrFail($bookingId);
        return view('Manage-Booking-Activities.ViewRegister', compact('booking'));
    }

    public function store(Request $request, $bookingId)
    {
        $request->validate([
            'approval_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone_number' => 'required|string|max:15|regex:/^\+?[0-9]{10,15}$/', // Ensure proper phone number validation
        ]);

        $booking = Payment::findOrFail($bookingId);

        // Handle file upload
        $fileName = time() . '_' . $request->file('approval_image')->getClientOriginalName();
        $filePath = $request->file('approval_image')->storeAs('uploads', $fileName, 'public');

        // Create the registration record with user_id = 2
        Register::create([
            'booking_id' => $booking->id,
            'approval_image' => $filePath,
            'phone_number' => $request->phone_number,
            'status' => 'Pending', // Default status value
            'user_id' => 2, // Set user_id to 2
        ]);

        return redirect()->route('booking.history')->with('success', 'You have successfully registered for the activity.');
    }
}
