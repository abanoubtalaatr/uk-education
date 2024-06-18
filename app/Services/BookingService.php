<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\CourseTutor;

class BookingService
{
    public function store($data)
    {
        $booking = Booking::query()->create([
            'tutor_id' => $data['tutor_id'],
            'user_id' => $data['user_id'],
            'date' => $data['date'],
            'start_at' => $data['start_at'],
            'end_at' => $data['end_at'],
            'bookable_type' => $data['bookable_type'],
            'bookable_id' => $data['bookable_id'],
        ]);

        return $booking;
    }
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
