<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MockExamTutor extends Model
{
    use HasFactory;

    protected $table = 'mock_exam_tutor';

    protected $guarded = [];

    public function mockExam()
    {
        return $this->belongsTo(MockExam::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
