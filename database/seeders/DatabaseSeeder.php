<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 5 users
        User::factory(5)->create();

        // Create 5 categories
        Category::factory(5)->create();

        // Create 10 posts
        Post::factory(10)->create();

        // Create 20 comments
        Comment::factory(20)->create();
    }
}
