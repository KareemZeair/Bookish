@extends('layout')

@section('content')

<section style="background-color: #705C57;">
    <div class="container my-5">
        <!-- <div class="row"> -->
        <div class="col mx-0 py-5">
            <img src="MediaAssets/user.png" style="width: 300px; height:auto;" alt="">
        </div>
    </div>
</section>

<div class="container">
    <div class="col w-75 my-5">
        <div class="row">
            <h1>Past Reads</h1>
            <div class="d-flex flex-row flex-nowrap overflow-auto">
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
            </div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <h1>Wish List</h1>
            <div class="d-flex flex-row flex-nowrap overflow-auto">
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
            </div>
        </div>
    </div>
</div>
@endsection