<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        if(auth()->check()){
            return redirect('/Home');
        }

        return view('welcome');
    }

    public function store(Request $r){
        $attributes = request()->validate([
            'email' => ["required", "email"],
            'password' => ["required"]
        ]);

        if(auth()->attempt($attributes)){
            session()->flash('success', 'Welcome Back!');
            return redirect('/');
        }

        return back()
                ->withInput()
                ->withErrors(['email' => 'your provided credentials could not be verified.']);
    }

    public function destroy()
    {        
        auth()->logout();
        session()->flash('success', 'Goodbye!');
        return redirect('/');
    }
}
