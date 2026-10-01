<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - Sarab Admin</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><circle cx='50' cy='50' r='50' fill='%23e8281a'/><text x='50' y='68' font-size='55' text-anchor='middle' fill='white' font-family='serif' font-weight='bold'>S</text></svg>">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    <style>
        body { font-family: 'Poppins', sans-serif; background: var(--light); overflow-x: hidden; }
        .admin-sidebar { width: 270px; height: 100vh; height: 100dvh; background: var(--dark); position: fixed; top: 0; left: 0; overflow-y: auto; z-index: 1040; }
        .admin-sidebar::-webkit-scrollbar { width: 4px; }
        .admin-sidebar::-webkit-scrollbar-thumb { background: var(--primary); }
        .admin-brand { padding: 22px 24px; border-bottom: 1px solid rgba(255,255,255,.08); display: flex; align-items: center; gap: 10px; }
        .admin-brand .bico { width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.1rem; flex-shrink: 0; }
        .admin-brand .bname { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 900; color: #fff; }
        .admin-brand .bname span { color: var(--primary); }
        .admin-brand .bsub { font-size: .62rem; text-transform: uppercase; letter-spacing: 1.5px; color: rgba(255,255,255,.4); }
        .admin-nav-section { color: rgba(255,255,255,.32); font-size: .68rem; text-transform: uppercase; letter-spacing: 1px; padding: 18px 24px 7px; font-weight: 600; }
        .admin-nav-link { color: rgba(255,255,255,.68); padding: 10px 24px; font-size: .85rem; display: flex; align-items: center; gap: 11px; transition: .25s; border-left: 3px solid transparent; }
        .admin-nav-link:hover { background: rgba(232,40,26,.1); color: #fff; }
        .admin-nav-link.active { background: rgba(232,40,26,.18); color: #fff; border-left-color: var(--primary); font-weight: 600; }
        .admin-nav-link i { width: 18px; text-align: center; font-size: .85rem; }
        .admin-main { margin-left: 270px; min-height: 100vh; }
        .admin-topbar { background: #fff; padding: 14px 28px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 14px rgba(0,0,0,.05); position: sticky; top: 0; z-index: 1030; }
        .admin-topbar h5 { font-family: 'Playfair Display', serif; font-weight: 800; margin: 0; }
        .admin-content { padding: 28px; }
        .card-admin { background: #fff; border-radius: 16px; padding: 26px; box-shadow: 0 4px 18px rgba(0,0,0,.06); }
        .btn-admin-primary { background: linear-gradient(135deg, var(--primary), #c01e12); color: #fff; border: none; border-radius: 9px; padding: 9px 20px; font-weight: 600; font-size: .85rem; transition: .3s; display: inline-flex; align-items: center; }
        .btn-admin-primary:hover { color: #fff; transform: translateY(-2px); box-shadow: 0 6px 16px rgba(232,40,26,.3); }
        .table-admin thead { background: var(--light); }
        .table-admin th { font-size: .76rem; text-transform: uppercase; letter-spacing: .5px; color: #888; font-weight: 600; }
        .badge-admin-active { background: rgba(45,106,79,.12); color: var(--green); padding: 4px 11px; border-radius: 20px; font-size: .72rem; font-weight: 600; }
        .badge-admin-inactive { background: rgba(232,40,26,.1); color: var(--primary); padding: 4px 11px; border-radius: 20px; font-size: .72rem; font-weight: 600; }
        @media (max-width: 991px) {
            .admin-sidebar { transform: translateX(-100%); transition: .3s; }
            .admin-sidebar.show { transform: translateX(0); }
            .admin-main { margin-left: 0; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <div class="admin-sidebar" id="adminSidebar">
        <div class="admin-brand">
            <div class="bico"><i class="fas fa-utensils"></i></div>
            <div>
                <div class="bname">Sar<span>ab</span></div>
                <div class="bsub">Admin Panel</div>
            </div>
        </div>
        <nav class="py-2">
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-gauge"></i> Dashboard
            </a>

            <div class="admin-nav-section">Navbar & Settings</div>
            <a href="{{ route('admin.nav-items.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.nav-items.*') ? 'active' : '' }}"><i class="fas fa-bars"></i> Navbar Menu</a>
            <a href="{{ route('admin.settings.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><i class="fas fa-gear"></i> General Settings</a>

            <div class="admin-nav-section">Jam & Sejarah</div>
            <a href="{{ route('admin.business-hours.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.business-hours.*') ? 'active' : '' }}"><i class="fas fa-clock"></i> Business Hours</a>
            <a href="{{ route('admin.history.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.history.*') ? 'active' : '' }}"><i class="fas fa-timeline"></i> History Timeline</a>

            <div class="admin-nav-section">Menu</div>
            <a href="{{ route('admin.categories.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"><i class="fas fa-tags"></i> Categories</a>
            <a href="{{ route('admin.menu-items.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.menu-items.*') ? 'active' : '' }}"><i class="fas fa-utensils"></i> Menu Items</a>

            <div class="admin-nav-section">Konten</div>
            <a href="{{ route('admin.chefs.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.chefs.*') ? 'active' : '' }}"><i class="fas fa-user"></i> Chefs</a>
            <a href="{{ route('admin.testimonials.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"><i class="fas fa-quote-left"></i> Testimonials</a>
            <a href="{{ route('admin.gallery.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}"><i class="fas fa-images"></i> Gallery</a>
            <a href="{{ route('admin.blog.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}"><i class="fas fa-blog"></i> Blog Posts</a>

            <div class="admin-nav-section">Form Options</div>
            <a href="{{ route('admin.guest-options.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.guest-options.*') ? 'active' : '' }}"><i class="fas fa-users"></i> Guest Options</a>
            <a href="{{ route('admin.time-slots.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.time-slots.*') ? 'active' : '' }}"><i class="fas fa-clock"></i> Time Slots</a>
            <a href="{{ route('admin.contact-subjects.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.contact-subjects.*') ? 'active' : '' }}"><i class="fas fa-list"></i> Contact Subjects</a>
            <a href="{{ route('admin.reservation-info-cards.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.reservation-info-cards.*') ? 'active' : '' }}"><i class="fas fa-id-card"></i> Reservation Info</a>

            <div class="admin-nav-section">Hero Section</div>
            <a href="{{ route('admin.hero-stats.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.hero-stats.*') ? 'active' : '' }}"><i class="fas fa-chart-simple"></i> Hero Stats</a>
            <a href="{{ route('admin.hero-badges.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.hero-badges.*') ? 'active' : '' }}"><i class="fas fa-certificate"></i> Hero Badges</a>
            <a href="{{ route('admin.marquee-items.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.marquee-items.*') ? 'active' : '' }}"><i class="fas fa-rectangle-list"></i> Marquee Items</a>
            <a href="{{ route('admin.trending-tags.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.trending-tags.*') ? 'active' : '' }}"><i class="fas fa-fire"></i> Trending Tags</a>
            <a href="{{ route('admin.features.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.features.*') ? 'active' : '' }}"><i class="fas fa-star"></i> About Features</a>

            <div class="admin-nav-section">Data Customer</div>
            <a href="{{ route('admin.reservations.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.reservations.*') ? 'active' : '' }}"><i class="fas fa-calendar-check"></i> Reservations</a>
            <a href="{{ route('admin.contacts.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Contact Messages</a>
            <a href="{{ route('admin.leads.edit') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.leads.*') ? 'active' : '' }}"><i class="fas fa-paper-plane"></i> Email Leads</a>
            <a href="{{ route('admin.newsletter-subscribers.index') }}" class="admin-nav-link d-block {{ request()->routeIs('admin.newsletter-subscribers.*') ? 'active' : '' }}"><i class="fas fa-paper-plane"></i> Newsletter Subs</a>
        </nav>
    </div>

    <div class="admin-main">
        <div class="admin-topbar">
            <button class="btn btn-sm btn-outline-secondary d-lg-none" onclick="document.getElementById('adminSidebar').classList.toggle('show')">
                <i class="fas fa-bars"></i>
            </button>
            <h5>@yield('page-title', 'Dashboard')</h5>
            <div class="d-flex align-items-center gap-3">
                <span class="text-muted small">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-sign-out-alt"></i></button>
                </form>
            </div>
        </div>

        <div class="admin-content">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</body>
</html>