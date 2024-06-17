<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\CourseTutor;

class CourseService
{
    /**
     * Get the total number of students in a subscription.
     *
     * @return int
     */
    public static function getAttendeesNumber($courseId)
    {
        return Booking::where('course_id', $courseId)->count();
    }

    /**
     * Get the total number of students in a specific subscription with a specific tutor.
     *
     * @param int $courseId
     * @param int $tutorId
     * @return int
     */
    public static function getTotalStudentsInCourseByTutor($courseId, $tutorId)
    {
        return CourseTutor::where('course_id', $courseId)->where('tutor_id', $tutorId)->count();
    }
}
