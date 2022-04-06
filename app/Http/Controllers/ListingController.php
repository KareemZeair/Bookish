<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    //

    public function create()
    {
        return view('listing.create');
    }
}
