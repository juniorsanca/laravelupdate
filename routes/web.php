<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

/*--------[ HOME ]-------*/
Route::get('/', function () {
    return view('home');
    // $jobs = Job::all();
    // dd($jobs[0]->title);
});
/*--------[ JOBS ]-------*/
Route::get('/jobs', function () {
    /*
        barryvdh/laravel-debugbar --dev (package on github)
        -> replace the lazy loading
        -> $jobs = Job::with('employer')->get();
        -> $jobs = Job::with('employer')->paginate(3);
        -> $jobs = Job::with('employer')->cursorPaginate(3);
    */
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});
/*--------[ CREATE FORM ]-------*/
Route::get('/jobs/create', function () {
    return view('jobs.create');
});
/*--------[ JOB ]-------*/
// Route::get('/jobs/show/{id}', function ($id) {
//     $job = Job::find($id);
//     return view('jobs.show', ['job' => $job]);
// });
Route::get('/jobs/show/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
});
/*---------[ STORE ]--------*/
Route::post('/jobs', function () {
    /*
        to verify what we are sending
        dd(request()->all());
        dd(request('title')->all());
    */
    //validation...
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    //create...
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
     ]);
     return redirect('/jobs');
});
/*---------[ EDIT ]--------*/
Route::get('/jobs/edit/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});
/*--------[ UPDATE ]-------*/
/*
    Route::post('/jobs/update/{id}', function ($id) {
        $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);
    });
 */
Route::patch('/jobs/{id}', function ($id) {
    // validate
    // authorize...
    // and persist
    // redirect to the job page
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
    $job = Job::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    return redirect('/jobs/show/' . $job->id);
});
/*--------[ DELETE ]-------*/
// Route::delete('/jobs/{id}', function ($id) {
//     // authorize
//     // delete the job
//     // redirect
//     Job::findOrFail($id)->delete();
//     return redirect('/jobs');
// });
Route::delete('/jobs/{job}', function (Job $job) {
    // authorize
    // delete the job
    // redirect
    $job->delete();
    return redirect('/jobs');
});
/*--------[ CONTACT ]-------*/
Route::get('/contact', function () {
    return view('contact');
});
