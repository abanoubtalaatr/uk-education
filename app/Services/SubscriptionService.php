<?php

namespace App\Services;

use App\Models\SubscriptionTutor;

class SubscriptionService
{
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
