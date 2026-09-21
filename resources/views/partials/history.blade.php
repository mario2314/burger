<section id="history">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['history_label'] ?? '' }}</span>
            <h2 class="stitle">{!! $settings['history_title'] ?? '' !!}</h2>
            <div class="sline"></div>
            <p class="sdesc mx-auto" style="max-width:480px;">{{ $settings['history_subtitle'] ?? '' }}</p>
        </div>
        <div class="timeline" data-aos="fade-up">
            @foreach($timelines as $item)
            <div class="tli">
                <div class="tl-left">
                    <div class="tlyear">{{ $item->year }}</div>
                    <h5>{{ $item->title }}</h5>
                    <p>{{ $item->description }}</p>
                </div>
                <div class="tl-center"><div class="tldot"></div></div>
                <div class="tl-right">
                    <div class="tlyear">{{ $item->year }}</div>
                    <h5>{{ $item->title }}</h5>
                    <p>{{ $item->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>