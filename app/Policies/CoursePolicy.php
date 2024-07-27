<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;

class CoursePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyCourse');
    }

    public function view(User $user, Course $course)
    {
        return $user->can('viewCourse');
    }

    public function create(User $user)
    {
        return $user->can('createCourse');
    }

    public function update(User $user, Course $course)
    {
        return $user->can('updateCourse');
    }

    public function delete(User $user, Course $course)
    {
        return $user->can('deleteCourse');
    }
}
