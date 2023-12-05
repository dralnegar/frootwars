<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Post::truncate();
        
        Post::factory(5)->create();
        /*
        // \App\Models\User::factory(100)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Post::truncate();
        Category::truncate();
        $user = User::first();
        $categories = ['Personal', 'Family', 'Work'];
        $posts = ['first', 'second', 'third'];
        foreach($categories as $key => $categoryName) {
            $category = Category::create([
                'name' => $categoryName,
                'slug' => strtolower($categoryName)
            ]);

            $post = Post::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'title' => 'My '. $categoryName. ' Post',
                'slug' => 'my-'. $posts[$key]. '-post',
                'excerpt' => '<p>Lorem ipsum dolor sit amet.</p>',
                'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'
            ]);
        }
        */



    }
}
