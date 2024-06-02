<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CrashCourseTutor extends Pivot
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'crash_course_tutor';

    public function crashCourse()
    {
        return $this->belongsTo(CrashCourse::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
