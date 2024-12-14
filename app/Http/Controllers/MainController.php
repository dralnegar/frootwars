<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function __construct() {
    }    

    public function index(Request $request) {
        return view('facebuk/index');
    }

    public function post(Request $request) {
        return view('blog/post');
    }

}
