<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Listing;
use Validator;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //

    public function createSaved(Book $book)
    {
        return view('listing.create', [
            'book' => $book
        ]);
    }

    public function createNew($id, Request $r)
    {
        $bookData = json_decode($r->details, true);

        $book = Book::where('key', $bookData['key'])->first();
        if ($book === null) {
            $book = Book::from_json($bookData);
        }
        return view('listing.create', [
            'book' => $book
        ]);
    }

    public function store(Book $book, Request $r)
    {
        $this->validate(request(), [
            'condition' => ['required', 'numeric', 'min:0', 'max:3'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', 'numeric', 'min:0', 'max:3'],
            'city' => ['required', 'max:255'],
            'country' => ['required', 'max:255'],
            'contact' => ['required', 'email', 'max:255'],
            'pics.*' => ['image', 'mimes:jpg,png,jpeg,gif', 'max:5120'],
        ]);

        $l = new Listing();
        $l->user()->associate(auth()->user());
        $l->book()->associate($book);
        $l->condition = $r->condition;
        $l->price = $r->price;
        $l->currency = $r->currency;
        $l->city = $r->city;
        $l->description = $r->description;
        $l->country = $r->country;
        $l->contact = $r->contact;
        $pics = [];

        if ($r->file('pics')) {
            foreach ($r->file('pics') as $pic) {
                $path = "/storage/" . $pic->store('pic');
                array_push($pics, $path);
            }
        }
        $l->photos = json_encode($pics);
        $l->save();

        return redirect('/Home');
    }

    public function show($id)
    {
        $listing = Listing::where('id', $id)->first();

        return view("listing.show", [
            "listing" => $listing,
            "imgs" => $listing->getImgs(),
            "active" => "active"
        ]);
    }

    public function edit($id)
    {
        $listing = Listing::where('id', $id)->first();

        if (auth()->user()->isNot($listing->user)) {
            return back();
        }

        return view("listing.edit", [
            "listing" => $listing
        ]);
    }

    public function update($id, Request $r)
    {
        $this->validate(request(), [
            'status' => ['required', 'numeric', 'min:0', 'max:2'],
            'condition' => ['required', 'numeric', 'min:0', 'max:3'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', 'numeric', 'min:0', 'max:3'],
            'city' => ['required', 'max:255'],
            'country' => ['required', 'max:255'],
            'contact' => ['required', 'email', 'max:255'],
            'pics.*' => ['image', 'mimes:jpg,png,jpeg,gif', 'max:5120'],
        ]);

        $l = Listing::where('id', $id)->first();

        $l->status = $r->status;
        $l->condition = $r->condition;
        $l->price = $r->price;
        $l->currency = $r->currency;
        $l->city = $r->city;
        $l->description = $r->description;
        $l->country = $r->country;
        $l->contact = $r->contact;

        if ($r->file('pics')) {
            $pics = [];
            foreach ($r->file('pics') as $pic) {
                $path = "/storage/" . $pic->store('pic');
                array_push($pics, $path);
            }
            $l->photos = json_encode($pics);
        }

        $l->save();
        return redirect("/Home");
    }

    public function destroy($id)
    {
        $listing = Listing::where('id', $id)->first(); 
        $listing->delete();
        return redirect("/Home");
    }
}
