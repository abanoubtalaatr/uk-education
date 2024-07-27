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

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class,'subscription_tutor');
    }

    public function progress()
    {
        return $this->hasManyThrough(StudentProgress::class, Topic::class);
    }
}
