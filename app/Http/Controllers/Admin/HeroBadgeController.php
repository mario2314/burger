<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroBadge;
use Illuminate\Http\Request;

class HeroBadgeController extends Controller
{
    public function index()
    {
        $heroBadges = HeroBadge::orderBy('sort_order')->get();
        return view('admin.hero-badges.index', compact('heroBadges'));
    }

    public function create()
    {
        return view('admin.hero-badges.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon'       => 'required|string|max:255',
            'color'      => 'required|string|max:10',
            'title'      => 'required|string|max:255',
            'subtitle'   => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        HeroBadge::create($request->all());
        return redirect()->route('admin.hero-badges.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(HeroBadge $heroBadge)
    {
        return view('admin.hero-badges.edit', compact('heroBadge'));
    }

    public function update(Request $request, HeroBadge $heroBadge)
    {
        $request->validate([
            'icon'       => 'required|string|max:255',
            'color'      => 'required|string|max:10',
            'title'      => 'required|string|max:255',
            'subtitle'   => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $heroBadge->update($request->all());
        return redirect()->route('admin.hero-badges.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(HeroBadge $heroBadge)
    {
        $heroBadge->delete();
        return redirect()->route('admin.hero-badges.index')->with('success', 'Berhasil dihapus.');
    }
}