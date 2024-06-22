<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockExam extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['date' => 'datetime'];

    public function bookings()
    {
        return $this->morphMany(Booking::class, 'bookable');
    }

    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'mock_exam_tutor');
    }

    public function bankScenarios()
    {
        return $this->belongsToMany(BankScenario::class, 'bank_scenario_mock_exams');
    }
}
