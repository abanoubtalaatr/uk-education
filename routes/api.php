<?php

use Illuminate\Support\Facades\Route;


// Route::get('/bookings/date', [BookingController::class, 'bookingsByDate']);
Route::get('/bookings/monthly', [\App\Http\Controllers\Api\BookingController::class, 'getMonthlyBookings']);
