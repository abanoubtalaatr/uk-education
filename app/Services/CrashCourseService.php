<?php

namespace App\Services;

use App\Models\CourseTutor;
use App\Models\CrashCourseTutor;

class CrashCourseService
{
    /**
     * Get the total number of students in a subscription.
     *
     * @return int
     */
    public static function getTotalStudentsInCrashCourse()
    {
        // Implement the logic here
    }

    /**
     * Get the total number of students in a specific subscription with a specific tutor.
     *
     * @param int $crashCourseId
     * @param int $tutorId
     * @return int
     */
    public static function getTotalStudentsInCrashCourseByTutor($crashCourseId, $tutorId)
    {
        return CrashCourseTutor::where('crash_course_id', $crashCourseId)->where('tutor_id', $tutorId)->count();
    }
}
