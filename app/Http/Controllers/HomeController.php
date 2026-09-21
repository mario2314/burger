<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Testimonial;
use App\Models\NewsletterSubscriber;
use App\Models\SiteSetting;
use App\Models\HeroStat;
use App\Models\HeroBadge;
use App\Models\MarqueeItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories   = Category::withCount('menuItems')->get();
        $menuItems    = MenuItem::with('category')->where('is_active', true)->limit(6)->get();
        $testimonials = Testimonial::where('is_active', true)->get();
        $settings     = SiteSetting::pluck('value', 'key');
        $heroStats    = HeroStat::orderBy('sort_order')->get();
        $heroBadges   = HeroBadge::orderBy('sort_order')->get();
        $marqueeItems = MarqueeItem::orderBy('sort_order')->get();

        return view('pages.home', compact(
            'categories', 'menuItems', 'testimonials', 'settings',
            'heroStats', 'heroBadges', 'marqueeItems'
        ));
    }

    public function subscribeNewsletter(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        NewsletterSubscriber::firstOrCreate(['email' => $request->email]);
        return redirect()->route('home')->with('newsletter_success', 'Subscribed successfully!');
    }
}