<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::orderBy('sort_order')->get();
        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'        => 'required|string|max:255',
            'color'       => 'required|string|max:10',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        Feature::create([
            'icon'        => $request->icon,
            'color'       => $request->color,
            'title'       => strip_tags($request->title),
            'description' => strip_tags($request->description),
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'icon'        => 'required|string|max:255',
            'color'       => 'required|string|max:10',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        $feature->update([
            'icon'        => $request->icon,
            'color'       => $request->color,
            'title'       => strip_tags($request->title),
            'description' => strip_tags($request->description),
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return redirect()->route('admin.features.index')->with('success', 'Berhasil dihapus.');
    }
}