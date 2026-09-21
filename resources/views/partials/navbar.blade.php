<nav class="navbar navbar-expand-lg" id="nav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="blogo">
                <div class="bico"><i class="fas fa-utensils"></i></div>
                <div>
                    <div class="bname">{{ $settings['site_name'] ?? 'Sitename here' }}</div>
                    <div class="bsub">{{ $settings['site_tagline'] ?? 'Tagline here' }}</div>
                </div>
            </div>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <i class="fas fa-bars" style="color:var(--primary);font-size:1.35rem;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav mx-auto">
                @foreach($navItems as $nav)
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs($nav->route_name) ? 'active' : '' }}"
                       href="{{ route($nav->route_name) }}">
                        {{ $nav->label }}
                    </a>
                </li>
                @endforeach
            </ul>
           <div class="d-flex align-items-center gap-1">
    <button id="navSearchBtn" title="Search"><i class="fas fa-search"></i></button>
    <a href="{{ route('menu.index') }}" class="nav-link nav-cta"><i class="fas fa-shopping-bag me-1"></i>Order Now</a>

    @auth
        <a href="{{ route('admin.dashboard') }}" class="nav-link" title="Admin Dashboard"><i class="fas fa-gauge"></i></a>
        <form method="POST" action="{{ route('logout') }}" class="d-inline">
            @csrf
            <button type="submit" class="nav-link border-0 bg-transparent" title="Logout"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    @else
        <a href="{{ route('login') }}" class="nav-link" title="Login"><i class="fas fa-user"></i></a>
    @endauth
</div>
        </div>
    </div>
</nav>