<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/bookings/date', [BookingController::class, 'bookingsByDate']);
