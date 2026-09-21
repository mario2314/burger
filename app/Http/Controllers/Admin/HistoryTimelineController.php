<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HistoryTimeline;
use Illuminate\Http\Request;

class HistoryTimelineController extends Controller
{
    public function index()
    {
        $timelines = HistoryTimeline::orderBy('sort_order')->get();
        return view('admin.history.index', compact('timelines'));
    }

    public function create()
    {
        return view('admin.history.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        HistoryTimeline::create($request->all());
        return redirect()->route('admin.history.index')->with('success', 'Timeline berhasil ditambahkan.');
    }

    public function edit(HistoryTimeline $history)
    {
        return view('admin.history.edit', compact('history'));
    }

    public function update(Request $request, HistoryTimeline $history)
    {
        $request->validate([
            'year'        => 'required|string|max:255',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        $history->update($request->all());
        return redirect()->route('admin.history.index')->with('success', 'Timeline berhasil diupdate.');
    }

    public function destroy(HistoryTimeline $history)
    {
        $history->delete();
        return redirect()->route('admin.history.index')->with('success', 'Timeline berhasil dihapus.');
    }
}