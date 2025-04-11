<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->word(3, true),
            "price" => $this->faker->numberBetween(100, 5000),
            "stocks" => $this->faker->numberBetween(1, 100),
            "description" => $this->faker->paragraph(),
            "brand_id" => Brand::inRandomOrder()->first()?->id ?? Brand::factory(),
            "category_id" => Category::inRandomOrder()->first()?->id ?? Category::factory()
        ];
    }
}
