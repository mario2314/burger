<section id="gallery">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['gallery_label'] ?? '' }}</span>
            <h2 class="stitle">{!! $settings['gallery_title'] ?? '' !!}</h2>
            <div class="sline"></div>
        </div>
        <div class="ggrid" data-aos="fade-up">
            @foreach($galleryItems as $index => $item)
            <div class="gitem"
                data-gi="{{ $index }}"
                data-gimg="{{ str_starts_with($item->image, 'http') ? $item->image : asset('img/portfolio/' . $item->image) }}"
                data-gtitle="{{ $item->title }}"
                data-gdesc="{{ $item->description }}">
                <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('img/portfolio/' . $item->image) }}" alt="{{ $item->title }}"/>
                <div class="gover"><span><i class="fas fa-expand-alt"></i> {{ $item->title }}</span></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div id="galPop">
    <div class="gpbox">
        <button class="gpclose" id="gpClose"><i class="fas fa-times"></i></button>
        <img id="gpImg" src="" alt=""/>
        <div class="gpcap">
            <h5 id="gpTitle"></h5>
            <p id="gpDesc"></p>
        </div>
        <div class="gpnav">
            <button id="gpPrev"><i class="fas fa-chevron-left me-1"></i>Prev</button>
            <button id="gpNext">Next <i class="fas fa-chevron-right ms-1"></i></button>
        </div>
    </div>
</div>