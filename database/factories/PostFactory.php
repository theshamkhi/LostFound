<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'userID' => User::factory(),
            'categoryID' => Category::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'photo' => null,
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'location' => $this->faker->city(),
            'contact' => $this->faker->phoneNumber(),
        ];
    }
}
