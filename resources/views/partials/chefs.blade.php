<section id="chefs">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['chefs_label'] ?? '' }}</span>
            <h2 class="stitle">{!! $settings['chefs_title'] ?? '' !!}</h2>
            <div class="sline"></div>
        </div>
        <div class="row g-4">
            @foreach($chefs as $index => $chef)
            <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                <div class="chcard">
                    <div class="chimg">
                        <img src="{{ str_starts_with($chef->image, 'http') ? $chef->image : asset('img/chefs/' . $chef->image) }}" alt="{{ $chef->name }}"/>
                        <div class="chsoc">
                            @if($chef->instagram)
                            <a href="{{ $chef->instagram }}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($chef->facebook)
                            <a href="{{ $chef->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if($chef->twitter)
                            <a href="{{ $chef->twitter }}"><i class="fab fa-twitter"></i></a>
                            @endif
                        </div>
                    </div>
                    <div class="chbody">
                        <div class="chnm">{{ $chef->name }}</div>
                        <div class="chrole">{{ $chef->role }}</div>
                        <div class="chexp">{{ $chef->experience }} years experience</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>