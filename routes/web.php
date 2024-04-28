<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Community',
                'salary' => "30k"
            ],
            [
                'id' => 2,
                'title' => 'Developer',
                'salary' => "50k"
            ],
            [
                'id' => 3,
                'title' => 'YouTuber',
                'salary' => "100k"
            ],
        ]
    ]);
});
Route::get('/jobs/{id}', function ($id) {
        $jobs = [
            [
                'id' => 1,
                'title' => 'Community',
                'salary' => "30k"
            ],
            [
                'id' => 2,
                'title' => 'Developer',
                'salary' => "50k"
            ],
            [
                'id' => 3,
                'title' => 'YouTuber',
                'salary' => "100k"
            ],
        ];

        $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
        // dd($job);
        return view('job', ['job' => $job]);
});
Route::get('/contact', function () {
    return view('contact');
});
