<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = ['lounge', 'toilet', 'bedroom', 'office', 'kitchen'];
        $color = ['blue', 'red', 'brown', 'black', 'yellow', 'orange', 'green'];

        return [
            'img' => $this->faker->imageUrl($width = 640, $height = 480),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'name' => $this->faker->name(),
            'promotion' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'category' => $category[rand(0, count($category) - 1)],
            'color' => $color[rand(0, count($color) - 1)],
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
