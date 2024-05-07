<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionUserController extends Controller
{
    //
    public function create(){
        return view('auth.login');
    }
    public function store()
    {
        // dd(request()->all());
        return view('auth.login');
    }
    public function destroy()
    {
        // dd(request()->all());
        Auth::logout();
        return redirect('/');
    }
}
