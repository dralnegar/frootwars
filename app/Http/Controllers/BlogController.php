<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function __construct() {
    }    

    public function index(Request $request) {
        return view('blog/index');
    }

    public function post(Request $request) {
        return view('blog/post');
    }

    public function test(Request $request) {
        return view('test');
    }

}
