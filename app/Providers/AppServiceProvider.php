<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;
use App\Models\Category;
use App\Models\NavItem;
use App\Models\TrendingTag;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(
            ['partials.topbar', 'partials.navbar', 'partials.footer', 'partials.search-overlay'],
            function ($view) {
                $view->with([
                    'settings'     => SiteSetting::pluck('value', 'key'),
                    'categories'   => Category::withCount('menuItems')->get(),
                    'navItems'     => NavItem::orderBy('sort_order')->get(),
                    'trendingTags' => TrendingTag::orderBy('sort_order')->get(),
                ]);
            }
        );
    }
}