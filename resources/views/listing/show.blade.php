@extends('layout')

@section('content')


<div class="container justify-content-center" style="margin-bottom: 50px; margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center">

            <!-- header -->
            <div class="card " style="margin-top: 50px; width: 60%">
                <div class="card-header" style="background-color: #4d587d; color: white; text-align: center;">
                    Viewing <span style="text-decoration:underline">{{ $listing->book->title }}</span> Listing:
                </div>

                <!-- body -->
                <div class="card-body">
                    <img src="{{ $listing->book->img }}" style="height: 300px; display: block; margin-left: auto; margin-right: auto;">
                    <hr>
                    <div class="container my-3">
                        <div class="row mt-4">
                            <span> <span style="font-weight: bold;">Title: </span>{{ $listing->book->title }}</span>
                        </div>
                        <div class="row mt-4">
                            <span> <span style="font-weight: bold;">Status: </span>{{ $listing->getStatus() }}</span>
                        </div>
                        <div class="row mt-4">
                            <span> <span style="font-weight: bold;">Price: </span>{{ $listing->displayPrice() }}</span>
                        </div>
                        <div class="row mt-4">
                            <span> <span style="font-weight: bold;">Condition: </span>{{ $listing->displayCondition() }}</span>
                        </div>
                        <div class="row mt-4">
                            <span> <span style="font-weight: bold;">Location: </span>{{ $listing->city }}<span>,</span> {{ $listing->country }}</span>
                        </div>
                        <div class="row mt-4">
                            <span> <span style="font-weight: bold;">Description: </span>{{ $listing->description }}</span>
                        </div>
                        <div class="row mt-4">
                            <span> <span style="font-weight: bold;">Contact info: </span>{{ $listing->contact }}</span>
                        </div>

                        <!-- photos -->
                        @if(count($imgs))
                        <div class="row mt-5 mb-3" style="background-color: #4d587d; box-shadow: 0px 0px 8px 15px #4d587d" ;>
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <!-- <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div> -->
                                <div class="carousel-inner">                                    
                                    
                                    @for($i = 0; $i < count($imgs) ; $i++)
                                    <div class="carousel-item {{$active}}">
                                        <img src="{{ $imgs[$i] }}" class="d-block" style="height:350px; margin:auto;" alt="...">
                                    </div>
                                    {{$active = ""}}
                                    @endfor

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>



@endsection