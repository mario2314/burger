<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestOption;
use Illuminate\Http\Request;

class GuestOptionController extends Controller
{
    public function index()
    {
        $guestOptions = GuestOption::orderBy('sort_order')->get();
        return view('admin.guest-options.index', compact('guestOptions'));
    }

    public function create()
    {
        return view('admin.guest-options.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'value'      => 'required|integer',
            'sort_order' => 'nullable|integer',
        ]);

        GuestOption::create($request->all());
        return redirect()->route('admin.guest-options.index')->with('success', 'Berhasil ditambahkan.');
    }

    public function edit(GuestOption $guestOption)
    {
        return view('admin.guest-options.edit', compact('guestOption'));
    }

    public function update(Request $request, GuestOption $guestOption)
    {
        $request->validate([
            'label'      => 'required|string|max:255',
            'value'      => 'required|integer',
            'sort_order' => 'nullable|integer',
        ]);

        $guestOption->update($request->all());
        return redirect()->route('admin.guest-options.index')->with('success', 'Berhasil diupdate.');
    }

    public function destroy(GuestOption $guestOption)
    {
        $guestOption->delete();
        return redirect()->route('admin.guest-options.index')->with('success', 'Berhasil dihapus.');
    }
}