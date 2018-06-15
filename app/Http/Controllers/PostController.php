<?php

namespace App\Http\Controllers;

use Cache;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    const CACHE_DURATION_POSTS_MIN = 10;

    /**
     * Show the application dashboard.
     */
    public function index(Request $request): View
    {
        $page = 1;
        $search = null;

        if ($request->has('page')) {
            $page = $request->input('page');
        }

        if ($request->has('q')) {
            $search = $request->input('q');
        }

        $cache_name = "posts:search:{$search}:page:{$page}";

        if (Cache::has($cache_name)) {
            $posts = Cache::get($cache_name);
        } else {
            $posts = Post::search($search)
                             ->with('author')
                             ->withCount('thumbnail')
                             ->latest()
                             ->paginate(20);

            Cache::put($cache_name, $posts, self::CACHE_DURATION_POSTS_MIN);
        }

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
