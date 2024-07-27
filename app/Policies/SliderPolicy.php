<?php

namespace App\Policies;

use App\Models\Slider;
use App\Models\User;
use Outl1ne\NovaSliders\NovaSliders;

class SliderPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnySlider');
    }

    public function view(User $user, Slider $slider)
    {
        return $user->can('viewSlider');
    }

    public function create(User $user)
    {
        return $user->can('createSlider');
    }

    public function update(User $user, Slider $slider)
    {
        return $user->can('updateSlider');
    }

    public function delete(User $user, Slider $slider)
    {
        return $user->can('deleteSlider');
    }
}
