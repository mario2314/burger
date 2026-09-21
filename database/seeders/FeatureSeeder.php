<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            ['icon' => 'fa-leaf',         'color' => 'r', 'title' => '100% Fresh Ingredients', 'description' => 'We source locally and sustainably. Every ingredient is hand-picked daily for maximum freshness.', 'sort_order' => 1],
            ['icon' => 'fa-award',        'color' => 'y', 'title' => 'Award-Winning Recipes',  'description' => 'Our signature recipes have won national culinary awards 5 years in a row.', 'sort_order' => 2],
            ['icon' => 'fa-shipping-fast','color' => 'g', 'title' => 'Lightning-Fast Delivery','description' => 'Order online and get hot, fresh food at your door in under 25 minutes, guaranteed.', 'sort_order' => 3],
        ];

        foreach ($features as $feature) {
            Feature::create($feature);
        }
    }
}