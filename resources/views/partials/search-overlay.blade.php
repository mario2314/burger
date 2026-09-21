<div id="searchOv">
    <button class="sovclose" id="searchClose"><i class="fas fa-times"></i></button>
    <div class="sovbox">
        <h4>{{ $settings['search_title'] ?? '' }}</h4>
        <div class="sovinput">
            <input type="text" id="searchInput" placeholder="Search burgers, pizza, chicken..." autocomplete="off"/>
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="sovcats">
            <div class="sovcat active" data-cat="all">
                <img src="{{ asset('img/category/' . ($settings['category_all_image'] ?? '1.jpg')) }}" alt=""/>{{ $settings['category_all_label'] ?? 'All Items' }}
            </div>
            @foreach($categories ?? [] as $cat)
            <div class="sovcat" data-cat="{{ $cat->slug }}">
                <img src="{{ str_starts_with($cat->image, 'http') ? $cat->image : asset('img/category/' . $cat->image) }}" alt=""/>{{ $cat->name }}
            </div>
            @endforeach
        </div>
        <div class="sovtrend">
            <p><i class="fas fa-fire me-1" style="color:var(--secondary);"></i>{{ $settings['search_trending_label'] ?? '' }}</p>
            @foreach($trendingTags ?? [] as $tag)
            <span class="ttag">{{ $tag->label }}</span>
            @endforeach
        </div>
    </div>
</div>