<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;

class UserController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $r)
    {
        if(! auth()->check()){
            return redirect('/');
        }

        return view('user',[
            "user" => auth()->user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function wishlist(Request $r)
    {
        $bookData = json_decode($r->details, true);
        $user = Auth::user();
        $book = Book::where('key', $bookData['key'])->first();

        if($book === null){
            $book = Book::from_json($bookData);
        }
        elseif($user->past_read->contains($book->id)){
            $user->past_read()->detach($book->id);
        }

        $user->wish_list()->attach($book->id);
        $user->save();

        return redirect('/Home');

    }

    public function pastreads(Request $r)
    {
        $bookData = json_decode($r->details, true);
        $user = Auth::user();
        $book = Book::where('key', $bookData['key'])->first();
        
        if($book === null){
            $book = Book::from_json($bookData);
        }
        elseif($user->wish_list->contains($book->id)){
            $user->wish_list()->detach($book->id);
        }
        $user->past_read()->attach($book->id);
        $user->save();

        return redirect('/Home');

    }

    public function make_favourite(Request $r)
    {
        $bookData = json_decode($r->details, true);
        $user = Auth::user();
        $book = Book::where('key', $bookData['key'])->first();
        
        if($book === null){
            $book = Book::from_json($bookData);
        }

        $user->fav_book()->associate($book);
        $user->save();
        return redirect('/Home');

    }
}
