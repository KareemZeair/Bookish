@extends('layout')

@section('content')

<style>
    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 0px 7px 3px rgba(0, 0, 0, 0.5);
    }

    path {
        transition: fill .4s ease;
    }

    #delete path {
        fill: white;
    }

    #delete:hover path {
        fill: red;
    }
</style>

<!-- 485.6 -->

<section style="background-color: #373e56; margin-left: 0px;">
    <div class="container my-5">
        <!-- user info -->
        <div class="row">
            <div class="col-3 mx-0 pt-5 pb-2" style="border-right: 2px solid; border-color: #505A7C; height: 100%.4px; justify-content: center;">
                <div class="row">
                    <img src="{{ $user->img ?? $user->fallback_img}}" style="width: 300px; height:300px; background-color:#FFFFFF; border-radius: 50%; object-fit: contain; padding: 2px;">
                </div>
                <div class="row mt-3" style="width: 300px; justify-content: center;">
                    <h1 style="color: #F3F2F2;   text-align: center;  font-family: Century Gothic, sans-serif;" class="mt-3">{{$user->name}}</h1>
                    <h3 style="color: #8b95b1;   text-align: center;  font-family: Century Gothic, sans-serif;">@<?php echo e($user->username); ?></h3>
                    @if(auth()->user()->is($user))
                    <a href="/user/edit" class="btn mt-3" style="border-color: #F3F2F2; color: #F3F2F2; width: 130px; "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil me-2" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                        </svg>Edit Profile</a>
                    @endif
                </div>
            </div>
            <!-- favorite book -->

            <div class="col pt-5 pb-3 mx-5 text-center">
                @if($user->fav_book)
                <h1 style="color: #F3F2F2; text-decoration: underline; font-family: Century Gothic, sans-serif;">Favourite Title</h1>
                <img src="{{$user->fav_book->img ?? user->fav_book->fallback_img}}" style="width:150px; max-width:150px;" class="my-3">
                <h2 style=" font-size: 25px; color: #F3F2F2; font-family: Century Gothic, sans-serif;">"{{$user->fav_book->title}}" by {{$user->fav_book->author_name}}</h2>
                @endif
            </div>
            <!-- favorite quote -->
            @if($user->fav_quote)
            <div class="col pt-5 pb-3 border-left" style="height: 486px; overflow-y: auto;">
                <h1 style="color: #F3F2F2; text-decoration: underline; text-align: center; font-family: Century Gothic, sans-serif;">Favourite Quote</h1>
                <h2 style=" font-size: 25px; color: #F3F2F2; font-family: Century Gothic, sans-serif; letter-spacing: 1px;" class="mt-5">
                    {{$user->fav_quote}}
                </h2>
                <h2 style=" font-size: 25px; color: #F3F2F2; font-family: Century Gothic, sans-serif; letter-spacing: 1px; text-align: right;
                 width: 300px; height: 100px;" class="mb-5 p-2">
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
        <!-- Wish List -->
        <div class="row p-3" style="border: 1px solid #7a85ab; border-radius: 4px;">
            <div class="row">
                <h1>Wish List</h1>
                <div class="d-flex flex-row flex-nowrap overflow-auto ">
                    @forelse($user->wish_list as $book)
                    <div style="padding: 5px;">
                        <div class="card h-100" style="width: 220px; min-width: 180px; background-color: #373E56; transition: ease-in-out .25s;">
                            <div style="background-color: #FFFFFF;">
                                <a href="/book/{{$book->key}}">
                                    <img src="{{$book->img}}" style="height: 300px; object-fit: contain;" class="card-img-top img-fluid" />
                                </a>
                            </div>
                            <div class="card-body">
                                <a class="btn" href="/book/{{$book->key}}" style="color: white;" class="align-middle">{{$book->title}} ({{$book->author_name}})</a>
                            </div>
                            @if(auth()->user()->is($user))
                            <form action="/user/wishlist/{{$book->key}}" method="POST" style="text-align: right;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm mb-2 ms-2" style="cursor: pointer;" type="submit"><svg id="delete" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-trash3 zoom" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg></button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @empty
                    <p class="alert alert-secondary">
                        You have no books in your wish list yet.
                    </p>
                    @endforelse
                </div>
            </div>

            <hr class="mb-3 mt-4">

            <!-- Past Reads -->
            <div class="row">
                <h1>Past Reads</h1>
                <div class="d-flex flex-row flex-nowrap overflow-auto">

                    @forelse($user->past_read as $book)
                    <div style="padding: 5px;">
                        <div class="card h-100" style="width: 220px; min-width: 180px; background-color: #373E56; transition: ease-in-out .25s;">
                            <div style="background-color: #FFFFFF;">
                                <a href="/book/{{$book->key}}">
                                    <img src="{{$book->img}}" style="height: 300px; object-fit: contain;" class="card-img-top img-fluid" />
                                </a>
                            </div>
                            <div class="card-body">
                                <a class="btn" href="/book/{{$book->key}}" style="color: white;" class="align-middle">{{$book->title}} ({{$book->author_name}})</a>
                            </div>
                            @if(auth()->user()->is($user))
                            <form action="/user/wishlist/{{$book->key}}" method="POST" style="text-align: right;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm mb-2 ms-2" style="cursor: pointer;" type="submit">
                                    <svg id="delete" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-trash3 zoom" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                    </svg></button>
                            </form>
                            @endif
                        </div>
                    </div>
                    @empty
                    <p class="alert alert-secondary">
                        You have no books in your past reads yet.
                    </p>
                    @endforelse

                </div>
            </div>
        </div>

        <!-- listings -->
        <div class="row p-3" style="margin-top: 50px; border: 1px solid #7a85ab; border-radius: 4px;">
            <h1>Listings</h1>

            <div class="d-flex flex-row flex-nowrap overflow-auto">


                <div style="padding: 5px;">
                    <div class="card h-100" style="width: 220px; min-width: 180px; background-color: #373E56; transition: ease-in-out .25s;">
                        <div style="background-color: #FFFFFF;">
                            <a href="/book/{{$book->key}}">
                                <img src="{{$book->img}}" style="height: 300px; object-fit: contain;" class="card-img-top img-fluid" />
                            </a>
                        </div>
                        <div class="card-body">
                            <a class="btn" href="/book/{{$book->key}}" style="color: white;" class="align-middle">Price: <span style="font-weight: 650;">$5.50</span></a>
                            <br>
                            <a class="btn" href="/book/{{$book->key}}" style="color: white;" class="align-middle">Condition: <span style="font-weight: 650;">New</span></a>
                            <br>
                            <a class="btn" href="/book/{{$book->key}}" style="color: white;" class="align-middle">Location: <span style="font-weight: 650;">Cairo, Egypt</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>



@endsection