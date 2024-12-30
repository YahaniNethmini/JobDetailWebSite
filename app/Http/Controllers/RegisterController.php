<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
//        $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required|min:4',
//        ]);
//
//        return redirect('/');
    }
}
