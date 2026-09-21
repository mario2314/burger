@php
    $blogPostsData = $blogPosts->map(function ($post) {
        return [
            'slug' => $post->slug,
            'title' => $post->title,
            'tag' => $post->tag,
            'author' => $post->author,
            'comments_count' => $post->comments_count,
            'url' => route('blog.show', $post->slug),
            'image_url' => str_starts_with($post->image, 'http')
                ? $post->image
                : asset('img/blog/' . $post->image),
            'day' => $post->created_at->format('d'),
            'month' => $post->created_at->format('M'),
        ];
    });
@endphp

<div
    id="blog-app"
    data-posts='@json($blogPostsData)'
    data-tags='@json($tags ?? [])'
    data-label="{{ $settings['blog_label'] ?? 'News & Updates' }}"
    data-title="{{ $settings['blog_title'] ?? 'Our Latest <span>Blog</span> Posts' }}"
    data-subtitle="{{ $settings['blog_subtitle'] ?? '' }}"
></div>