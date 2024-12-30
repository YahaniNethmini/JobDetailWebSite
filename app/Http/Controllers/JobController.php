<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

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

        Job::create([
            'name' => request('title'),
            'price' => request('salary'),
            'employee_id' => 1
        ]);

        return redirect('/jobs');
    }

    public function update(Job $job)
    {
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
        $job->delete();

        return redirect('/jobs');
    }
}
