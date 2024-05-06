<?php

use App\Http\Controllers\JobController;
use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::view('/', 'home');
/*--------[ JOBS ]-------*/
//without controller
// Route::get('/jobs', function () {
//     /*
//         barryvdh/laravel-debugbar --dev (package on github)
//         -> replace the lazy loading
//         -> $jobs = Job::with('employer')->get();
//         -> $jobs = Job::with('employer')->paginate(3);
//         -> $jobs = Job::with('employer')->cursorPaginate(3);
//     */
//     $jobs = Job::with('employer')->latest()->simplePaginate(3);
//     return view('jobs.index', [
//         'jobs' => $jobs
//     ]);
// });
//with controller
Route::get('/jobs', [JobController::class,  'index']);

/*--------[ CREATE FORM ]-------*/
Route::get('/jobs/create', [JobController::class,  'create']);

/*--------[ JOB ]-------*/
// Route::get('/jobs/show/{id}', function ($id) {
//     $job = Job::find($id);
//     return view('jobs.show', ['job' => $job]);
// });
Route::get('/jobs/show/{job}', [JobController::class,  'show']);

/*---------[ STORE ]--------*/
Route::post('/jobs', [JobController::class,  'index']);

/*---------[ EDIT ]--------*/
Route::get('/jobs/edit/{id}', [JobController::class,  'edit']);

/*--------[ UPDATE ]-------*/
    // validate
    // authorize...
    // and persist
    // redirect to the job page
/*
    Route::post('/jobs/update/{id}', function ($id) {
        $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);
    });
 */
Route::patch('/jobs/{id}', [JobController::class,  'update']);

/*--------[ DELETE ]-------*/
/* Other way to write this */
// Route::delete('/jobs/{id}', function ($id) {
//     // authorize
//     // delete the job
//     // redirect
//     Job::findOrFail($id)->delete();
//     return redirect('/jobs');
// });
/* Steps tot do this */
    // authorize
    // delete the job
    // redirect
Route::delete('/jobs/{job}', [JobController::class,  'destroy']);
Route::view('/contact', 'contact');
