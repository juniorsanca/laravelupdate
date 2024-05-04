<?php

use App\Models\Employer;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
    // $jobs = Job::all();
    // dd($jobs[0]->title);
});
Route::get('/jobs', function () {
    // barryvdh/laravel-debugbar --dev (package on github)
    // replace the lazy loading

    // $jobs = Job::with('employer')->get();
    // $jobs = Job::with('employer')->paginate(3);
    // $jobs = Job::with('employer')->cursorPaginate(3);

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {

    /*-----> to verify what we are sending
     ------> dd(request()->all());
     ------> dd(request('title')->all());
     ----*/

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

Route::get('/jobs/show/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
