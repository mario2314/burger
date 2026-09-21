@extends('layouts.app')

@section('title', $post->title . ' - Sarab Blog')

@section('content')
<section style="padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-4">
                    <span class="slbl">{{ $post->tag }}</span>
                    <h1 class="stitle text-start mt-2">{{ $post->title }}</h1>
                    <div class="d-flex gap-3 mt-3" style="color:#888;font-size:.85rem;">
                        <span><i class="fas fa-user me-1"></i>{{ $post->author }}</span>
                        <span><i class="fas fa-calendar me-1"></i>{{ $post->created_at->format('d M Y') }}</span>
                        <span><i class="fas fa-comment me-1"></i>{{ $post->comments_count }} Comments</span>
                    </div>
                </div>
                <img src="{{ str_starts_with($post->image, 'http') ? $post->image : asset('img/blog/' . $post->image) }}"
                     alt="{{ $post->title }}"
                     style="width:100%;border-radius:16px;margin-bottom:32px;object-fit:cover;max-height:400px;">
                <div style="font-size:1rem;line-height:1.9;color:#444;">
                    {!! $post->content ?? '<p>Content coming soon.</p>' !!}
                </div>
                <div class="mt-5">
                    <a href="{{ route('blog.index') }}" class="btn-red"><i class="fas fa-arrow-left me-2"></i>Back to Blog</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection