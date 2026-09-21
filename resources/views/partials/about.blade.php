<section id="about">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="astack">
                    <div class="aexp"><span class="anum">{{ $settings['about_badge_number'] ?? '12+' }}</span><small>{!! $settings['about_badge_label'] ?? 'Years of<br/>Excellence' !!}</small></div>
                    <div class="amain"><img src="{{ str_starts_with($settings['about_image_main'] ?? '', 'http') ? $settings['about_image_main'] : asset('img/' . ($settings['about_image_main'] ?? 'about1.jpg')) }}" alt="Restaurant"/></div>
                    <div class="asm"><img src="{{ str_starts_with($settings['about_image_small'] ?? '', 'http') ? $settings['about_image_small'] : asset('img/' . ($settings['about_image_small'] ?? 'about2.jpg')) }}" alt=""/></div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <span class="slbl">{{ $settings['about_label'] ?? 'Our Story' }}</span>
                <h2 class="stitle text-start">{{ $settings['about_title'] ?? '' }}</h2>
                <div class="sline lft"></div>
                <p class="sdesc mb-4">{{ $settings['about_description'] ?? '' }}</p>
                <div class="mb-4">
                    @foreach($features as $feature)
                    <div class="fti">
                        <div class="ftico {{ $feature->color }}"><i class="fas {{ $feature->icon }}"></i></div>
                        <div>
                            <h6>{{ $feature->title }}</h6>
                            <p>{{ $feature->description }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{ route('menu.index') }}" class="btn-red"><i class="fas fa-book-open"></i>{{ $settings['about_cta_label'] ?? 'View Full Menu' }}</a>
            </div>
        </div>
    </div>
</section>