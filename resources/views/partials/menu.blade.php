<section id="menu">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['menu_label'] ?? "What's Cooking" }}</span>
            <h2 class="stitle">{!! $settings['menu_title'] ?? 'Our Delicious <span>Menu</span>' !!}</h2>
            <div class="sline"></div>
            @if(!empty($settings['menu_subtitle']))
            <p class="sdesc mx-auto" style="max-width:480px;">{{ $settings['menu_subtitle'] }}</p>
            @endif
        </div>

        <div class="text-center mb-4" data-aos="fade-up">
            <button class="filtbtn active" data-f="all">All</button>
            @foreach($categories as $category)
            <button class="filtbtn" data-f="{{ $category->slug }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <div class="row g-4" id="mgrid">
            @foreach($menuItems as $item)
            <div class="col-sm-6 col-lg-4 mwrap" data-c="{{ $item->category->slug ?? '' }}" data-aos="fade-up">
                <div class="mcard"
                    data-img="{{ str_starts_with($item->image, 'http') ? $item->image : asset('img/menu/' . $item->image) }}"
                    data-title="{{ $item->name }}"
                    data-cat="{{ $item->category->name ?? '' }}"
                    data-price="${{ number_format($item->price, 2) }}"
                    data-old="{{ $item->old_price ? '$' . number_format($item->old_price, 2) : '' }}"
                    data-rating="{{ $item->rating }}"
                    data-reviews="{{ $item->reviews_count }}"
                    data-cal="{{ $item->calories }}"
                    data-time="{{ $item->prep_time }}"
                    data-desc="{{ $item->description }}"
                    data-tags="{{ $item->tags }}">
                    <div class="mimg">
                        <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('img/menu/' . $item->image) }}" alt="{{ $item->name }}"/>
                        @if($item->badge)
                        <div class="mbdg {{ $item->badge_type }}">
                            @if($item->badge_type === 'hot' || $item->badge_type === 'new')
                            <i class="fas fa-star"></i>
                            @endif
                            {{ $item->badge }}
                        </div>
                        @endif
                        <div class="mhrt"><i class="far fa-heart"></i></div>
                    </div>
                    <div class="mbody">
                        <div class="mcat">{{ $item->category->name ?? '' }}</div>
                        <div class="mtit">{{ $item->name }}</div>
                        <div class="mdesc">{{ $item->description }}</div>
                        <div class="mfoot">
                            <div>
                                <div class="mprice">
                                    ${{ number_format($item->price, 2) }}
                                    @if($item->old_price)
                                    <small>${{ number_format($item->old_price, 2) }}</small>
                                    @endif
                                </div>
                                <div class="mstars"><i class="fas fa-star"></i> <span style="color:#bbb;font-size:.7rem;">({{ $item->reviews_count }})</span></div>
                            </div>
                            <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div id="menuPop">
    <div class="mpbox">
        <button class="mpclose" id="mpClose"><i class="fas fa-times"></i></button>
        <div class="mpimg"><img id="mpImg" src="" alt=""/></div>
        <div class="mpbody">
            <div id="mpCat"></div>
            <div id="mpTitle"></div>
            <div id="mpStars"></div>
            <div id="mpDesc"></div>
            <div id="mpPrice"></div>
            <div class="mpmeta" id="mpMeta"></div>
            <div class="mpqty">
                <button class="mpqbtn" id="mpMinus">-</button>
                <span class="mpqnum" id="mpQnum">1</span>
                <button class="mpqbtn" id="mpPlus">+</button>
                <span style="font-size:.82rem;color:#aaa;margin-left:9px;">portion</span>
            </div>
            <div class="mptags" id="mpTags"></div>
            <button class="mpaddcart" id="mpAddCart"><i class="fas fa-shopping-cart"></i>Add to Cart</button>
        </div>
    </div>
</div>