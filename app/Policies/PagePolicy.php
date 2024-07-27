<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;

class PagePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyPage');
    }

    public function view(User $user, Page $Page)
    {
        return $user->can('viewPage');
    }

    public function create(User $user)
    {
        return $user->can('createPage');
    }

    public function update(User $user, Page $Page)
    {
        return $user->can('updatePage');
    }

    public function delete(User $user, Page $Page)
    {
        return $user->can('deletePage');
    }
}
