<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        Common::dbLogger();
        $options = [
            'posts' => Post::with('category', 'author')
                ->latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(3) // tailwind.blade.php or use ->simplePaginate() for Next / Previous buttons only in simple-tailwind.php, both in views/vendor/paginatation directory
                ->withQueryString(), // Adds the other get parameters passed in the URI
        ];

        return view('posts.index', $options);
    }

    public function show(Post $post)
    {
        // Can be defined as post:slug, but can remove getRouteKeyName() method from Post model
        return view('posts.show', [
            'post' => $post,
        ]);
        // Add constraints to the {post} attribute add ->where('post', '[A-z_\-]+') etc
    }
}
