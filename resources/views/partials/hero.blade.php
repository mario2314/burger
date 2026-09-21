<section id="hero">
    <div class="hs hs1"></div>
    <div class="hs hs2"></div>
    <div class="container">
        <div class="row align-items-center g-5" style="min-height:88vh;">
            <div class="col-lg-6">
                <div class="hbadge">
                    <div class="hbi"><i class="fas fa-star"></i></div>
                    <span>{{ $settings['hero_badge_text'] ?? '' }}</span>
                </div>
                <h1 class="htitle">{!! $settings['hero_title'] ?? '' !!}</h1>
                <p class="hdesc">{{ $settings['hero_description'] ?? '' }}</p>
                <div class="d-flex flex-wrap gap-3 mb-2">
                    <a href="{{ route('menu.index') }}" class="btn-red"><i class="fas fa-utensils"></i>{{ $settings['hero_cta_label'] ?? 'Explore Menu' }}</a>
                    <a href="{{ $settings['hero_video_url'] ?? '#' }}" class="magnific_popup btn-play popup-youtube">
                        <div class="pico"><i class="fas fa-play"></i></div>
                        
                    </a>
                </div>
                <div class="hstats d-flex gap-3 flex-wrap mt-4">
                    @foreach($heroStats as $index => $stat)
                    <div class="hstat"><span class="snum">{{ $stat->number }}<em>{{ $stat->suffix }}</em></span><small>{{ $stat->label }}</small></div>
                    @if(!$loop->last)
                    <div class="sdiv"></div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div style="position:relative;text-align:center;">
                    <div class="hcircle">
                        <img src="{{ str_starts_with($settings['hero_image'] ?? '', 'http') ? $settings['hero_image'] : asset('img/' . ($settings['hero_image'] ?? 'banner-img.jpg')) }}" alt="Hero"/>
                    </div>
                    @foreach($heroBadges as $index => $badge)
                    <div class="fcard fc{{ $index + 1 }}">
                        <div class="fcoi {{ $badge->color }}"><i class="fas {{ $badge->icon }}"></i></div>
                        <div><span class="fcnum">{{ $badge->title }}</span><span class="fcsm">{{ $badge->subtitle }}</span></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>