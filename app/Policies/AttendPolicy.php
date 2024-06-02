<?php

namespace App\Policies;

use App\Models\User;

class AttendPolicy
{
    public function attend(User $user): bool
    {
        return $user->is_admin;
    }
}
