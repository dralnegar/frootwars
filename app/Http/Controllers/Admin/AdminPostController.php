<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\Post;
use App\Models\Common;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class AdminPostController
 * 
 * This class is responsible for handling the administration of posts.
 */
class AdminPostController extends Controller
{
   
    public function index() {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }
    
    /**
     * Create a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => \App\Models\Category::getOptions(),
            'post' => new Post()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = array_merge($this->validatePost(), [
            'user_id' => Auth()->user()->id,
            'thumbnail' => str_replace('public/', '', $request->file('thumbnail')->store('public/thumbnails'))
        ]);

        Post::create($attributes);
        
        return redirect('/posts/'.$attributes['slug']);
    }

    /**
     * Edit a post.
     *
     * @param  Post  $post  The post to be edited.
     * @return \Illuminate\Http\Response
     */
     public function edit(Post $post)
    {

        if (Auth()->user()->access_level < 2) {
            return back()->with('error', 'You do not have permission to edit this post.');
        }
       
        $categoriesRAW = \App\Models\Category::orderby('name', 'asc')->get();
        $categories = [];
        foreach($categoriesRAW as $category) {
            $categories[$category->id] = $category->name;
        }
        
        return view('admin.posts.edit', ['categories' => $categories, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $attributes = $this->validatePost($post);
                
        if (isset($attributes['thumbnail'])) {
            if (Storage::drive('public')->exists($post->thumbnail)) {
                Storage::drive('public')->delete($post->thumbnail);
            }
            $attributes['thumbnail'] = str_replace('public/', '', $request->file('thumbnail')->store('public/thumbnails'));
        }
            

        $post->update($attributes);
        
        return redirect('/admin/posts')->with('success', 'Post Updated');
    }

    /**
     * Delete a post.
     *
     * @param  Post  $post  The post to be deleted.
     * @return void
     */
    public function destroy(Post $post)
    {
        
        if (Auth()->user()->access_level < 2) {
            return back()->with('error', 'You do not have permission to delete this post.');
        }
        
        $post->delete();
        return back()->with('success', 'Post Deleted');
    }

    /**
     * Validates a Post object.
     *
     * @param Post|null $post The Post object to validate.
     * @return array An array containing validation errors, if any.
     */
    protected function validatePost(?Post $post = null): array {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'status' => ['required', Rule::in(['Draft', 'Live'])],
        ]);  
        return $attributes;   
    }

}
