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

        // return self::create([
        //     'title' => $bookData['title'],
        //     'isbn' => $bookData['isbn'],
        //     'author_name' => $bookData['author_name'],
        //     'publish_date' => $bookData['publish_date'],
        //     'key' => $bookData['key'],
        //     'img' => $bookData['img'],
        // ]);

    }
}
