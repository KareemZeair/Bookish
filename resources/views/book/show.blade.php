@extends('layout')

@section('content')

<section style="background-color: #373e56;" class="px-0">
    <div class="container my-5 mx-0 px-0">
        <div class="row mx-0">
            <div class="col-3 mx-0 pt-4 pb-2 justify-content-center" style="border-right: 2px solid; border-color: #505A7C">
                <div class="row justify-content-center mx-0">
                    <img id="book-image" src="{{$book->getImg()}}" style="width: 220px; height:auto; ">
                </div>

                <script>
                    window.addEventListener("load", function() {
                        var img_tag = document.getElementById("book-image");
                        if (img_tag.naturalHeight == 1) {
                            img_tag.src = "{{$book->fallback_img}}";
                        }
                    });
                </script>

                <div class="row mt-3 row justify-content-center mx-0" style="width: 300px;">
                    <h1 style="color: #F3F2F2; text-align: center;  font-family: Century Gothic, sans-serif;" class="mt-3">{{$book->title}}</h1>
                </div>
                <div class="row mt-3 row justify-content-center mx-0" style="width: 300px;">

                    <form action="/user/wishlist" method="POST">
                        @csrf
                        <input type="hidden" name="details" value="{{json_encode($book)}}">
                        @if(! $book->isWishlisted())
                        <button class="btn btn-light my-2" type="submit" role="button" style="width: 100%;">Add to Wishlist</button>
                        @else
                        <button class="btn disabled btn-outline-light my-2" type="submit" role="button" style="width: 100%;">Added to Wishlist</button>
                        @endif
                    </form>

                    <form action="/user/pastreads" method="POST">
                        @csrf
                        <input type="hidden" name="details" value="{{json_encode($book)}}">
                        @if(! $book->isPastread())
                        <button class="btn btn-light my-2" type="submit" role="button" style="width: 100%;">Add to Past Reads</button>
                        @else
                        <button class="btn disabled btn-outline-light my-2" type="submit" role="button" style="width: 100%;">Added to Past Reads</button>
                        @endif

                    </form>

                    <form action="/user/fav_book" method="POST">
                        @csrf
                        <input type="hidden" name="details" value="{{json_encode($book)}}">
                        @if(! $book->isFavourite())
                        <button class="btn my-2" type="submit" role="button" style="width: 100%; background-color:goldenrod; color:black;">Set as Favourite</button>
                        @else
                        <button class="btn disabled my-2" type="submit" role="button" style="width: 100%; border: 2px solid goldenrod; color:goldenrod;">That's Your Favourite Book!</button>
                        @endif
                    </form>

                </div>
            </div>

            <div class="col pb-3 mx-5 text-center align-items-center d-flex">
                <div class="row justify-content-center mx-0">
                    <div class="row pb-5" style="border-bottom: 1px solid #4d587d;">
                        <h3 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">Author:</h3>
                        <h3 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;" class="pt-3">{{$book->author_name}}</h3>
                    </div>
                    <div class="row py-5" style="border-bottom: 1px solid #4d587d;">
                        <h3 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">Publish Date:</h3>
                        <h3 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;" class="pt-3"> {{ $book->publish_date }}</h3>
                    </div>
                    <div class="row pt-5">
                        <h3 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">ISBN:</h3>
                        <h3 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;" class="pt-3">{{ $book->isbn }}</h3>
                    </div>
                </div>


            </div>


            <div class="col pt-4 pb-3 text-center align-items-center" style="border-left: 2px solid; border-color: #505A7C;">
                <div class="row text-center mx-0">
                    <h1 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">Plot:</h1>
                </div>
                <div class="row mt-3 row  mx-0" style=" height: 550px; overflow-y:auto;">
                    <div style="color: #F3F2F2;  font-family: Century Gothic, sans-serif; text-align: justify; font-size:larger;" class="mt-3">
                        @if($book->plot)
                        {{$book->plot}}
                        @else
                        <div class="alert alert-secondary text-center">Plot Unavailable for current book.</div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Listings -->
<div class="row mx-3 p-3" style="margin-top: 50px; border: 1px solid #7a85ab; border-radius: 4px;">
    <h1>Listings</h1>

    <div class="d-flex flex-row flex-nowrap overflow-auto">


        <div style="padding: 5px;">
            <div class="card h-100" style="border: 1px solid #000000; width: 220px; min-width: 180px; background-color: #f1f1f1; transition: ease-in-out .25s; justify-content:center; align-items:center;">
                <div style="height: 400px;" class="row align-items-center">
                    <div class="col" style="text-align: center;">
                        @if( ! Route::current()->getName() == "external")
                        <!-- saved  -->
                        <a href="/book/{{ $book->key }}/list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#373E56" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg>
                        </a>
                        <div class="card-body p-0 mt-3">
                            <a href="/listing/create" style="color: #373E56; text-decoration:none;">Add Your Listing</a>
                        </div>
                        @else
                        <!-- new -->
                        <form action="/book/{{ $book->key }}/list" id="newListing" method="POST">
                            @csrf
                            <input type="hidden" name="details" value="{{ json_encode($book) }}">

                            <button type="submit" style="border: 0px; background-color:#f1f1f1;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#373E56" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>
                            </button>

                            <div class="card-body p-0 mt-3">
                                <input type="submit" value="Add Your Listing" style="background-color:#f1f1f1; border:0px #000 solid; color: #373E56; text-decoration:none;">
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @foreach($book->getListings() as $listing)
        <div style="padding: 5px;">
            <div class="card h-100" style="width: 220px; min-width: 180px; background-color: #373E56; transition: ease-in-out .25s;">
                <div>
                    <img src="{{ $listing->getImg() }}" style="height: 300px; background-color: #FFFFFF; object-fit: contain;" class="card-img-top img-fluid" />
                    @if($listing->getStatus() === "Sold")
                    <div style="color:red; font-weight:bold; font-size:55px; position: absolute; top: 50%;  left: 50%; transform:  translate(-50%, -150%) rotate(-45deg); ">
                        SOLD
                    </div>
                    @endif
                </div>

                <div class="card-body">
                    <a class="btn align-middle stretched-link" href="/listing/{{$listing->id}}" style="color: white;">Price: <span style="font-weight: 650;">{{$listing->displayPrice()}}</span></a>
                    <br>
                    <button class="btn align-middle" style="color: white;">Condition: <span style="font-weight: 650;">{{$listing->displayCondition()}}</span></button>
                    <br>
                    <button class="btn align-middle" style="color: white; text-align:left;">Location: <span style="font-weight: 650;">{{$listing->displayLocation()}}</span></button>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


<!-- Reviews -->
<div class="row mx-3 p-3" style="margin-top: 50px; border: 1px solid #7a85ab; border-radius: 4px; justify-content:center;">

    <!-- Add a review -->
    @if(! $book->isReviewed())
    <h1 class="px-0">Add a review:</h1>
    @if( ($book->isPastread() or $book->isFavourite()) and auth()->user())

    <div class="row mx-2 px-0 my-2" style=" width: 1220px;">
        <form method="POST" action="/book/{{$book->key}}/review">
            @csrf
            <div class="form-group px-0 my-2">
                <label for="rating" class="me-2" style="font-size: large;">Rating:</label>
                <input type="number" id="rating" placeholder="0" name="rating" step="1" min="0" max="5" style="width: 50px; height: 30px;">
            </div>
            @error('rating')
            <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="form-group px-0 mb-2">
                <textarea class="form-control mb-2" name="review_content" id="write_review" placeholder="Have you read this book? Tell others what you think about it?"></textarea>
            </div>
            @error('review_content')
            <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
            @enderror
            <div class="px-0">
                <button type="submit" class="btn" style="background-color: #4d587d; color: white;">Submit</button>
            </div>
        </form>
    </div>

    @else

    @if(! ($book->isPastread() or $book->isFavourite()))
    <div class="col-8">
        <div class="alert alert-secondary text-center">Login or create an account to start reviewing your favourite books.</div>
    </div>
    @elseif(! auth()->user())
    <div class="col-8">
        <div class="alert alert-secondary text-center">Add current book as a past read or set it as your favourite to put a review.</div>
    </div>
    @endif

    @endif
    @endif


    <!-- Others' reviews -->
    <h1 style="margin-top:8px;">User Reviews:</h1>
    @forelse($book->reviews as $review)
    <div class="row mx-2 px-0 my-2" style="background-color: #ececec; width: 1220px; border-radius: 4px;">


        <div class="col-1 px-0 mt-4">

            <!-- upvoting -->
            <div class="row-1 px-0 ms-4" style="font-size: 0px;">
                <!-- <form action="/review/{{$review->id}}/like" method="POST"> -->
                <!-- @csrf -->
                <!-- <label> -->
                <!-- <input type="submit"> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" style="fill:#373e56" class="bi bi-caret-up" viewBox="0 0 16 16">
                    <path d="M3.204 11h9.592L8 5.519 3.204 11zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659z" />
                </svg>
                <!-- </label> -->
                <!-- </form> -->

            </div>


            <!-- voting score -->
            <div class="row ms-4">
                <span class="my-0 py-0 px-1 ms-1" style="width: fit-content; font-size: 13px; color:#373e56; font-weight: bold;">{{$review->voteScore()}}</span>
            </div>

            <!-- downvoting -->
            <div class="row-1 px-0 ms-4" style="font-size: 0px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                </svg>
            </div>
        </div>

        <!-- review content -->
        <div class="col px-0 my-3">
            <div class=" row my-1">
                <div class="col px-0" style="font-size: large;">
                    <span>
                        <a href="/user/{{$review->user->username}}" style="text-decoration: none; color: black; font-weight:600;">
                            @if(auth()->user()->is($review->user))
                            <u>You</u>
                            @else
                            <u>{{ $review->user->name }}</u>
                            @endif
                        </a>
                        wrote:
                    </span>
                </div>
                <!-- rating */5 -->
                <div class="col pe-5" style="text-align: end;">
                    <span class="p-2" style="background-color: #4d587d; border-radius: 4px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#ececec" class="bi bi-bookmark-heart mb-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 4.41c1.387-1.425 4.854 1.07 0 4.277C3.146 5.48 6.613 2.986 8 4.412z" />
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                        </svg>
                        <span style="font-size:20px; color:#ececec;">{{$review->rating}}/5</span>
                    </span>
                </div>
            </div>
            <div class="row pe-0 mt-2">
                {{ $review->content  }}
            </div>
        </div>
    </div>
    @empty
    <div class="col-8">
        <div class="alert alert-secondary text-center">Other users haven't reviewed this book yet. Start by reviewing the book yourself!</div>
    </div>
    @endforelse


</div>

<style>
    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 0px 7px 3px rgba(0, 0, 0, 0.5);
    }
</style>



@endsection