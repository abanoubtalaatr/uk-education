<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\District;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'agenda' => $this->faker->paragraph,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'city_id' => City::factory()->create(),
            'district_id' => District::factory()->create(),
            'type_id' => Type::factory()->create(),
        ];
    }
}
