<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory {

    public function definition(): array {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'user_id' => User::factory(), // создаст связанного пользователя автоматически
            'excerpt' => fake()->paragraph()
        ];
    }
}