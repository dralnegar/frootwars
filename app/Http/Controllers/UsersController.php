<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        
        return Inertia::render('Users/Index', [
            'time' => now()->toTimeString(),
            'users' => User::query()
                ->when($request->input('search'), function($query, $search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user),
                        'delete' => Auth::user()->can('delete', $user)
                    ]     
                ]),
            'filters' => $request->only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        User::create($attributes);
    
        return redirect('/users');
    }

    public function edit(Request $request, int $id) {

        $user = User::find($id);
        $params = [
            'id' => $id,
            'name' => $user->name,
            'email' => $user->email
        ];
        
        return Inertia::render('Users/Update', $params);

    }

    public function update(Request $request, int $id) {

        $user = User::find($id);

        $attributes = $request->validate([
            'name' => 'required',
            'email' => [
                'required', 
                'email', 
                Rule::unique('users')->ignore($id, 'id')],
        ]);

        User::where('id', $id)->update($attributes);

        return redirect('/users');
    }

    public function destroy(Request $request, int $id) {
        $user = User::find($id);

        if (Auth::user()->cannot('delete', $user)) {
            abort(403);
        }
        
        User::where('id', $id)->delete();

        return redirect('/users');
    }


}