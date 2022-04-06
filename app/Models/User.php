<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public $fallback_img = "MediaAssets/user.png";

    public function wish_list()
    {
        return $this->belongsToMany(Book::class, 'wish_lists')->distinct();
    }


    public function past_read()
    {
        return $this->belongsToMany(Book::class, 'past_reads')->distinct();
    }

    public function fav_book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
