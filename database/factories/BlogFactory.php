<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(10),
            'slug' => fake()->slug(),
            'description' => fake()->sentence(100),
            'featured_image' => null,
            'image_caption' => null,
            'is_published' => true,
        ];
    }
}
