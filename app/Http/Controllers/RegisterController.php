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
            'fname' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'alpha_dash' ,'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'profile_pic' => ['image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
            'password' => ['required', 'min:8']
        ]);
        $u = new User();
        $u->name = $r->fname;
        $u->username = $r->username;
        $u->email = $r->email;
        $u->password = bcrypt($r->password);
        $u->fav_quote = $r->fav_quote;
        $u->fav_quote_teller = $r->fav_quote_teller;

        if ($r->file('profile_pic') != null){
            $path = "storage/" . $r->file('profile_pic')->store('pic');
            $u->img = $path;
        }

        $u->save();
        
        auth()->login($u);
        
        session()->flash('success', 'Your account has been created');
        return redirect('/');
    }  
}
