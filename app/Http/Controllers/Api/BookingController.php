<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function getMonthlyBookings(Request $request)
    {
        $year = $request->input('year', Carbon::now()->year);

        $bookings = Booking::whereYear('created_at', $year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get()
            ->pluck('count', 'month');

        return response()->json($bookings);
    }
}
