<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarqueeItem;
use Illuminate\Http\Request;

class MarqueeItemController extends Controller
{
    public function index()
    {
        $marqueeItems = MarqueeItem::orderBy('sort_order')->get();
        return view('admin.marquee-items.index', compact('marqueeItems'));
    }

    public function create()
    {
        return view('admin.marquee-items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        MarqueeItem::create([
            'label'      => strip_tags($request->label),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.marquee-items.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(MarqueeItem $marqueeItem)
    {
        return view('admin.marquee-items.edit', compact('marqueeItem'));
    }

    public function update(Request $request, MarqueeItem $marqueeItem)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $marqueeItem->update([
            'label'      => strip_tags($request->label),
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.marquee-items.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(MarqueeItem $marqueeItem)
    {
        $marqueeItem->delete();
        return redirect()->route('admin.marquee-items.index')->with('success', 'Berhasil dihapus.');
    }
}