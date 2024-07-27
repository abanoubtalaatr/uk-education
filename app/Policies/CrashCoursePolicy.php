<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CrashCourse;

class CrashCoursePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyCrashCourse');
    }

    public function view(User $user, CrashCourse $course)
    {
        return $user->can('viewCrashCourse');
    }

    public function create(User $user)
    {
        return $user->can('createCrashCourse');
    }

    public function update(User $user, CrashCourse $course)
    {
        return $user->can('updateCrashCourse');
    }

    public function delete(User $user, CrashCourse $course)
    {
        return $user->can('deleteCrashCourse');
    }
}
