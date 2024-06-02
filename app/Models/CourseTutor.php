<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTutor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'course_tutor';

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
