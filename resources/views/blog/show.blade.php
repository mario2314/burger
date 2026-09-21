@extends('layouts.app')

@section('content')
<section style="padding:60px 0;">
    <div class="container" style="max-width:800px;">
        <div class="mb-4">
            <span class="bltag">{{ $post->tag }}</span>
            <h1 style="font-family:'Playfair Display',serif; font-weight:900; margin:12px 0;">{{ $post->title }}</h1>
            <div class="blmeta mb-4">
                <span><i class="fas fa-user"></i> {{ $post->author }}</span>
                <span><i class="fas fa-calendar"></i> {{ $post->created_at->format('d M Y') }}</span>
                <span><i class="fas fa-comment"></i> {{ $post->comments_count }} Comments</span>
            </div>
        </div>

        <div class="blimg mb-4" style="height:auto; border-radius:18px; overflow:hidden;">
            <img src="{{ str_starts_with($post->image, 'http') ? $post->image : asset('img/blog/' . $post->image) }}" alt="{{ $post->title }}" style="width:100%; object-fit:cover;">
        </div>

        <div class="blog-content" style="font-size:0.95rem; line-height:1.9; color:#555;">
            {!! $post->content !!}
        </div>

        <div class="mt-5">
            <a href="{{ route('blog.index') }}" class="btn-red"><i class="fas fa-arrow-left"></i> Kembali ke Blog</a>
        </div>

        @if($recentPosts->count())
        <div class="mt-5 pt-4" style="border-top:1px solid #eee;">
            <h5 class="fw-bold mb-3">Artikel Lainnya</h5>
            <div class="row g-3">
                @foreach($recentPosts as $rp)
                <div class="col-md-4">
                    <a href="{{ route('blog.show', $rp->slug) }}" class="text-decoration-none">
                        <div class="blcard">
                            <div class="blimg" style="height:140px;">
                                <img src="{{ str_starts_with($rp->image, 'http') ? $rp->image : asset('img/blog/' . $rp->image) }}" alt="{{ $rp->title }}">
                            </div>
                            <div class="blbody">
                                <div class="bltit" style="font-size:0.9rem;">{{ $rp->title }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection