<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\TempBook;

class TempBookController extends Controller
{
    
    public function search(Request $request)
    {
        $endpoint = 'http://openlibrary.org/search.json';
        $params = array('q' => $request->keyword);
        $url = $endpoint . '?' . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data);


        //todo: use session for page # and keyword 
        // $start_index = ($request->page - 1) * 20;
        // $books = array_slice($data->docs, $start_index, 19);

        $books = $data->docs;
        $t_books = array();

        foreach ($books as $apiBook) {
            $tb = TempBook::from_api($apiBook);            
            array_push($t_books, $tb);
        }

        return view('book.search', [
            'books' => $t_books
        ]);
    }

    public function fetch(Request $request){

        $t_book = TempBook::from_json(json_decode($request->details, true));

        $url = 'https://openlibrary.org/books/' . $t_book->olid . '.json';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($data, true);
        $t_book->plot = $data['description']['value'] ?? $data['description'] ?? null;

        return view('book.show', [
            'book' => $t_book,
        ]);
        
    }
}
