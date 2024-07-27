<?php

namespace App\Policies;

use App\Models\User;
use Outl1ne\NovaSettings\NovaSettings;

class SettingPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnySetting');
    }

    public function view(User $user, NovaSettings $Setting)
    {
        return $user->can('viewSetting');
    }

    public function create(User $user)
    {
        return $user->can('createSetting');
    }

    public function update(User $user, NovaSettings $Setting)
    {
        return $user->can('updateSetting');
    }

    public function delete(User $user, NovaSettings $Setting)
    {
        return $user->can('deleteSetting');
    }
}
