<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {
        Request()->validate([
            'email' => 'required|email'
        ]);
        
        try {
            $newsletter->subscribe(request('email'));
            return redirect('/posts')->with('success', 'You are now signed up for our newsletter.');
        } catch (\Exception $e) {
            throw $e;
        }  
    }
}


