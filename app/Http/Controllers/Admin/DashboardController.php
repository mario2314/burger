<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Chef;
use App\Models\Reservation;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'menu_items'           => MenuItem::count(),
            'chefs'                => Chef::count(),
            'reservations'         => Reservation::count(),
            'pending_reservations' => Reservation::where('status', 'pending')->count(),
            'contacts'             => Contact::count(),
            'unread_contacts'      => Contact::where('is_read', false)->count(),
            'blog_posts'           => BlogPost::count(),
            'testimonials'         => Testimonial::count(),
        ];

        $recentReservations = Reservation::latest()->limit(5)->get();
        $recentContacts     = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentReservations', 'recentContacts'));
    }
}