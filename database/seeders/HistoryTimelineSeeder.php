<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoryTimeline;

class HistoryTimelineSeeder extends Seeder
{
    public function run(): void
    {
        $timelines = [
            ['year' => '2012', 'title' => 'Evolution of Restaurants',   'description' => 'Sarab opens its first 20-seat diner on Flavor Street. Within 3 months, lines stretch around the block every evening.', 'sort_order' => 1],
            ['year' => '2015', 'title' => 'Fine Dining & The Concept',  'description' => 'Expanding the vision - we introduced our signature tasting menu and hired our first Michelin-trained chef.', 'sort_order' => 2],
            ['year' => '2019', 'title' => 'Modern Fast Food Origins',   'description' => 'Launched our signature fast-food line, merging gourmet quality with speed and convenience.', 'sort_order' => 3],
            ['year' => '2026', 'title' => 'National Expansion',         'description' => 'Now operating in 8 cities across the US with an online delivery platform handling 10,000+ orders weekly.', 'sort_order' => 4],
        ];

        foreach ($timelines as $timeline) {
            HistoryTimeline::create($timeline);
        }
    }
}