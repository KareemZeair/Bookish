<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public $currency_enum = ["$","€","£","¥"];
    public $condition_enum = ["Brand new","Like new","Used","Vintage"];
    public $status_enum = ["Available", "Pending", "Sold"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function getImg()
    {
        return json_decode($this->photos, true)[0] ?? $this->book->getImg();
    }

    public function getImgs()
    {

    }

    public function displayPrice()
    {
        return $this->currency_enum[$this->currency] . $this->price;
    }

    public function displayCondition()
    {
        return $this->condition_enum[$this->condition];
    }

    public function displayLocation()
    {
        return $this->city . ", " . $this->country;
    }

    public function getStatus()
    {
        return $this->status_enum[$this->status];
    }
}
