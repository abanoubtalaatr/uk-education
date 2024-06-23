<?php

namespace Database\Factories;

use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TutorFactory extends Factory
{
    protected $model = Tutor::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'whats_app_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // or use Hash::make('password')
        ];
    }
}
