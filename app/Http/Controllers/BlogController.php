<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\SiteSetting;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::where('is_active', true)->latest()->get();
        $settings  = SiteSetting::pluck('value', 'key');
        $tags      = $blogPosts->pluck('tag')->unique()->values();

        return view('pages.blog', compact('blogPosts', 'settings', 'tags'));
    }

    public function show($slug)
    {
        $post        = BlogPost::where('slug', $slug)->where('is_active', true)->firstOrFail();
        $recentPosts = BlogPost::where('is_active', true)->where('id', '!=', $post->id)->latest()->limit(3)->get();
        $settings    = SiteSetting::pluck('value', 'key');

        return view('pages.blog-show', compact('post', 'recentPosts', 'settings'));
    }
}