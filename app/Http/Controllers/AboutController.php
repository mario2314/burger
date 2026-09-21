<?php

namespace App\Http\Controllers;

use App\Models\HistoryTimeline;
use App\Models\BusinessHour;
use App\Models\SiteSetting;
use App\Models\Feature;

class AboutController extends Controller
{
    public function index()
    {
        $timelines     = HistoryTimeline::orderBy('sort_order')->get();
        $businessHours = BusinessHour::orderBy('sort_order')->get();
        $settings      = SiteSetting::pluck('value', 'key');
        $features      = Feature::orderBy('sort_order')->get();

        return view('pages.about', compact('timelines', 'businessHours', 'settings', 'features'));
    }
}