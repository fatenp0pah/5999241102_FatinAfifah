<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      
            $name = fake()->sentence(rand(1, 2), false);
            $slug = Str::slug($name);
            
            // Ensure slug is unique
            return [
                'name' => $name,
                'slug' => $slug . '-' . uniqid(), // Appending a unique ID to slug
            ];
    }
}
