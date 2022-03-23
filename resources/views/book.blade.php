@extends('layout')

@section('content')

<section style="background-color: #373e56;" class="px-0">
    <div class="container my-5 mx-0 px-0">
        <div class="row mx-0">
            <div class="col-3 mx-0 pt-4 pb-2 justify-content-center" style="border-right: 2px solid; border-color: #505A7C">
                <div class="row justify-content-center mx-0">
                    <img id="book-image" src="{{$book->img ?? $book->fallback_img}}" style="width: 220px; height:auto; ">
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
                        <button class="btn btn-light my-2" type="submit" role="button" style="width: 100%;">Add to Wishlist</button>
                    </form>

                    <form action="/user/pastreads" method="POST">
                        @csrf
                        <input type="hidden" name="details" value="{{json_encode($book)}}">
                        <button class="btn btn-light my-2" type="submit" role="button" style="width: 100%;">Add to Past Reads</button>
                    </form>

                    <form action="/user/fav_book" method="POST">
                        @csrf
                        <input type="hidden" name="details" value="{{json_encode($book)}}">
                        <button class="btn my-2" type="submit" role="button" style="width: 100%; background-color:goldenrod; color:black;">Set as Favourite</button>
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


            <div class="col pt-4 pb-3 text-center align-items-center" style="border-left: 2px solid; border-color: #505A7C">
                <div class="row text-center mx-0">
                    <h1 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">Plot:</h1>
                </div>
                <div class="row mt-3 row  mx-0">
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




@endsection