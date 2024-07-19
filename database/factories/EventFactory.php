<?php

namespace Database\Factories;

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
            'thumbnail' => 'https://placehold.co/1080x400',
            'title' => fake()->word(),
            'content' => fake()->text(),
            'starting_date' => fake()->dateTime(),
            'ending_date' => fake()->dateTime(),
            'archived' => 0
        ];
    }
}
