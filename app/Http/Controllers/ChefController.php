<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\SiteSetting;

class ChefController extends Controller
{
    public function index()
    {
        $chefs    = Chef::where('is_active', true)->get();
        $settings = SiteSetting::pluck('value', 'key');

        return view('pages.chefs', compact('chefs', 'settings'));
    }
}