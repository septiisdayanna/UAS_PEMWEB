<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'seotitle' => Str::slug(fake()->sentence()),
            'user_id' => User::factory(),
            'content' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'hits' => fake()->numberBetween(0, 100),
            'active' => fake()->randomElement(['yes', 'no']),
            'status' => fake()->randomElement(['publish', 'draft']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
