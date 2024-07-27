<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use App\Models\Contact;

class ContactPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyContact');
    }

    public function view(User $user, Contact $Contact)
    {
        return $user->can('viewContact');
    }

    public function create(User $user)
    {
        return $user->can('createContact');
    }

    public function update(User $user, Contact $Contact)
    {
        return $user->can('updateContact');
    }

    public function delete(User $user, Contact $Contact)
    {
        return $user->can('deleteContact');
    }
}
