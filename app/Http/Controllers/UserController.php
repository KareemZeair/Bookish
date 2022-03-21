<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;

class UserController extends Controller
{
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
        $tempBook = json_decode($r->details, true);
        $user = Auth::user();
        $dbBook = Book::where('key', $tempBook['key'])->first();
        if($dbBook === null){
            $dbBook = new Book(); 
            $dbBook->title = $tempBook['title'];
            $dbBook->isbn = $tempBook['isbn'];
            $dbBook->author_name = $tempBook['author_name'];
            $dbBook->publish_date = $tempBook['publish_date'];
            $dbBook->key = $tempBook['key'];
            $dbBook->img = $tempBook['img'];
            $dbBook->save();
        }
        $user->wish_list()->attach($dbBook->id);
        $user->save();

        return redirect('/Home');

    }

    public function pastreads(Request $r)
    {
        $tempBook = json_decode($r->details, true);
        $user = Auth::user();
        $dbBook = Book::where('key', $tempBook['key'])->first();
        if($dbBook === null){
            $dbBook = new Book(); 
            $dbBook->title = $tempBook['title'];
            $dbBook->isbn = $tempBook['isbn'];
            $dbBook->author_name = $tempBook['author_name'];
            $dbBook->publish_date = $tempBook['publish_date'];
            $dbBook->key = $tempBook['key'];
            $dbBook->img = $tempBook['img'];
            $dbBook->save();
        }
        $user->past_read()->attach($dbBook->id);
        $user->save();

        return redirect('/Home');

    }
}
