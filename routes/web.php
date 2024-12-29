<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/jobs', function (){
    $job = Job::with('employee')->latest()->simplePaginate(3);

    return view('jobs.index',[
        'jobs' => $job
    ]);
});

Route::get('jobs/create', function (){
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id){
//    \Illuminate\Support\Arr::first($items, function ($item) use ($id) {
//        return $item['id'] == $id;
//    });

//    $item = \Illuminate\Support\Arr::first(Job::all(), fn($item) => $item['id'] == $id);

//    We can use the find method from the Job model to get the item data by id.
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function (){
    Job::create([
        'name' => request('title'),
        'price' => request('salary'),
        'employee_id' => 1
    ]);

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
