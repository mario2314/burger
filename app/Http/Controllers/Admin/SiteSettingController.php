<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::orderBy('key')->get();
        $grouped  = $settings->groupBy(function ($item) {
            return explode('_', $item->key)[0];
        });
        return view('admin.settings.index', compact('grouped'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);
        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil disimpan.');
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key'   => 'required|string|max:255|unique:site_settings,key',
            'value' => 'nullable|string',
        ]);
        SiteSetting::create($request->only(['key', 'value']));
        return redirect()->route('admin.settings.index')->with('success', 'Setting baru berhasil ditambahkan.');
    }

    public function destroy(SiteSetting $setting)
    {
        $setting->delete();
        return redirect()->route('admin.settings.index')->with('success', 'Setting berhasil dihapus.');
    }
}