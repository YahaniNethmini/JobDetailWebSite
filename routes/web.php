<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//index
Route::get('/jobs', function (){
    $job = Job::with('employee')->latest()->simplePaginate(3);

    return view('jobs.index',[
        'jobs' => $job
    ]);
});

//create
Route::get('jobs/create', function (){
    return view('jobs.create');
});

//show
Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

//store
Route::post('/jobs', function (){
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
});

//edit
Route::get('/jobs/{id}/edit', function ($id){
    $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

//update
Route::patch('/jobs/{id}', function ($id){
    request()->validate([
        'title' => ['required'],
        'salary' => ['required']
    ]);

    $job = Job::find($id);

    $job->update([
        'name' => request('title'),
        'price' => request('salary')
    ]);

    return redirect('/jobs/' . $job->id);
});

//delete
Route::delete('/jobs/{id}', function ($id){
    $job = Job::find($id);

    $job->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
