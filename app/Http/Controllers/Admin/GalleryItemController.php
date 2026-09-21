<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;

class GalleryItemController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::orderBy('sort_order')->get();
        return view('admin.gallery.index', compact('galleryItems'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'       => 'required|string|max:500',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        GalleryItem::create([
            'image'       => $request->image,
            'title'       => strip_tags($request->title),
            'description' => strip_tags($request->description),
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item berhasil ditambahkan.');
    }

    public function edit(GalleryItem $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, GalleryItem $gallery)
    {
        $request->validate([
            'image'       => 'required|string|max:500',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'nullable|integer',
        ]);

        $gallery->update([
            'image'       => $request->image,
            'title'       => strip_tags($request->title),
            'description' => strip_tags($request->description),
            'sort_order'  => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item berhasil diupdate.');
    }

    public function destroy(GalleryItem $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Gallery item berhasil dihapus.');
    }
}