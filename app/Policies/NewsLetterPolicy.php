<?php

namespace App\Policies;

use App\Models\User;
use App\Models\NewsLetter;

class NewsLetterPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyNewsLetter');
    }

    public function view(User $user, NewsLetter $NewsLetter)
    {
        return $user->can('viewNewsLetter');
    }

    public function create(User $user)
    {
        return $user->can('createNewsLetter');
    }

    public function update(User $user, NewsLetter $NewsLetter)
    {
        return $user->can('updateNewsLetter');
    }

    public function delete(User $user, NewsLetter $NewsLetter)
    {
        return $user->can('deleteNewsLetter');
    }
}
