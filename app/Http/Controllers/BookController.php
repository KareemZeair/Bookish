<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function show($key)
    {
        $book = Book::where('key', $key)->first();

        return view('book.show', [
            'book' => $book,
        ]);
        
    }

    public function store()
    {
    }
}
