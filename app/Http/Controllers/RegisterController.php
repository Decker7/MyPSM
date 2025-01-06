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
            // Find the booking based on the booking ID
            $booking = Payment::findOrFail($bookingId);
            return view('Manage-Booking-Activities.ViewRegister', compact('booking'));
        } catch (Exception $e) {
            // Redirect to the booking history page with an error if booking not found
            return redirect()->route('booking.history')->with('error', 'Booking not found.');
        }
    }

    public function store(Request $request, $bookingId)
    {
        try {
            // Validate the input data for approval code and phone number
            $validated = $request->validate([
                'approval_code' => 'required|string|max:255',
                'phone_number' => ['required', 'string', 'max:15', 'regex:/^\+?[0-9]{10,15}$/'],
            ]);

            // Start a database transaction to handle the process atomically
            DB::beginTransaction();

            // Retrieve the booking record based on the booking ID
            $booking = Payment::findOrFail($bookingId);

            // Check if the entered approval code exists in the Code table
            $code = Code::where('code_number', $validated['approval_code'])->first();

            if (!$code) {
                DB::rollBack();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid approval code. Please check and try again.');
            }

            // Retrieve the associated activity for this code
            $activity = Activity::find($code->activity_id);

            if (!$activity) {
                DB::rollBack();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid activity associated with this code.');
            }

            // Check if the user has already registered for the activity using the same booking ID and approval code
            $existingRegistration = Register::where('booking_id', $booking->id)
                ->where('approval_code', $validated['approval_code'])
                ->first();

            if ($existingRegistration) {
                DB::rollBack();
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'You have already registered for this activity.');
            }

            // Check if the user is authenticated before proceeding with registration
            if (!Auth::check()) {
                DB::rollBack();
                return redirect()->route('login')->with('error', 'You must be logged in to register.');
            }

            // Create a new registration record in the Register table
            Register::create([
                'booking_id' => $booking->id,
                'approval_code' => $validated['approval_code'],
                'phone_number' => $validated['phone_number'],
                'status' => 'Pending',  // You can adjust this if needed
                'user_id' => Auth::id(),  // Assign the authenticated user's ID
            ]);


            // Commit the transaction to persist the data in the database
            DB::commit();

            // Redirect to the booking history page with a success message
            return redirect()->route('booking.history')
                ->with('success', 'You have successfully registered for the activity.');
        } catch (Exception $e) {
            // In case of error, roll back the transaction and show an error message
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while processing your registration. Please try again.');
        }
    }
}
