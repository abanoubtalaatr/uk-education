<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyTopic');
    }

    public function view(User $user, Topic $Topic)
    {
        return $user->can('viewTopic');
    }

    public function create(User $user)
    {
        return $user->can('createTopic');
    }

    public function update(User $user, Topic $Topic)
    {
        return $user->can('updateTopic');
    }

    public function delete(User $user, Topic $Topic)
    {
        return $user->can('deleteTopic');
    }
}
