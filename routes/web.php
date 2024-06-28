<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeController;

Route::resource('users', UserController::class);
Route::resource('holidays', HolidayController::class);



Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/api/holidays', [HolidayController::class, 'apiIndex']);


Auth::routes();