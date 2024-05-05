<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
    // $jobs = Job::all();
    // dd($jobs[0]->title);
});
//jobs
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
//create form
Route::get('/jobs/create', function () {
    return view('jobs.create');
});
//job
Route::get('/jobs/show/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});
//store
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
//edit
Route::get('/jobs/edit/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});
//update
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
//destroy
Route::delete('/jobs/{id}', function ($id) {
    // authorize
    // delete the job
    // redirect
    Job::findOrFail($id)->delete();
    return redirect('/jobs');
});
//contact
Route::get('/contact', function () {
    return view('contact');
});
