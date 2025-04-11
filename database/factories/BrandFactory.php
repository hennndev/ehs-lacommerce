<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = [
            "ASUS",
            "Apple",
            "Samsung",
            "HP",
            "Lenovo",
            "Acer",
            "Advan",
            "Dell",
            "Axioo",
            "Huawei",
            "MSI",
            "Xiaomi",
            "Infinix",
            "Itel",
            "Techno",
            "Cannon",
            "AMD",
            "Intel",
            "Nvidia",
            "Logitech"
        ];

        return [
            "name" => $this->faker->unique()->randomElement($brands)
        ];
    }
}
