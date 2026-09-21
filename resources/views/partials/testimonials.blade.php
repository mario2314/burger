<section id="testimonials">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['testimonials_label'] ?? '' }}</span>
            <h2 class="stitle">{!! $settings['testimonials_title'] ?? '' !!}</h2>
            <div class="sline"></div>
        </div>
        <div class="swiper tesSwiper" data-aos="fade-up">
            <div class="swiper-wrapper">
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div class="tescard">
                        <div class="tesq">"</div>
                        <div class="tess">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                            <i class="fas fa-star"></i>
                            @endfor
                        </div>
                        <p class="testxt">{{ $testimonial->review }}</p>
                        <div class="tesauth">
                            <img src="{{ str_starts_with($testimonial->image, 'http') ? $testimonial->image : asset('img/testimonial/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"/>
                            <div>
                                <div class="tesnm">{{ $testimonial->name }}</div>
                                <div class="tesrl">{{ $testimonial->role }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination mt-4" style="position:static;"></div>
        </div>
    </div>
</section>