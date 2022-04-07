<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function show($key)
    {
        $book = Book::where('key', $key)->first();
        
        if(! $book){
            return redirect('/Home');
        }
        
        return view('book.show', [
            'book' => $book,
        ]);
        
    }

}
