<div class="mqsec">
    <div class="mqtrack">
        @foreach($marqueeItems as $item)
        <div class="mqitem"><i class="fas fa-circle"></i>{{ $item->label }}</div>
        @endforeach
        @foreach($marqueeItems as $item)
        <div class="mqitem"><i class="fas fa-circle"></i>{{ $item->label }}</div>
        @endforeach
    </div>
</div>

<section id="category">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="slbl">{{ $settings['category_label'] ?? '' }}</span>
            <h2 class="stitle">{!! $settings['category_title'] ?? '' !!}</h2>
            <div class="sline"></div>
            <p class="sdesc mx-auto" style="max-width:480px;">{{ $settings['category_subtitle'] ?? '' }}</p>
        </div>
        <div class="row g-3 justify-content-center">
            <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="0">
                <div class="catcard active" data-filter="all">
                    <img class="catimg" src="{{ asset('img/category/' . ($settings['category_all_image'] ?? '1.jpg')) }}" alt="{{ $settings['category_all_label'] ?? 'All Items' }}"/>
                    <div class="catnm">{{ $settings['category_all_label'] ?? 'All Items' }}</div>
                    <div class="catct">{{ $menuItems->count() ?? 0 }} items</div>
                </div>
            </div>
            @foreach($categories as $index => $category)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 70 }}">
                <div class="catcard" data-filter="{{ $category->slug }}">
                    <img class="catimg" src="{{ str_starts_with($category->image, 'http') ? $category->image : asset('img/category/' . $category->image) }}" alt="{{ $category->name }}"/>
                    <div class="catnm">{{ $category->name }}</div>
                    <div class="catct">{{ $category->menu_items_count ?? 0 }} items</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>