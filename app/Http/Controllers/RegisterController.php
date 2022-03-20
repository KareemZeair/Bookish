<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $r){
        request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8']
        ]);

        $u = new User();
        $u->name = $r->name;
        $u->username = $r->username;
        $u->email = $r->email;
        $u->password = bcrypt($r->password);
        $u->save();
        
        auth()->login($u);
        
        session()->flash('success', 'Your account has been created');
        return redirect('/');
    }  
}
