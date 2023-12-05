<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        $attributes = [
            'name' => $request->old('name'),
            'username' => $request->old('username'),
            'email' => $request->old('email'),
            'password' => $request->old('password'),
        ];

        return view('register.create', $attributes);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => 'required|min:8|max:255||unique:users,username',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => request('password'),
        ]);

        auth()->login($user);

        return redirect('/posts')->with('success', 'Your account has been created');
    }

}
