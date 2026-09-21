<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\SiteSetting;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('menuItems')->get()->map(function ($category) {
            $category->name = strip_tags($category->name);

            return $category;
        });

        $menuItems = MenuItem::with('category')
            ->where('is_active', true)
            ->get()
            ->map(function ($item) {
                $item->name = strip_tags($item->name);
                $item->description = strip_tags($item->description);

                if ($item->category) {
                    $item->category->name = strip_tags($item->category->name);
                }

                return $item;
            });

        $settings = SiteSetting::pluck('value', 'key')->map(function ($value) {
            return strip_tags($value);
        });

        return view('pages.menu', compact('categories', 'menuItems', 'settings'));
    }
}