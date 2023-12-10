<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminPostController;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [PostController::class, 'index'])->name('home');
 
Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts,
    ]);
})->name('author.posts');

Route::get('posts', [PostController::class, 'index'])->name('posts');
Route::get('posts/{post}', [PostController::class, 'show'])->name('post');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('comment.store')->middleware('auth');


Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts.index', [
        'posts' => Post::where('category_id', $category->id)->paginate(3),
        'categoories' => Category::orderby('name', 'desc')->get(),
        'currentCategory' => $category,
    ]);
})->name('category');

Route::post('newsletter', NewsletterController::class)->name('newsletter');

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->name('login.store');
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout')->middleware('auth');


Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->middleware('admin')->name('admin.dashboard');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin')->name('post.list');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin')->name('post.create');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin')->name('post.store');
Route::get('admin/posts/edit/{post:id}', [AdminPostController::class, 'edit'])->middleware('admin')->name('post.edit');
Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])->middleware('admin')->name('post.update');
Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy'])->middleware('admin')->name('post.delete');




/*
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');
*/

Route::inertia('/welcome', 'Welcome', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
    'frameworks' => [
        'Laravel', 'Vue', 'Inertia',
    ],
]);

Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/post', [BlogController::class, 'post'])->name('blog.post');

Route::inertia('/dashboard', 'Dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    
    Route::inertia('/settings', 'Settings')->name('settings');

    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/users/create', [UsersController::class, 'create'])->can('create', 'App\Models\User')->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->can('create', 'App\Models\User')->name('users.store');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'], 'id')->name('users.edit');
    Route::post('/users/{id}/update', [UsersController::class, 'update'], 'id')->name('users.update');
    Route::get('/users/{id}/delete', [UsersController::class, 'destroy'], 'id')->name('users.delete');
    
});

require __DIR__ . '/auth.php';
