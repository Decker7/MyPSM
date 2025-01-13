<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Payment;
use App\Models\Activity;
use App\Models\Code;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create($bookingId)
    {
        try {
            $booking = Payment::findOrFail($bookingId);
            return view('Manage-Booking-Activities.ViewRegister', compact('booking'));
        } catch (Exception $e) {
            return redirect()->route('booking.history')->with('error', 'Booking not found.');
        }
    }

    public function store(Request $request, $bookingId)
    {
        try {
            // Validate the input data
            $validated = $request->validate([
                'approval_code' => 'required|string|max:255',
                'phone_number' => ['required', 'string', 'max:15', 'regex:/^\+?[0-9]{10,15}$/'],
            ]);

            // Start a database transaction
            DB::beginTransaction();

            // Retrieve the booking record
            $booking = Payment::with('activity')->findOrFail($bookingId);

            // Check if the entered approval code exists and matches the activity
            $code = Code::where('code_number', $validated['approval_code'])
                ->where('activity_id', $booking->activity_id)
                ->first();

            if (!$code) {
                DB::rollBack();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid approval code for this activity. Please check and try again.');
            }

            // Check if the code has already been used
            $existingRegistration = Register::where('approval_code', $validated['approval_code'])->first();
            if ($existingRegistration) {
                DB::rollBack();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'This approval code has already been used.');
            }

            // Check if the user has already registered for this booking
            $existingBookingRegistration = Register::where('booking_id', $booking->id)->first();
            if ($existingBookingRegistration) {
                DB::rollBack();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'You have already registered for this activity.');
            }

            // Verify authentication
            if (!Auth::check()) {
                DB::rollBack();
                return redirect()->route('login')->with('error', 'You must be logged in to register.');
            }

            // Create the registration
            Register::create([
                'booking_id' => $booking->id,
                'approval_code' => $validated['approval_code'],
                'phone_number' => $validated['phone_number'],
                'status' => 'Pending',
                'user_id' => Auth::id(),
            ]);

            // Commit the transaction
            DB::commit();

            return redirect()->route('booking.history')
                ->with('success', 'You have successfully registered for the activity.');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while processing your registration. Please try again.');
        }
    }
}
