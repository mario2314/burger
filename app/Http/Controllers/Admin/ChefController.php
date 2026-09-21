<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::orderBy('name')->get();
        return view('admin.chefs.index', compact('chefs'));
    }

    public function create()
    {
        return view('admin.chefs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'experience' => 'required|integer',
            'image'      => 'required|string|max:500',
            'instagram'  => 'nullable|string|max:500',
            'facebook'   => 'nullable|string|max:500',
            'twitter'    => 'nullable|string|max:500',
            'is_active'  => 'nullable|boolean',
        ]);

        Chef::create([
            ...$request->except('is_active'),
            'name'      => strip_tags($request->name),
            'role'      => strip_tags($request->role),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.chefs.index')->with('success', 'Chef berhasil ditambahkan.');
    }

    public function edit(Chef $chef)
    {
        return view('admin.chefs.edit', compact('chef'));
    }

    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'experience' => 'required|integer',
            'image'      => 'required|string|max:500',
            'instagram'  => 'nullable|string|max:500',
            'facebook'   => 'nullable|string|max:500',
            'twitter'    => 'nullable|string|max:500',
            'is_active'  => 'nullable|boolean',
        ]);

        $chef->update([
            ...$request->except('is_active'),
            'name'      => strip_tags($request->name),
            'role'      => strip_tags($request->role),
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.chefs.index')->with('success', 'Chef berhasil diupdate.');
    }

    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('admin.chefs.index')->with('success', 'Chef berhasil dihapus.');
    }
}