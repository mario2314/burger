<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryItem;

class GalleryItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['image' => 'work1.jpg', 'title' => 'Gourmet Burgers',      'description' => 'Our award-winning smash burgers, hand-crafted with 100% premium beef, aged cheddar and house-made sauces.', 'sort_order' => 1],
            ['image' => 'work2.jpg', 'title' => 'Wood-Fired Pizza',      'description' => 'Authentic Neapolitan-style pizzas fired at 900F in our wood-burning stone oven for the perfect char.', 'sort_order' => 2],
            ['image' => 'work3.jpg', 'title' => 'Crispy Fried Chicken',  'description' => 'Double-brined, hand-battered chicken fried to golden perfection using our 15-spice secret blend.', 'sort_order' => 3],
            ['image' => 'work4.jpg', 'title' => 'Sweet Desserts',        'description' => 'Handcrafted desserts - from molten lava cakes to artisan ice cream sundaes and seasonal pastries.', 'sort_order' => 4],
            ['image' => 'work5.jpg', 'title' => 'Fresh Wraps & Rolls',   'description' => 'Loaded fresh wraps packed with grilled proteins, crunchy vegetables and our house-made sauces.', 'sort_order' => 5],
        ];

        foreach ($items as $item) {
            GalleryItem::create($item);
        }
    }
}