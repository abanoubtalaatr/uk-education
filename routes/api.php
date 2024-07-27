<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;


// Route::get('/bookings/date', [BookingController::class, 'bookingsByDate']);
Route::get('/bookings/monthly', [\App\Http\Controllers\Api\BookingController::class, 'getMonthlyBookings']);

Route::apiResource('todos', TodoController::class);
