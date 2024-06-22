<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankScenario extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mockExams()
    {
        return $this->belongsToMany(MockExam::class, 'bank_scenario_mock_exams');
    }
}
