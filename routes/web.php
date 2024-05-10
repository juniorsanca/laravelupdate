<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionUserController;
use Illuminate\Support\Facades\Route;

Route::get('test',function(){

    dispatch(function(){

        logger('hello from the queue');
    })->delay(5);
    return 'Done';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])
    ->middleware('auth');;

Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth');

Route::get('/register', [RegisterUserController::class, 'create']);
Route::post('/register', [RegisterUserController::class, 'store']);

Route::get('/login', [SessionUserController::class, 'create'])
    ->name('login');

Route::post('/login', [SessionUserController::class, 'store']);
Route::post('/logout', [SessionUserController::class, 'destroy']);

/*
started kits laravel breeze
-> Forms :
    registration
    log in
    forgot password
    reset password
    profile
*/
