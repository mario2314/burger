<section id="special">
    <div class="spbg"></div>
    <div class="container" style="position:relative;z-index:2;">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="sptag"><i class="fas fa-bolt me-1"></i>{{ $settings['special_tag'] ?? '' }}</div>
                <h2 class="sptitle">{!! $settings['special_title'] ?? '' !!}</h2>
                <p class="spdesc">{{ $settings['special_description'] ?? '' }}</p>
                <div class="cdwrap">
                    <div class="cditem"><span class="cdnum" id="cdH">{{ $settings['special_countdown_hours'] ?? '08' }}</span><span class="cdlbl">Hours</span></div>
                    <div class="cditem"><span class="cdnum" id="cdM">{{ $settings['special_countdown_minutes'] ?? '45' }}</span><span class="cdlbl">Minutes</span></div>
                    <div class="cditem"><span class="cdnum" id="cdS">{{ $settings['special_countdown_seconds'] ?? '30' }}</span><span class="cdlbl">Seconds</span></div>
                </div>
                <a href="{{ route('menu.index') }}" class="btn-red"><i class="fas fa-shopping-cart"></i>{{ $settings['special_cta_label'] ?? '' }}</a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="spimgw">
                    <div class="spglow"></div>
                    <div class="sppbdg"><span class="old">${{ $settings['special_old_price'] ?? '' }}</span><span class="np">${{ $settings['special_new_price'] ?? '' }}</span></div>
                    <img src="{{ str_starts_with($settings['special_image'] ?? '', 'http') ? $settings['special_image'] : asset('img/' . ($settings['special_image'] ?? 'off-img.jpg')) }}" alt="Special Offer"/>
                </div>
            </div>
        </div>
    </div>
</section>