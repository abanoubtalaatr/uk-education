<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Testimonial;

class TestimonialPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('viewAnyTestimonial');
    }

    public function view(User $user, Testimonial $Testimonial)
    {
        return $user->can('viewTestimonial');
    }

    public function create(User $user)
    {
        return $user->can('createTestimonial');
    }

    public function update(User $user, Testimonial $Testimonial)
    {
        return $user->can('updateTestimonial');
    }

    public function delete(User $user, Testimonial $Testimonial)
    {
        return $user->can('deleteTestimonial');
    }
}
