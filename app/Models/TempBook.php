<?php

namespace App\Models;

class TempBook 
{
    public $fallback_img = "/MediaAssets/fallback.png";
    public $key;
    public $title;
    public $author_name;
    public $publish_date;
    public $olid;
    public $isbn;
    public $img;
    public $plot;

    public static function extractOLID($seeds)
    {
        $s = Null;
        foreach ($seeds as $seed) {
            if (str_starts_with($seed, "/books")) {
                $s = substr($seed, strlen("/books")+1);

                break;
            }
        }
        return $s;
    }

    public static function extractISBN($isbns)
    {   
        if(! $isbns){
            return null;
        }

        $i = Null;
        foreach ($isbns as $isbn) {
            if (str_starts_with($isbn, "978") and strlen($isbn) == 13) {
                $i = $isbn;
                break;
            }
        }
        return $i;
    }

    public static function from_json( $bookData ) {
        $instance = new self();
        $instance->key = $bookData['key'];
        $instance->title = $bookData['title'];
        $instance->author_name = $bookData['author_name'];
        $instance->publish_date = $bookData['publish_date'];
        $instance->olid = $bookData['olid'];
        $instance->isbn = $bookData['isbn'];
        $instance->img = $bookData['img'];

        return $instance;
    }

    public static function from_api( $apiBook ) {
        $instance = new self();

        $instance->key = substr($apiBook->key, strlen("/works")+1);
        $instance->title = $apiBook->title;
        $instance->author_name = $apiBook->author_name[0] ?? $apiBook->author_name ?? null;
        $instance->publish_date = $apiBook->publish_date[1] ?? $apiBook->publish_date[0] ?? $apiBook->publish_date ?? null;
        $instance->olid = TempBook::extractOLID($apiBook->seed);
        $instance->isbn = TempBook::extractISBN($apiBook->isbn ?? []);
        $instance->img = "https://covers.openlibrary.org/b/olid/" . $instance->olid . "-L.jpg";

        return $instance;
    }
    
}
