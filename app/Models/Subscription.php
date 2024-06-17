<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class,'subscription_tutor');
    }
}
