<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function index()
    {
        $businessHours = BusinessHour::orderBy('sort_order')->get();
        return view('admin.business-hours.index', compact('businessHours'));
    }

    public function create()
    {
        return view('admin.business-hours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day_label'  => 'required|string|max:255',
            'is_closed'  => 'nullable|boolean',
            'open_time'  => 'nullable|date_format:H:i',
            'close_time' => 'nullable|date_format:H:i',
            'sort_order' => 'nullable|integer',
        ]);

        BusinessHour::create([
            'day_label'  => $request->day_label,
            'is_closed'  => $request->boolean('is_closed'),
            'open_time'  => $request->open_time,
            'close_time' => $request->close_time,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.business-hours.index')->with('success', 'Jam operasional berhasil ditambahkan.');
    }

    public function edit(BusinessHour $businessHour)
    {
        return view('admin.business-hours.edit', compact('businessHour'));
    }

    public function update(Request $request, BusinessHour $businessHour)
    {
        $request->validate([
            'day_label'  => 'required|string|max:255',
            'is_closed'  => 'nullable|boolean',
            'open_time'  => 'nullable|date_format:H:i',
            'close_time' => 'nullable|date_format:H:i',
            'sort_order' => 'nullable|integer',
        ]);

        $businessHour->update([
            'day_label'  => $request->day_label,
            'is_closed'  => $request->boolean('is_closed'),
            'open_time'  => $request->open_time,
            'close_time' => $request->close_time,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.business-hours.index')->with('success', 'Jam operasional berhasil diupdate.');
    }

    public function destroy(BusinessHour $businessHour)
    {
        $businessHour->delete();
        return redirect()->route('admin.business-hours.index')->with('success', 'Jam operasional berhasil dihapus.');
    }
}