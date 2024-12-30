<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
//        $request->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        if (! auth()->attempt($request->only('email', 'password'))) {
//            return back()->with('status', 'Invalid login details');
//        }
//
//        return redirect('/')->with('status', 'You are now logged in');
    }
}
