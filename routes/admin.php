<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NavItemController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\BusinessHourController;
use App\Http\Controllers\Admin\HistoryTimelineController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\GuestOptionController;
use App\Http\Controllers\Admin\TimeSlotController;
use App\Http\Controllers\Admin\ContactSubjectController;
use App\Http\Controllers\Admin\ReservationInfoCardController;
use App\Http\Controllers\Admin\HeroStatController;
use App\Http\Controllers\Admin\HeroBadgeController;
use App\Http\Controllers\Admin\MarqueeItemController;
use App\Http\Controllers\Admin\TrendingTagController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // ... semua route yang sudah ada tetap di sini

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Navbar & Settings
    Route::resource('nav-items', NavItemController::class)->except(['show']);
    Route::get('settings', [SiteSettingController::class, 'index'])->name('settings.index');
    Route::get('settings/create', [SiteSettingController::class, 'create'])->name('settings.create');
    Route::post('settings', [SiteSettingController::class, 'store'])->name('settings.store');
    Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');
    Route::get('leads', [\App\Http\Controllers\Admin\LeadSettingController::class, 'edit'])->name('leads.edit');
    Route::put('leads', [\App\Http\Controllers\Admin\LeadSettingController::class, 'update'])->name('leads.update');
    Route::post('leads/test', [\App\Http\Controllers\Admin\LeadSettingController::class, 'test'])->name('leads.test');
    Route::delete('settings/{setting}', [SiteSettingController::class, 'destroy'])->name('settings.destroy');

    // Jam & Timeline
    Route::resource('business-hours', BusinessHourController::class)->except(['show']);
    Route::resource('history', HistoryTimelineController::class)->except(['show']);

    // Menu
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('menu-items', MenuItemController::class)->except(['show']);

    // Konten
    Route::resource('chefs', ChefController::class)->except(['show']);
    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    Route::resource('gallery', GalleryItemController::class)->except(['show']);
    Route::get('blog-list', [BlogPostController::class, 'list'])->name('blog.list');
    Route::resource('blog', BlogPostController::class)->except(['show']);

    // Form Options
    Route::resource('guest-options', GuestOptionController::class)->except(['show']);
    Route::resource('time-slots', TimeSlotController::class)->except(['show']);
    Route::resource('contact-subjects', ContactSubjectController::class)->except(['show']);
    Route::resource('reservation-info-cards', ReservationInfoCardController::class)->except(['show']);

    // Hero Section
    Route::resource('hero-stats', HeroStatController::class)->except(['show']);
    Route::resource('hero-badges', HeroBadgeController::class)->except(['show']);
    Route::resource('marquee-items', MarqueeItemController::class)->except(['show']);
    Route::resource('trending-tags', TrendingTagController::class)->except(['show']);
    Route::resource('features', FeatureController::class)->except(['show']);

    // Data Customer
    Route::resource('reservations', ReservationController::class)->only(['index', 'edit', 'update', 'destroy']);
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index', 'destroy']);
});