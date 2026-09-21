<footer>
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="fnm">{{ $settings['site_name'] ?? 'Sarab' }}</div>
                <p class="fdesc">{{ $settings['footer_description'] ?? '' }}</p>
                <div class="fsoc">
                    <a href="{{ $settings['facebook_url'] ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $settings['instagram_url'] ?? '#' }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $settings['twitter_url'] ?? '#' }}"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $settings['youtube_url'] ?? '#' }}"><i class="fab fa-youtube"></i></a>
                    <a href="{{ $settings['tiktok_url'] ?? '#' }}"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="ftit">Quick Links</div>
                <ul class="flinks ps-0">
                    @foreach($navItems as $nav)
                    <li><a href="{{ route($nav->route_name) }}"><i class="fas fa-chevron-right"></i>{{ $nav->label }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="ftit">Our Menu</div>
                <ul class="flinks ps-0">
                    @foreach($categories ?? [] as $cat)
                    <li><a href="{{ route('menu.index') }}"><i class="fas fa-chevron-right"></i>{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="ftit">Get In Touch</div>
                <div class="fci">
                    <div class="fciico"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="fciinfo"><strong>Address</strong>{{ $settings['address_full'] ?? '' }}</div>
                </div>
                <div class="fci">
                    <div class="fciico"><i class="fas fa-phone-alt"></i></div>
                    <div class="fciinfo"><strong>Phone</strong>{{ $settings['phone'] ?? '' }}</div>
                </div>
                <div class="fci">
                    <div class="fciico"><i class="fas fa-envelope"></i></div>
                    <div class="fciinfo"><strong>Email</strong>{{ $settings['email'] ?? '' }}</div>
                </div>
                <div class="fci">
                    <div class="fciico"><i class="fas fa-clock"></i></div>
                    <div class="fciinfo"><strong>Hours</strong>{{ $settings['hours_display'] ?? '' }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="fbot">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <p>&copy; {{ date('Y') }} <span>{{ $settings['site_name'] ?? 'Sarab' }} Restaurant</span>. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>