<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;


Route::get('/bookings/date', [BookingController::class, 'bookingsByDate']);
Route::get('/bookings/monthly', [BookingController::class, 'getMonthlyBookings']);
