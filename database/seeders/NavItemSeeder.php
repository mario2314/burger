<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NavItem;

class NavItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['label' => 'Home',        'route_name' => 'home',              'sort_order' => 1],
            ['label' => 'About',       'route_name' => 'about.index',       'sort_order' => 2],
            ['label' => 'Menu',        'route_name' => 'menu.index',        'sort_order' => 3],
            ['label' => 'Chefs',       'route_name' => 'chefs.index',       'sort_order' => 4],
            ['label' => 'Gallery',     'route_name' => 'gallery.index',     'sort_order' => 5],
            ['label' => 'Reservation', 'route_name' => 'reservation.index', 'sort_order' => 6],
            ['label' => 'Blog',        'route_name' => 'blog.index',        'sort_order' => 7],
            ['label' => 'Contact',     'route_name' => 'contact.index',     'sort_order' => 8],
        ];

        foreach ($items as $item) {
            NavItem::create($item);
        }
    }
}