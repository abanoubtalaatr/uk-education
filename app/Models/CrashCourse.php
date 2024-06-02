<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrashCourse extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['date' => 'datetime'];

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }
}
