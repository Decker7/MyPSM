<?php

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

Route::get('/', function () {
    return view('Main-HomePage.ViewHome');
})->name('Home');

Route::get('/Contact', function () {
    return view('Main-HomePage.ViewContact');
})->name('Contact');

Route::get('/About', function () {
    return view('Main-HomePage.ViewAbout');
})->name('About');

Route::get('/Discover', function () {
    return view('Main-HomePage.ViewDiscover');
})->name('Discover');




