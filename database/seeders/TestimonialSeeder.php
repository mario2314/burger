<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['name' => 'Monica Wilber', 'role' => 'Regular Customer', 'review' => "Honestly the best burgers I've ever had. The smash burger is incredible - perfectly crispy edges, juicy inside, and those pickles!", 'rating' => 5, 'image' => '1.jpg'],
            ['name' => 'Cameron Fox',   'role' => 'Food Blogger',     'review' => 'Ordered delivery and the food arrived hot and fresh in 22 minutes. Portions are generous. Sarab has become my go-to comfort food spot.', 'rating' => 5, 'image' => '2.jpg'],
            ['name' => 'Priya Sharma',  'role' => 'Food Enthusiast',  'review' => "The truffle pasta blew my mind. I didn't expect that quality from a fast food place. Great ambiance, super friendly staff.", 'rating' => 5, 'image' => '3.jpg'],
            ['name' => 'David Park',    'role' => 'Corporate Client', 'review' => 'Catered our office party of 50 people and everything was flawless. Fresh, delicious, on time and well presented.', 'rating' => 5, 'image' => '4.jpg'],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}