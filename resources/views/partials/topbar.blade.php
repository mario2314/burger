<div id="topbar">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div class="top-contact d-flex flex-wrap">
                <span><i class="fas fa-phone-alt"></i>{{ $settings['phone'] ?? '' }}</span>
                <span><i class="fas fa-envelope"></i>{{ $settings['email'] ?? '' }}</span>
                <span><i class="fas fa-map-marker-alt"></i>{{ $settings['address_short'] ?? '' }}</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span class="ttag"><i class="fas fa-fire me-1"></i>{{ $settings['topbar_delivery_tag'] ?? '' }}</span>
                <div class="tsoc">
                    <a href="{{ $settings['facebook_url'] ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $settings['instagram_url'] ?? '#' }}"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $settings['tiktok_url'] ?? '#' }}"><i class="fab fa-tiktok"></i></a>
                    <a href="{{ $settings['youtube_url'] ?? '#' }}"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>