<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionUserController extends Controller
{
    //
    public function create(){
        return view('auth.login');
    }
    public function store()
    {
        // dd(request()->all());

        //validate
        //attempt to login the user
        //regenerate the session token
        //Redirect

        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to login the user

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }
        //regenerate the session token
        request()->session()->regenerate();

        //Redirect
        return redirect('/');
    }
    public function destroy()
    {
        // dd(request()->all());
        Auth::logout();
        return redirect('/');
    }
}
