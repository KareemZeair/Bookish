@extends('layout')

@section('content')

<style>
    .card:hover {
        transform: scale(0.97);
        box-shadow: 0 0px 7px 3px rgba(0, 0, 0, 0.5);
    }
</style>

<section style="background-color: #373e56;">
    <div class="container my-5">
        <!-- user info -->
        <div class="row">
            <div class="col-3 mx-0 pt-5 pb-2" style="border-right: 2px solid; border-color: #505A7C; height: 100%.4px;">
                <div class="row">
                    <img src="{{ $user->fallback_img}}" style="width: 300px; height:300px; background-color:#FFFFFF; border-radius: 50%; object-fit: contain; padding: 2px;">
                </div>
                <div class="row mt-3" style="width: 300px;">
                    <h1 style="color: #F3F2F2;   text-align: center;  font-family: Century Gothic, sans-serif;" class="mt-3">{{$user->name}}</h1>
                </div>
            </div>
            <!-- favorite book -->

            <div class="col pt-5 pb-3 mx-5 text-center">
                @if($user->fav_book)
                <h1 style="color: #F3F2F2; text-decoration: underline; font-family: Century Gothic, sans-serif;">Favourite Title</h1>
                <img src="{{$user->fav_book->img ?? user->fav_book->fallback_img}}" style="width:150px;" class="my-3">
                <h2 style=" font-size: 25px; color: #F3F2F2; font-family: Century Gothic, sans-serif;">"{{$user->fav_book->title}}" by {{$user->fav_book->author_name}}</h2>
                @endif
            </div>
            <!-- favorite quote -->
            @if($user->fav_quote)
            <div class="col pt-5 pb-3 border-left">
                <h1 style="color: #F3F2F2; text-decoration: underline;text-align: center; font-family: Century Gothic, sans-serif;">Favourite Quote</h1>
                <h2 style=" font-size: 25px; color: #F3F2F2; font-family: Century Gothic, sans-serif; letter-spacing: 1px;" class="mt-5">
                    {{$user->fav_quote}}
                </h2>
                <h2 style=" font-size: 25px; color: #F3F2F2; font-family: Century Gothic, sans-serif; letter-spacing: 1px; text-align: right;
                 width: 300px; height: 100px;" class="mb-5 custom-scrollbar-j p-2">
                    @if($user->fav_quote_teller)
                    ~ {{$user->fav_quote_teller}}
                    @else
                    ~ anonymous
                    @endif
                </h2>
            </div>
            @endif
        </div>
</section>

<div class="container">
    <div class="col my-5">
        <div class="row">
            <h1>Past Reads</h1>
            <div class="d-flex flex-row flex-nowrap overflow-auto">

                @forelse($user->past_read as $book)
                <div style="padding: 5px;">
                    <div class="card" style="width: 220px; min-width: 180px; background-color: #373E56; transition: ease-in-out .3s;">
                        <div style="background-color: #FFFFFF;">
                            <img src="{{$book->img}}" style="height: 300px; object-fit: contain;" class="card-img-top img-fluid" />
                        </div>
                        <div class="card-body">
                            <a class="btn" href="/book/{{$book->key}}" style="color: white;" class="align-middle">{{$book->title}} ({{$book->author_name}})</a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="alert alert-secondary">
                    You have no books in your past reads yet.
                </p>
                @endforelse

            </div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <h1>Wish List</h1>
            <div class="d-flex flex-row flex-nowrap overflow-auto ">
                @forelse($user->wish_list as $book)
                <div style="padding: 5px;">
                    <div class="card h-100" style="width: 220px; min-width: 180px; background-color: #373E56; transition: ease-in-out .3s;">
                        <div style="background-color: #FFFFFF;">
                            <img src="{{$book->img}}" style="height: 300px; object-fit: contain;" class="card-img-top img-fluid" />
                        </div>
                        <div class="card-body">
                            <a class="btn" href="/book/{{$book->key}}" style="color: white;" class="align-middle">{{$book->title}} ({{$book->author_name}})</a>
                        </div>
                    </div>
                </div>
                @empty
                <p class="alert alert-secondary">
                    You have no books in your wish list yet.
                </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection