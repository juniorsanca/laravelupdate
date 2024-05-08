<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    //
    public function index()
    {
        // dd('hello');
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        //validation...
        $request->validate([
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
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        Gate::define('edit-job', function(User $user, Job $job){
            return $job->employer->user->is($user);
        });

        if (Auth::guest()) {
            return redirect('/login');
        }
        // if ($job->employer->user->isNot(Auth::user()))
        // {
        //     abort(403);
        // }

        Gate::authorize('edit-job', $job);
        return view('jobs.edit', ['job' => $job]);
    }

    public function update($id)
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);
        $job = Job::findOrFail($id);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
