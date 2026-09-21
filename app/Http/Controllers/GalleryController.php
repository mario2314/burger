<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Models\SiteSetting;

class GalleryController extends Controller
{
    public function index()
    {
        $galleryItems = GalleryItem::orderBy('sort_order')->get();
        $settings     = SiteSetting::pluck('value', 'key');

        return view('pages.gallery', compact('galleryItems', 'settings'));
    }
}