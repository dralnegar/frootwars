<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create(Request $request)
    {
        $attributes = [
            'email' => $request->old('email'),
            'password' => $request->old('password'),
        ];
        return view('register.login', $attributes);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255|email|exists:users,email',
            'password' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        $attributes = [
            'email' => request('email'),
            'password' => request('password')
        ];
        
        if (!auth()->attempt($attributes)) {
            /*
            # The above login check was initially not working, and this was a work around
            $user = User::whereFirst('email', request('email'));
            if (Hash::check(request('password'), $user->password)) {
                return redirect('/posts')->with('success', 'Welcome Back!');   
            }
            */
                       
            throw ValidationException::withMessages([
                'email' => 'You provided credentials could not be varified',
            ]);
            /*
            # The code below performs the same at throuwing the exception above 
            return back()
                ->withErrors(['email' => 'You provided credentials could not be varified'])
                ->withInput();
            */

            session()->regenerate();

            return redirect('/posts')->with('success', 'Welcome Back!');
        } 
        
        
        
        return redirect('/posts')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/posts')->with('success', 'Goodbye!');
    }
}
