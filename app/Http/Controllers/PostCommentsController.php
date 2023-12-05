<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;

class PostCommentsController extends Controller
{
    // Add a comment to the given post   
    public function store(Post $post, Request $request) 
    {
        if (!$request->validate([
            'body' => 'required'
        ])) {
            throw ValidationException::withMessages([
                'post' => $request('body'),
            ]);
        };
        
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'body' => $request->body
        ]);
       
        return back();
    }
}
