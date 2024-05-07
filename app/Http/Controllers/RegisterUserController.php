<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // dd('hello');
        //validate
        //create user
        //log in
        //redirect dashboard

        $attributes = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'], // password_confirmation
        ]);

        // dd($validatedAttributes);
        $user = User::create($attributes);

        // User::create([
        //     'first_name' => request('first_name'),
        //     'last_name' => request('last_name'),
        //     'email' => request('email'),
        //     'password' => request('password'),
        // ]);

        Auth::login($user);
        // redirect somewhere
        return redirect('/jobs');
    }
}
