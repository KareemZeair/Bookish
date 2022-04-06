<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ReviewController extends Controller
{
    public function store(Book $book)
    {

        //make sure user didn't comment before
        request()->validate([
            'review_content' => ['required'],
            'rating' => ['required', 'numeric', 'min:0', 'max:5']
        ]);

        $book->reviews()->create([
            'user_id' => auth()->user()->id,
            'content' => request('review_content'),
            'rating' => request('rating')
        ]);
        return back();
    }
}
