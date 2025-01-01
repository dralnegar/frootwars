<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request) {
        return view('admin.dashboard', [
            'categoryCount' => Category::count(),
            'postCount' => Post::count(),
            'userCount' => User::count(),
        ]);
    }

}
