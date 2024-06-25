<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    protected $casts = [
        'course_content' => 'array',
        'who_is_the_course_for' => 'array',
        'course_aims' => 'array',
        'learning_objectives' => 'array',
        'learning_outcomes' => 'array',
        'date' => 'datetime'
    ];
    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'course_tutor');
    }
}
