<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('category')->orderBy('name')->get();
        return view('admin.menu-items.index', compact('menuItems'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.menu-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'old_price'     => 'nullable|numeric',
            'image'         => 'required|string|max:500',
            'rating'        => 'nullable|numeric',
            'reviews_count' => 'nullable|integer',
            'calories'      => 'nullable|integer',
            'prep_time'     => 'nullable|integer',
            'badge'         => 'nullable|string|max:255',
            'badge_type'    => 'nullable|string|max:255',
            'tags'          => 'nullable|string',
            'is_active'     => 'nullable|boolean',
        ]);

        MenuItem::create([
            ...$request->except('is_active'),
            'name'        => strip_tags($request->name),
            'description' => strip_tags($request->description),
            'is_active'   => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item berhasil ditambahkan.');
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.menu-items.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
            'old_price'     => 'nullable|numeric',
            'image'         => 'required|string|max:500',
            'rating'        => 'nullable|numeric',
            'reviews_count' => 'nullable|integer',
            'calories'      => 'nullable|integer',
            'prep_time'     => 'nullable|integer',
            'badge'         => 'nullable|string|max:255',
            'badge_type'    => 'nullable|string|max:255',
            'tags'          => 'nullable|string',
            'is_active'     => 'nullable|boolean',
        ]);

        $menuItem->update([
            ...$request->except('is_active'),
            'name'        => strip_tags($request->name),
            'description' => strip_tags($request->description),
            'is_active'   => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item berhasil diupdate.');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('admin.menu-items.index')->with('success', 'Menu item berhasil dihapus.');
    }
}