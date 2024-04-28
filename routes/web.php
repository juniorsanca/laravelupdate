<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'key' => 'value',
        'name' => 'junior sanca'
        ]
);
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
