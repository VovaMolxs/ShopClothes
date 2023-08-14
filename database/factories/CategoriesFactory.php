<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Categories>
 */
class CategoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(10),
            'parent_id' => '',
            'slug' => $this->faker->slug,
            'h1_title' => $this->faker->text(15),
            'desc_title' => $this->faker->text(30),

        ];
    }
}
