<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroStat;
use Illuminate\Http\Request;

class HeroStatController extends Controller
{
    public function index()
    {
        $heroStats = HeroStat::orderBy('sort_order')->get();
        return view('admin.hero-stats.index', compact('heroStats'));
    }

    public function create()
    {
        return view('admin.hero-stats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number'     => 'required|string|max:50',
            'suffix'     => 'required|string|max:20',
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        HeroStat::create($request->all());
        return redirect()->route('admin.hero-stats.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(HeroStat $heroStat)
    {
        return view('admin.hero-stats.edit', compact('heroStat'));
    }

    public function update(Request $request, HeroStat $heroStat)
    {
        $request->validate([
            'number'     => 'required|string|max:50',
            'suffix'     => 'required|string|max:20',
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $heroStat->update($request->all());
        return redirect()->route('admin.hero-stats.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(HeroStat $heroStat)
    {
        $heroStat->delete();
        return redirect()->route('admin.hero-stats.index')->with('success', 'Berhasil dihapus.');
    }
}