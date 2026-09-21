<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Models\Category;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'category' => 'burgers',
                'name' => 'Classic Smash Burger',
                'description' => 'Double smashed patty, cheddar cheese, caramelized onions, house pickles and our legendary special sauce.',
                'price' => 14.99, 'old_price' => 18.99, 'image' => '1.jpg',
                'rating' => 4.9, 'reviews_count' => 128, 'calories' => 620, 'prep_time' => 12,
                'badge' => 'Hot', 'badge_type' => 'hot', 'tags' => 'Spicy,Bestseller,Beef',
            ],
            [
                'category' => 'pizza',
                'name' => 'Margherita Royale',
                'description' => 'San Marzano tomatoes, fresh buffalo mozzarella, fragrant basil leaves, drizzled with Italian truffle oil.',
                'price' => 19.99, 'old_price' => 24.99, 'image' => '2.jpg',
                'rating' => 4.8, 'reviews_count' => 95, 'calories' => 480, 'prep_time' => 18,
                'badge' => 'New', 'badge_type' => 'new', 'tags' => 'Vegetarian,New,Italian',
            ],
            [
                'category' => 'chicken',
                'name' => 'Nashville Hot Chicken',
                'description' => 'Extra-crispy fried chicken tossed in our signature fiery Nashville spice blend, served with honey drizzle.',
                'price' => 12.99, 'old_price' => 16.99, 'image' => '3.jpg',
                'rating' => 5.0, 'reviews_count' => 210, 'calories' => 710, 'prep_time' => 15,
                'badge' => 'Best Seller', 'badge_type' => '', 'tags' => 'Spicy,Bestseller,Crispy',
            ],
            [
                'category' => 'wraps',
                'name' => 'Loaded Fajita Wrap',
                'description' => 'Grilled chicken strips, sauteed bell peppers and onions, sour cream, fresh guacamole and salsa.',
                'price' => 10.99, 'old_price' => null, 'image' => '4.jpg',
                'rating' => 4.5, 'reviews_count' => 74, 'calories' => 520, 'prep_time' => 10,
                'badge' => null, 'badge_type' => null, 'tags' => 'Grilled,Fresh,Mexican',
            ],
            [
                'category' => 'desserts',
                'name' => 'Nutella Lava Cake',
                'description' => 'Warm molten chocolate cake with a gooey Nutella center, served alongside Madagascar vanilla bean ice cream.',
                'price' => 8.99, 'old_price' => 11.99, 'image' => '5.jpg',
                'rating' => 4.9, 'reviews_count' => 56, 'calories' => 390, 'prep_time' => 8,
                'badge' => 'New', 'badge_type' => 'new', 'tags' => 'Sweet,New,Chocolate',
            ],
            [
                'category' => 'pasta',
                'name' => 'Truffle Mushroom Pasta',
                'description' => 'Al dente tagliatelle tossed with mixed wild mushrooms, freshly shaved black truffle, aged parmesan.',
                'price' => 16.99, 'old_price' => null, 'image' => '6.jpg',
                'rating' => 4.9, 'reviews_count' => 88, 'calories' => 560, 'prep_time' => 20,
                'badge' => "Chef's Pick", 'badge_type' => 'hot', 'tags' => "Vegetarian,Chef's Pick,Italian",
            ],
        ];

        foreach ($items as $item) {
            $category = Category::where('slug', $item['category'])->first();
            unset($item['category']);
            $item['category_id'] = $category->id;
            MenuItem::create($item);
        }
    }
}