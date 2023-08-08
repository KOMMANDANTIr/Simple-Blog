<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realText(50);
        return [
            'post_title' => $title ,
            'post_slug' => \Illuminate\Support\Str::slug($title),
            'post_image' => fake()->imageUrl ,
            'post_body' => fake()->realText(225) ,
            'user_id' => 1
        ];
    }
}
