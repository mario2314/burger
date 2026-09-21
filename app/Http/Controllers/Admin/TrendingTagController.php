<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrendingTag;
use Illuminate\Http\Request;

class TrendingTagController extends Controller
{
    public function index()
    {
        $trendingTags = TrendingTag::orderBy('sort_order')->get();
        return view('admin.trending-tags.index', compact('trendingTags'));
    }

    public function create()
    {
        return view('admin.trending-tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        TrendingTag::create([
            'label'      => strip_tags($request->label),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.trending-tags.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(TrendingTag $trendingTag)
    {
        return view('admin.trending-tags.edit', compact('trendingTag'));
    }

    public function update(Request $request, TrendingTag $trendingTag)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $trendingTag->update([
            'label'      => strip_tags($request->label),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.trending-tags.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(TrendingTag $trendingTag)
    {
        $trendingTag->delete();
        return redirect()->route('admin.trending-tags.index')->with('success', 'Berhasil dihapus.');
    }
}