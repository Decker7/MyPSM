<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\OwnerActivityController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file defines all web routes for the application.
| Routes are organized into several key sections:
| 1. Public Routes
| 2. Authentication Routes
| 3. Authenticated User Routes
| 4. Booking Routes
| 5. Owner Routes
|
*/

// ========== PUBLIC ROUTES ==========
// Accessible without authentication
Route::get('/', function () {
    return view('Main-HomePage.ViewHome');
})->name('Home');  // Homepage route

Route::get('/Contact', function () {
    return view('Main-HomePage.ViewContact');
})->name('Contact');  // Contact page route

Route::get('/About', function () {
    return view('Main-HomePage.ViewAbout');
})->name('About');  // About page route

Route::get('/Discover', [HomeController::class, 'filterActivities'])
    ->name('activities.filter');  // Activity discovery and filtering route

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');  // Contact form submission route

// ========== AUTHENTICATION ROUTES ==========
Route::controller(LoginController::class)->group(function () {
    Route::get('/Register', 'register')->name('register');  // Registration form
    Route::post('/register', 'registerSave')->name('register.save');  // Registration submission

    Route::get('login', 'login')->name('login');  // Login form
    Route::post('login', 'loginAction')->name('login.action');  // Login submission

    Route::post('/logout', 'logout')->middleware('auth')->name('logout');  // Logout route
});

// ========== AUTHENTICATED USER ROUTES ==========
Route::middleware('auth')->group(function () {
    // Dashboard Route
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::get('/Profile', [LoginController::class, 'profile'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // ========== BOOKING ROUTES ==========
    // Booking page and process routes
    Route::get('/Booking/{id}', [PaymentController::class, 'showBookingPage'])
        ->name('booking.page');

    Route::get('/BookConfirm', [PaymentController::class, 'showBookingSummary'])
        ->name('booking.confirm');

    Route::post('/Booking/{id}', [PaymentController::class, 'storeBookingData'])
        ->name('booking.details');

    Route::post('/SendBooking/{id}', [PaymentController::class, 'sendBooking'])
        ->name('booking.next');

    Route::post('/ProceedToPayment', [PaymentController::class, 'processPayment'])
        ->name('booking.payment');

    // Booking storage and confirmation routes
    Route::post('/bookings/store/{id}', [PaymentController::class, 'store'])
        ->name('bookings.store');

    Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])
        ->name('payment.success');
    Route::get('/payment-cancel', [PaymentController::class, 'paymentCancel'])
        ->name('payment.cancel');

    // Booking history routes
    Route::get('/BookingHistory', [PaymentController::class, 'showBookingHistory'])
        ->name('booking.history');

    Route::delete('/bookings/{id}/cancel', [PaymentController::class, 'cancel'])
        ->name('bookings.cancel');

    // ========== OWNER ROUTES ==========
    Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])
        ->name('Owner.Dashboard');

    Route::get('/owner/activity', [OwnerActivityController::class, 'ShowOwnerActivityForm'])
        ->name('Owner.Activity');

    Route::post('/owner/activities', [OwnerActivityController::class, 'store'])
        ->name('owner.activities.store');

    Route::get('/owner/booking-history', [PaymentController::class, 'displayBookingHistory'])
        ->name('owner.booking.history');
});
