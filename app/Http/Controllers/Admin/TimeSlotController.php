<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::orderBy('sort_order')->get();
        return view('admin.time-slots.index', compact('timeSlots'));
    }

    public function create()
    {
        return view('admin.time-slots.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        TimeSlot::create($request->all());
        return redirect()->route('admin.time-slots.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(TimeSlot $timeSlot)
    {
        return view('admin.time-slots.edit', compact('timeSlot'));
    }

    public function update(Request $request, TimeSlot $timeSlot)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $timeSlot->update($request->all());
        return redirect()->route('admin.time-slots.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(TimeSlot $timeSlot)
    {
        $timeSlot->delete();
        return redirect()->route('admin.time-slots.index')->with('success', 'Berhasil dihapus.');
    }
}