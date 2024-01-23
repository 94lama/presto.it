<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'title'=> fake()->name(),
            /* 'slug_title'=> */
            'body'=> fake()->paragraph(),
            'price'=> fake()->numberBetween(1, 1000),
            'user_id'=>fake()->numberBetween(1, 5),
            'category_id'=>fake()->numberBetween(1, 10),
        ];
    }
}
