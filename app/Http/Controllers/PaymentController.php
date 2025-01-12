<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Activity;
use App\Models\Payment;
use App\Models\register;

use App\Models\Time;

use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{


    // Show the booking page with activity details
    public function showBookingPage($id)
    {
        $activity = Activity::findOrFail($id);

        // Access the currently authenticated user
        $user = Auth::user();

        // Retrieve times that match the activity_id
        $times = Time::where('activity_id', $id)->get();

        // Pass the activity details and times to the view
        return view('Manage-Booking-Activities.ViewBooking', compact('activity', 'user', 'times'));
    }

    public function processPayment(Request $request)
    {
        $bookingDetails = session('bookingData');
        $activityId = session('activity_id');
        $activity = Activity::findOrFail($activityId);

        $totalParticipants = ($bookingDetails['number-of-adults'] ?? 0) + ($bookingDetails['number-of-children'] ?? 0);
        $totalPrice = $activity->budget * $totalParticipants;

        // Set Stripe secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create Stripe Checkout Session
        $stripeSession = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                        'name' => $activity->name,
                        'description' => 'Booking for ' . $activity->name,
                    ],
                    'unit_amount' => $activity->budget * 100, // Convert to cents
                ],
                'quantity' => $totalParticipants,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success'),
            'cancel_url' => route('payment.cancel'),
        ]);

        return redirect($stripeSession->url);
    }

    public function showBookingSummary()
    {
        $bookingDetails = session('bookingData', []);
        $activityId = session('activity_id');

        if (!$bookingDetails || !$activityId) {
            return redirect()->route('activities.filter')->with('error', 'Booking details not found.');
        }

        $activity = Activity::findOrFail($activityId);
        $totalParticipants = ($bookingDetails['number-of-adults'] ?? 0) + ($bookingDetails['number-of-children'] ?? 0);
        $totalPrice = $activity->budget * $totalParticipants;

        $user = Auth::user();
        $firstName = $bookingDetails['first_name'] ?? $user->first_name ?? 'Guest';

        return view('Manage-Booking-Activities.ViewBookConfirm', compact('user', 'bookingDetails', 'activity', 'totalPrice'));
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'number_of_adults' => 'required|integer|min:0',
            'number_of_children' => 'required|integer|min:0',
            'date_time' => 'required|date',
            'total_price' => 'required|numeric',
            'special_requests' => 'nullable|string',
        ]);

        $activity = Activity::findOrFail($id);

        Payment::create([
            'activity_id' => $activity->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'number_of_adults' => $validated['number_of_adults'],
            'number_of_children' => $validated['number_of_children'],
            'date_time' => $validated['date_time'],
            'total_price' => $validated['total_price'],
            'special_requests' => $validated['special_requests'],
        ]);

        return redirect()->back()->with('success', 'Booking confirmed successfully!');
    }

    public function paymentSuccess()
    {
        $bookingDetails = session('bookingData', []);
        $activityId = session('activity_id');
        $totalPrice = session('total_price');

        if (!$bookingDetails || !$activityId) {
            return redirect()->route('activities.filter')->with('error', 'Booking details not found.');
        }

        $activity = Activity::findOrFail($activityId);

        Payment::create([
            'activity_id' => $activity->id,
            'user_id' => Auth::id(), // Store the currently authenticated user ID
            'first_name' => $bookingDetails['first_name'] ?? 'Guest',
            'last_name' => $bookingDetails['last_name'] ?? 'Guest',
            'email' => $bookingDetails['email'] ?? 'no-email@example.com',
            'phone' => $bookingDetails['phone'] ?? null,
            'number_of_adults' => $bookingDetails['number-of-adults'] ?? 0,
            'number_of_children' => $bookingDetails['number-of-children'] ?? 0,
            'date_time' => $bookingDetails['date_time'] ?? now()->toDateString(),
            'total_price' => $totalPrice,
            'special_requests' => $bookingDetails['special-requests'] ?? null,
        ]);

        session()->forget(['bookingData', 'activity_id', 'total_price']);

        return redirect()->route('discover')->with('success', 'Payment successful and booking confirmed!');
    }

    public function paymentCancel()
    {
        return redirect()->route('activities.filter')->with('error', 'Payment was canceled.');
    }


    public function storeBookingData(Request $request, $id)
    {
        $request->validate([
            'phone' => 'required|string|max:15',
            'number-of-adults' => 'required|integer|min:1',
            'number-of-children' => 'nullable|integer|min:0',
            'date_time' => 'required|date',
            'payment-method' => 'required|string|in:Pay with Card,Cash on Arrival',
        ]);

        $activity = Activity::findOrFail($id);

        $totalParticipants = ($request->input('number-of-adults', 0) + $request->input('number-of-children', 0));
        $totalPrice = $activity->budget * $totalParticipants;

        // Store booking data in session
        session([
            'bookingData' => $request->except('_token'),
            'activity_id' => $id,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('booking.confirm');
    }

    public function showBookingHistory()
    {
        // Access the currently authenticated user
        $user = Auth::user();

        // Ensure the user is authenticated, return an error if not
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view this page.');
        }

        // Retrieve bookings associated with the authenticated user
        $bookings = Payment::where('user_id', $user->id)
            ->with('activity') // Eager load the related activity
            ->get();

        // Retrieve the status from the `registers` table for each booking
        foreach ($bookings as $booking) {
            $register = register::where('booking_id', $booking->id)->first();
            $booking->status = $register ? $register->status : 'Not Registered'; // Default status if no match
        }



        // Pass the bookings (with status) to the view
        return view('Manage-Booking-Activities.ViewBookingHistory', compact('bookings'));
    }

    public function cancel($id)
    {
        $booking = Payment::findOrFail($id);
        $booking->delete(); // Or change the status to 'Cancelled'

        return redirect()->route('booking.history')->with('success', 'Booking cancelled successfully.');
    }

    public function displayBookingHistory()
    {
        // Access the currently authenticated user
        $user = Auth::user();

        // Ensure the user is authenticated, return an error if not
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view this page.');
        }

        // Retrieve the IDs of activities that belong to the authenticated user
        $activityIds = Activity::where('user_id', $user->id)->pluck('id');

        // Retrieve bookings for those activities
        $bookings = Payment::whereIn('activity_id', $activityIds)->with('activity')->get();

        // dd($bookings);

        // Remove the debug dump and return the view with bookings
        return view('Owner-Page.OwnerBookingHistory', compact('bookings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:Pending,Checked In,Checked Out',
        ]);

        $register = Register::findOrFail($id);
        $register->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Register status updated successfully.');
    }
}
