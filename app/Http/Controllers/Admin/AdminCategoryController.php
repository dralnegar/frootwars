<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\Post;
use App\Models\Common;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class AdminCategoryController
 * 
 * This class is responsible for handling the administration of categories.
 */
class AdminCategoryController extends Controller
{
   
    public function index() {
        return view('admin.categories.index', [
            'categories' => Category::paginate(50)
        ]);
    }
    
    /**
     * Create a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', [
            'category' => new Category()
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
        $attributes = $this->validateCategory();
        Category::create($attributes);
        
        return redirect('admin/categories');
    }

    /**
     * Edit a categoryu.
     *
     * @param  Category  $post  The post to be edited.
     * @return \Illuminate\Http\Response
     */
     public function edit(Category $category)
    {
        if (Auth()->user()->access_level < 2) {
            return back()->with('error', 'You do not have permission to edit this category.');
        }
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $attributes = $this->validateCategory($category);
        $category->update($attributes);
        
        return redirect('/admin/categories')->with('success', 'Category Updated');
    }

    /**
     * Delete a category
     *
     * @param  Category  $category The category to be deleted.
     * @return void
     */
    public function destroy(Category $category)
    {
        if (Auth()->user()->access_level < 2) {
            return back()->with('error', 'You do not have permission to delete this category.');
        }
        $category->delete();
        return back()->with('success', 'Category Deleted');
    }

    /**
     * Validates a Category object.
     *
     * @param Category|null $ The Category object to validate.
     * @return array An array containing validation errors, if any.
     */
    protected function validateCategory(?Category $category = null): array {
        $category ??= new Post();
        return request()->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories', 'slug')->ignore($category)],
            
        ]);  
        return $attributes;   
    }

}
