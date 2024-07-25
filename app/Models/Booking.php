<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function bookable()
    {
        return $this->morphTo();
    }

    public function getTypeAttribute()
    {
        switch ($this->bookable_type) {
            case 'App\Models\MockExam':
                return 'Mock Exam';
            case 'App\Models\Course':
                return 'Course';
            case 'App\Models\CrashCourse':
                return 'Crash Course';
            case 'App\Models\Subscription':
                return 'Subscription';
            default:
                return 'Unknown';
        }
    }

    // Define the accessor for 'details_route'
    public function getDetailsRouteAttribute()
    {
        switch ($this->bookable_type) {
            case 'App\Models\MockExam':
                return route('mock-exams.book-mock', ['mock' => $this->bookable_id]);
            case 'App\Models\Course':
                return route('courses.show', ['course' => $this->bookable_id]);
            case 'App\Models\CrashCourse':
                return route('crash-courses.show', ['crashCourse' => $this->bookable_id]);
            case 'App\Models\Subscription':
                return route('subscriptions.show', ['subscription' => $this->bookable_id]);
            default:
                return '#';
        }
    }

    public function getModelAttribute()
    {
        switch ($this->bookable_type) {
            case 'App\Models\MockExam':
                return MockExam::find($this->bookable_id);
            case 'App\Models\Course':
                return Course::find($this->bookable_id);
            case 'App\Models\CrashCourse':
                return CrashCourse::find($this->bookable_id);
            case 'App\Models\Subscription':
                return Subscription::find($this->bookable_id);
            default:
                return 'Unknown';
        }
    }
}
