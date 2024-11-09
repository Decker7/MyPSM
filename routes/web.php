<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\loginController;

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

Route::get('/Class', function () {
    return view('LaravelClass');
})->name('Class');

Route::get('/', function () {
    return view('Main-HomePage.ViewHome');
})->name('Home');

Route::get('/Contact', function () {
    return view('Main-HomePage.ViewContact');
})->name('Contact');

Route::get('/About', function () {
    return view('Main-HomePage.ViewAbout');
})->name('About');


Route::get('/Discover', [HomeController::class, 'filterActivities'])->name('activities.filter')->middleware(['auth', 'customer']);


Route::controller(LoginController::class)->group(function () {
    Route::get('/Register', 'register')->name('register');
    Route::post('/register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [App\Http\Controllers\loginController::class, 'profile'])->name('profile');
});
