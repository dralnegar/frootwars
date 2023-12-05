<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\Post;
use App\Models\Common;

class AdminPostController extends Controller
{
   
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }
    
    public function create() 
    {

        $categoriesRAW = \App\Models\Category::orderby('name', 'asc')->get();
        $categories = [];
        foreach($categoriesRAW as $category) {
            $categories[$category->id] = $category->name;
        }
        
        return view('admin.posts.create', ['categories' => $categories]);
    }

    public function store(Request $request) 
    {
        $attributes = array_merge($this->validatePost(), [
            'user_id' => Auth()->user()->id,
            'thumbnail' => str_replace('public/', '', $request->file('thumbnail')->store('public/thumbnails'))
        ]);

        Post::create($attributes);
        
        return redirect('/posts/'.$attributes['slug']);
    }

    public function edit(Post $post) 
    {

        $categoriesRAW = \App\Models\Category::orderby('name', 'asc')->get();
        $categories = [];
        foreach($categoriesRAW as $category) {
            $categories[$category->id] = $category->name;
        }
        
        return view('admin.posts.edit', ['categories' => $categories, 'post' => $post]);
    }

    public function update(Request $request, Post $post) 
    {
        $attributes = $this->validatePost($post);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = str_replace('public/', '', $request->file('thumbnail')->store('public/thumbnails'));
        }
            

        $post->update($attributes);
        
        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post) 
    {
        $post->delete();
        return back()->with('success', 'Post Deleted');
    }

    protected function validatePost(?Post $post = null): array {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);  
        return $attributes;   
    }

}
