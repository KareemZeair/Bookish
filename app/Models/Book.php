<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public static $fallback_img = "/MediaAssets/fallback.png";

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    public function isWishlisted()
    {
        if(auth()->user()){
            return (bool) auth()->user()->wish_list->contains($this);
        }
    }

    public function isPastread()
    {
        if(auth()->user()){
            return (bool) auth()->user()->past_read->contains($this);
        }
    }

    public function isFavourite()
    {
        if(auth()->user()){
            return (bool) (auth()->user()->fav_book == $this);
        }
    }

    public function isReviewed()
    {
        if(auth()->user()){
            return (bool) (auth()->user()->reviews->pluck('book_id')->contains($this->id));
        }
    }

    public static function from_json( $bookData ):self {
        $instance = new self();

        $instance->title = $bookData['title'];
        $instance->isbn = $bookData['isbn'];
        $instance->author_name = $bookData['author_name'];
        $instance->publish_date = $bookData['publish_date'];
        $instance->key = $bookData['key'];

        $size = getimagesize($bookData['img']);
        if ($size[0] > 1){
            $instance->img = $bookData['img'];
        }

        $instance->save();

        return $instance;
    }
}
