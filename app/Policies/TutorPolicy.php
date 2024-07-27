<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tutor;

class TutorPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyTutor');
    }

    public function view(User $user, Tutor $Tutor)
    {
        return $user->can('viewTutor');
    }

    public function create(User $user)
    {
        return $user->can('createTutor');
    }

    public function update(User $user, Tutor $Tutor)
    {
        return $user->can('updateTutor');
    }

    public function delete(User $user, Tutor $Tutor)
    {
        return $user->can('deleteTutor');
    }
}
