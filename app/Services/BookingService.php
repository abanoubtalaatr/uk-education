<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\CourseTutor;

class BookingService
{
    /**
     * Get the total number of students in a booking.
     *
     * @return int
     */
    public static function getAttendeesNumberInCourse($courseId)
    {
        return Booking::where('bookable_type', "App\Models\Course")->where('bookable_id', $courseId)->count();
    }

    /**
     * Get the total number of students in a subscription.
     *
     * @return int
     */
    public static function getAttendeesNumberInMockExam($mockExamId)
    {
        return Booking::where('bookable_type', "App\Models\MockExam")->where('bookable_id', $mockExamId)->count();
    }

    /**
     * Get the total number of students in a subscription.
     *
     * @return int
     */
    public static function getAttendeesNumberInCrashCourse($crashCourseId)
    {
        return Booking::where('bookable_type', "App\Models\MockExam")->where('bookable_id', $crashCourseId)->count();
    }

    /**
     * Get the total number of students in a subscription.
     *
     * @return int
     */
    public static function getAttendeesNumberInSubscription($subscriptionId)
    {
        return Booking::where('bookable_type', "App\Models\Subscription")->where('bookable_id', $subscriptionId)->count();
    }
}
