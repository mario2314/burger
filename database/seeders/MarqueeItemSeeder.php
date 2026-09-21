<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MarqueeItem;

class MarqueeItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'Crispy Fried Chicken',
            'Gourmet Burgers',
            'Artisan Pizzas',
            'Fresh Wraps & Rolls',
            'Loaded Fries',
            'Ice Cream Shakes',
            'Grilled Sandwiches',
        ];

        foreach ($items as $index => $label) {
            MarqueeItem::create(['label' => $label, 'sort_order' => $index + 1]);
        }
    }
}