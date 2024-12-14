<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function __construct() {
    }    

    public function index(Request $request) {
        return view('facebuk/index');
    }

    

}
