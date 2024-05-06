<?php

use App\Http\Controllers\JobController;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'home');

Route::controller(JobController::class)->group(function (){
    Route::get('/jobs', 'index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/show/{job}', 'show');
    Route::get('/jobs/edit/{id}', 'edit');
    Route::patch('/jobs/{id}', 'update');
    Route::delete('/jobs/{job}', 'destroy');
});

Route::view('/contact', 'contact');
