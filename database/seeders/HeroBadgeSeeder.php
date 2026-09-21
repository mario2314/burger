<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroBadge;

class HeroBadgeSeeder extends Seeder
{
    public function run(): void
    {
        $badges = [
            ['icon' => 'fa-fire',  'color' => 'r', 'title' => 'Hot Deal', 'subtitle' => '30% off today', 'sort_order' => 1],
            ['icon' => 'fa-star',  'color' => 'y', 'title' => '4.9/5',    'subtitle' => '2k+ reviews',   'sort_order' => 2],
            ['icon' => 'fa-clock', 'color' => 'g', 'title' => '20 min',   'subtitle' => 'Fast delivery', 'sort_order' => 3],
        ];

        foreach ($badges as $badge) {
            HeroBadge::create($badge);
        }
    }
}