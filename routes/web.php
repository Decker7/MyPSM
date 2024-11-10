<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Models\Activity;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes (Accessible without authentication)
// Routes that are available for all users (no login required)

Route::get('/', function () {
    return view('Main-HomePage.ViewHome');
})->name('Home');  // Homepage route

Route::get('/Contact', function () {
    return view('Main-HomePage.ViewContact');
})->name('Contact');  // Contact page route

Route::get('/About', function () {
    return view('Main-HomePage.ViewAbout');
})->name('About');  // About page route

Route::get('/Booking', function () {
    return view('Manage-Booking-Activities.ViewBooking');
})->name('Booking');  //  Booking route

// Activity Discovery Route
Route::get('/Discover', [HomeController::class, 'filterActivities'])->name('activities.filter');
// Route for filtering and discovering activities

// Authentication Routes (Login/Register)
// Routes for registration, login, and logout (all are part of user authentication)

Route::controller(LoginController::class)->group(function () {
    Route::get('/Register', 'register')->name('register');  // Registration form route
    Route::post('/register', 'registerSave')->name('register.save');  // Handle registration form submission

    Route::get('login', 'login')->name('login');  // Login form route
    Route::post('login', 'loginAction')->name('login.action');  // Handle login form submission

    Route::post('/logout', 'logout')->middleware('auth')->name('logout');  // Logout route (requires authentication)
});

// Authenticated Routes (Requires user to be logged in)
// Routes that require user authentication (middleware ensures only logged-in users can access)

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');  // Dashboard route, accessible only for authenticated users

    // Profile Routes
    Route::get('/Profile', [LoginController::class, 'profile'])->name('profile');  // Show user profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');  // Profile page route
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');  // Handle profile update
});

