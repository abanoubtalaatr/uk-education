<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->query('year', date('Y'));
        $bookings = Booking::whereYear('date', $year)->get();
        dd($bookings);
        return $bookings;
    }

    public function bookingsByDate(Request $request)
    {
        dd('fdlskjfds');
        $date = $request->query('date');
        $bookings = Booking::whereDate('date', $date)->with('user', 'tutor')->get();
        dd($bookings);
        return $bookings;
    }
}
