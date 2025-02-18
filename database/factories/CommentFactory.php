<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'userID' => User::factory(),
            'postID' => Post::factory(),
            'content' => $this->faker->paragraph(),
        ];
    }
}
