<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MockExam;

class MockExamPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyMockExam');
    }

    public function view(User $user, MockExam $MockExam)
    {
        return $user->can('viewMockExam');
    }

    public function create(User $user)
    {
        return $user->can('createMockExam');
    }

    public function update(User $user, MockExam $MockExam)
    {
        return $user->can('updateMockExam');
    }

    public function delete(User $user, MockExam $MockExam)
    {
        return $user->can('deleteMockExam');
    }
}
