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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/api/holidays', [HolidayController::class, 'apiIndex']);


Route::get('/holidays', [HolidayController::class, 'index'])->name('holidays.index');

Route::get('/holidays/create', [HolidayController::class, 'create'])->name('holidays.create');
Route::post('/holidays', [HolidayController::class, 'store'])->name('holidays.store');
Route::get('/holidays/{holiday}/edit', [HolidayController::class, 'edit'])->name('holidays.edit');
Route::put('/holidays/{holiday}', [HolidayController::class, 'update'])->name('holidays.update');
Route::delete('/holidays/{holiday}', [HolidayController::class, 'destroy'])->name('holidays.destroy');


Auth::routes();
