<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, Likable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function voteScore()
    {
        $up = Vote::where('review_id', $this->id)->where('upvoted', true)->count();
        $down = Vote::where('review_id', $this->id)->where('upvoted', false)->count();

        return $up - $down;
    }
}
