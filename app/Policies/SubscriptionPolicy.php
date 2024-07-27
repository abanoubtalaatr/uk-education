<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Subscription;

class SubscriptionPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnySubscription');
    }

    public function view(User $user, Subscription $Subscription)
    {
        return $user->can('viewSubscription');
    }

    public function create(User $user)
    {
        return $user->can('createSubscription');
    }

    public function update(User $user, Subscription $Subscription)
    {
        return $user->can('updateSubscription');
    }

    public function delete(User $user, Subscription $Subscription)
    {
        return $user->can('deleteSubscription');
    }
}
