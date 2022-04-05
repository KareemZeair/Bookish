<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        if(auth()->check()){
            return redirect('/Home');
        }

        return view('user.login');
    }

    public function store(Request $r){
        $attributes = request()->validate([
            'email' => ["required", "email"],
            'password' => ["required"]
        ]);

        if(! auth()->attempt($attributes)){
            return back()
                    ->withInput()
                    ->withErrors(['email' => 'your provided credentials could not be verified.']);
        }
        
        session()->flash('success', 'Welcome Back!');
        return redirect('/');
    }

    public function destroy()
    {        
        auth()->logout();
        session()->flash('success', 'Goodbye!');
        return redirect('/');
    }
}
