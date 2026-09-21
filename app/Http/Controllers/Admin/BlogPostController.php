<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class BlogPostController extends Controller
{
    public function index()
    {
        return view('admin.blog.index');
    }

    public function list()
    {
        $blogPosts = BlogPost::latest()->get()->map(fn($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'author' => $post->author,
            'tag' => $post->tag,
            'is_active' => $post->is_active,
            'image_url' => str_starts_with($post->image, 'http') ? $post->image : asset('img/blog/' . $post->image),
            'edit_url' => route('admin.blog.edit', $post),
            'destroy_url' => route('admin.blog.destroy', $post),
        ]);

        return response()->json($blogPosts);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'tag'            => 'required|string|max:255',
            'author'         => 'required|string|max:255',
            'image'          => 'required|string|max:500',
            'content'        => 'nullable|string',
            'comments_count' => 'nullable|integer',
            'is_active'      => 'nullable|boolean',
        ]);

        if (!$this->isAllowedImageUrl($request->image)) {
            return response()->json([
                'message' => 'URL gambar tidak valid atau domain tidak diizinkan.',
                'errors' => [
                    'image' => ['URL gambar tidak valid atau domain tidak diizinkan. Gunakan URL dari Google, Cloudinary, Unsplash, Pexels, atau domain terpercaya lainnya.']
                ],
            ], 422);
        }

        BlogPost::create([
            'title'          => strip_tags(trim($request->title)),
            'slug'           => Str::slug(strip_tags($request->title)) . '-' . Str::random(5),
            'tag'            => strip_tags(trim($request->tag)),
            'author'         => strip_tags(trim($request->author)),
            'image'          => strip_tags(trim($request->image)),
            'content'        => Purifier::clean($request->input('content')),
            'comments_count' => $request->comments_count ?? 0,
            'is_active'      => $request->boolean('is_active'),
        ]);

        return response()->json([
            'message' => 'Blog post berhasil ditambahkan.',
            'redirect' => route('admin.blog.index'),
        ]);
    }

    public function edit(BlogPost $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, BlogPost $blog)
    {
        $request->validate([
            'title'          => 'required|string|max:255',
            'tag'            => 'required|string|max:255',
            'author'         => 'required|string|max:255',
            'image'          => 'required|string|max:500',
            'content'        => 'nullable|string',
            'comments_count' => 'nullable|integer',
            'is_active'      => 'nullable|boolean',
        ]);

        if (!$this->isAllowedImageUrl($request->image)) {
            return response()->json([
                'message' => 'URL gambar tidak valid atau domain tidak diizinkan.',
                'errors' => [
                    'image' => ['URL gambar tidak valid atau domain tidak diizinkan. Gunakan URL dari Google, Cloudinary, Unsplash, Pexels, atau domain terpercaya lainnya.']
                ],
            ], 422);
        }

        $blog->update([
            'title'          => strip_tags(trim($request->title)),
            'tag'            => strip_tags(trim($request->tag)),
            'author'         => strip_tags(trim($request->author)),
            'image'          => strip_tags(trim($request->image)),
            'content'        => Purifier::clean($request->input('content')),
            'comments_count' => $request->comments_count ?? 0,
            'is_active'      => $request->boolean('is_active'),
        ]);

        return response()->json([
            'message' => 'Blog post berhasil diupdate.',
            'redirect' => route('admin.blog.index'),
        ]);
    }

    public function destroy(BlogPost $blog)
    {
        $blog->delete();
        return response()->json(['message' => 'Blog post berhasil dihapus.']);
    }

    private function isAllowedImageUrl(?string $url): bool
    {
        if (empty($url)) return false;

        if (!filter_var($url, FILTER_VALIDATE_URL)) return false;

        $scheme = parse_url($url, PHP_URL_SCHEME);
        if ($scheme !== 'https') return false;

        $allowedDomains = [
            'lh3.googleusercontent.com',
            'lh4.googleusercontent.com',
            'lh5.googleusercontent.com',
            'lh6.googleusercontent.com',
            'storage.googleapis.com',
            'drive.google.com',
            'images.google.com',
            'photos.google.com',
            'googleusercontent.com',
            'res.cloudinary.com',
            'images.unsplash.com',
            'plus.unsplash.com',
            'images.pexels.com',
            'www.pexels.com',
            'cdn.pixabay.com',
            'upload.wikimedia.org',
            'i.imgur.com',
            'imgur.com',
            'i0.wp.com',
            'i1.wp.com',
            'i2.wp.com',
            'cdn.discordapp.com',
            'media.istockphoto.com',
            'images.istockphoto.com',
            'static.vecteezy.com',
            'img.freepik.com',
            'images.shutterstock.com',
        ];

        $host = parse_url($url, PHP_URL_HOST);

        foreach ($allowedDomains as $domain) {
            if ($host === $domain || str_ends_with($host, '.' . $domain)) {
                return true;
            }
        }

        return false;
    }
}