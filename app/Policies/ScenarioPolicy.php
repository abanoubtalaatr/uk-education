<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Scenario;

class ScenarioPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyScenario');
    }

    public function view(User $user, Scenario $Scenario)
    {
        return $user->can('viewScenario');
    }

    public function create(User $user)
    {
        return $user->can('createScenario');
    }

    public function update(User $user, Scenario $Scenario)
    {
        return $user->can('updateScenario');
    }

    public function delete(User $user, Scenario $Scenario)
    {
        return $user->can('deleteScenario');
    }
}
