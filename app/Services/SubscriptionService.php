<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\SubscriptionTutor;

class SubscriptionService
{
    public static function isSubscribe($subscriptionId)
    {
        return Booking::where('bookable_type', "App\Models\Subscription")->where('bookable_id', $subscriptionId)->where('user_id', auth('web')->id())->exists();
    }
    /**
     * Get the total number of students in a subscription.
     *
     * @return int
     */
    public static function getTotalStudentsInSubscription()
    {
        // Implement the logic here
    }

    /**
     * Get the total number of students in a specific subscription with a specific tutor.
     *
     * @param int $subscriptionId
     * @param int $tutorId
     * @return int
     */
    public static function getTotalStudentsInSubscriptionByTutor($subscriptionId, $tutorId)
    {
        return SubscriptionTutor::where('subscription_id', $subscriptionId)->where('tutor_id', $tutorId)->count();
    }
}
