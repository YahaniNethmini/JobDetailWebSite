<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $job = Job::with('employee')->latest()->simplePaginate(3);

        return view('jobs.index',[
            'jobs' => $job
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'name' => request('title'),
            'price' => request('salary'),
            'employee_id' => 1
        ]);

        $employee = $job->employee;
        if ($employee && !empty($employee->email) && filter_var($employee->email, FILTER_VALIDATE_EMAIL)) {
            Mail::to($employee->email)->send(
                new JobPosted($job)
            );
        } else {
            return redirect('/jobs')->with('error', 'The employee does not have a valid email address.');
        }

        return redirect('/jobs');
    }

    public function update(Job $job)
    {
        Gate::authorize('edit-job', $job);

        request()->validate([
            'title' => ['required'],
            'salary' => ['required']
        ]);

        $job->update([
            'name' => request('title'),
            'price' => request('salary')
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        Gate::authorize('edit-job', $job);

        $job->delete();

        return redirect('/jobs');
    }
}
