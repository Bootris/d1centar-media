<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // Lead story: an editor-featured post, else the newest one.
        $featured = Post::published()->with('category')
            ->where('show_on_home', true)
            ->orderByDesc('published_at')
            ->first()
            ?? Post::published()->with('category')->orderByDesc('published_at')->first();

        $latestPosts = Post::published()->with('category')
            ->when($featured, fn ($q) => $q->whereKeyNot($featured->id))
            ->orderByDesc('published_at')
            ->take(6)
            ->get();

        $videoPosts = Post::published()->with('category')
            ->whereNotNull('video_url')
            ->where('video_url', '!=', '')
            ->orderByDesc('published_at')
            ->take(4)
            ->get();

        return view('home', compact('featured', 'latestPosts', 'videoPosts'));
    }
}
