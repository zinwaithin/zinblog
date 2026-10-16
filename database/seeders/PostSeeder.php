<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'My First Blog Post',
            'image' => null,
            'description' => 'This is my first blog post.',
            'content' => 'This is the full content of my first blog post.',
            'user_id' => 1,
            'category_id' => 1,
        ]);

        Post::create([
            'title' => 'Travel Experience',
            'image' => null,
            'description' => 'My travel experience.',
            'content' => 'This is the full content of my travel experience.',
            'user_id' => 2,
            'category_id' => 2,
        ]);

        Post::create([
            'title' => 'Lifestyle Tips',
            'image' => null,
            'description' => 'Some useful lifestyle tips.',
            'content' => 'This is the full content of my lifestyle tips.',
            'user_id' => 2,
            'category_id' => 3,
        ]);
    }
}