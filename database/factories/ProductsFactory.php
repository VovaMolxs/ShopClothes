<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = random_int(80, 200);
        $promotional_price = $price - 25;
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text(40),
            'regular_price' => $price,
            'promotional_price' => $promotional_price,
            'currency' => 'USD',
            'tax_rate' => random_int(1,20),
            'width' => random_int(5,20),
            'height' => random_int(5,20),
            'weight' => random_int(5,20),
            'shipping_fees' => random_int(5,20),
            'status' => 'active',
            'rating' => random_int(1, 10),
            'count_reviews' => random_int(3, 30),
            'selling' => random_int(0, 300),
            'link_image' => $this->faker->imageUrl,
            'category_id' => Categories::inRandomOrder()->first()->id,
            'tags' => $this->faker->word(3),

        ];
    }
}
