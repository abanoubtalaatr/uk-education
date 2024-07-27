<?php

namespace App\Models;


use App\Events\MyEvent;
use App\Events\MockExamCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MockExam extends Model
{
    use HasFactory;

    protected $guarded = [];

 
    protected $casts = [
        'mock_content' => 'array',
        'who_is_the_course_for' => 'array',
        'course_aims' => 'array',
        'learning_objectives' => 'array',
        'learning_outcomes' => 'array',
        'date' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($mockExam) {
            event(new MockExamCreated($mockExam));
        });

    }
    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'mock_exam_tutor');
    }

    public function scenarios()
    {
        return $this->belongsToMany(Scenario::class, 'scenario_mock_exams');
    }

    public function isBookedByAuthUser()
    {
        return $this->morphMany(Booking::class, 'bookable')
                    ->where('user_id', Auth::id());
    }

}
