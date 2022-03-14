<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function extractOLID($seeds)
    {
        $s = Null;
        foreach ($seeds as $seed) {
            if (str_starts_with($seed, "/books")) {
                $s = substr($seed, strlen("/books"));   //might need checking for when the string starts (index 0?)
                break;
            }
        }
        return $s;
    }

    public function search(Request $request)
    {

        $endpoint = 'http://openlibrary.org/search.json';
        $params = array('q' => $request->keyword);
        $url = $endpoint . '?' . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data);


        //$numFound = $data->numFound;
        //todo make sure index is not out of range
        $start_index = ($request->page - 1) * 20;
        $books = $data->docs;
        // $books = array_slice($data->docs, $start_index, 19);
        //1,    2,    3,4,5
        //0-19, 20-39, ...

        $booksData = array();

        foreach ($books as $book) {
            // dd($data);
            $bookData = array();
            $bookData['title'] = $book->title;
            $bookData['author_name'] = $book->author_name[0] ?? $book->author_name ?? null;
            $bookData['publish_date'] = $book->publish_date[1] ?? $book->publish_date[0] ?? $book->publish_date ?? null;
            $bookData['olid'] = BookController::extractOLID($book->seed);
            array_push($booksData, $bookData);
        }

        return view('searchResults', [
            'books' => $booksData,
            'page' => $request->page,
            'keyword' => $request->keyword
        ]);
    }

    public function show()
    {
        // TODO: check movie is not already in wishlit or past reads
        // olid >> *****M to be used in Books API for description 
    }

    public function store()
    {
    }
}
