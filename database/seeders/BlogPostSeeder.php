<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            ['title' => 'Healthy Fast Food: A Myth or Beautiful Reality', 'tag' => 'Food & Health', 'author' => 'James Writer', 'image' => '1.jpg', 'comments_count' => 24],
            ['title' => "Is Fast Food Getting Healthier? Here's What We Found", 'tag' => 'Food Science', 'author' => 'Sarah Grain', 'image' => '2.jpg', 'comments_count' => 18],
            ['title' => "Innovative Hot Chickpeas Flake Crackin' Recipe at Home", 'tag' => 'Recipes', 'author' => 'Chef Marcus', 'image' => '3.jpg', 'comments_count' => 32],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}