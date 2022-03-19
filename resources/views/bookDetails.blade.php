@extends('layout')

@section('content')

<section style="background-color: #373e56;" class="px-0">
    <div class="container my-5 mx-0 px-0">
        <!-- book info -->
        <div class="row mx-0">
            <div class="col-3 mx-0 pt-5 pb-2 justify-content-center" style="border-right: 2px solid; border-color: #505A7C">
                <div class="row justify-content-center mx-0">
                    <img src="MediaAssets/1984.jpg" style="width: 220px; height:auto; ">
                </div>
                <div class="row mt-3 row justify-content-center mx-0" style="width: 300px;">
                    <h1 style="color: #F3F2F2; text-align: center;  font-family: Century Gothic, sans-serif;" class="mt-3">1984</h1>
                </div>
                <div class="row mt-3 row justify-content-center mx-0" style="width: 300px;">

                    <a class="btn btn-light my-2" href="#" role="button">Add to Wishlist</a>
                    <a class="btn btn-light mb-3" href="#" role="button">Add to Past Reads</a>
                </div>
            </div>

            <!-- favorite book -->
            <div class="col pt-5 pb-3 mx-5 text-center" style="border-right: 2px solid; border-color: #505A7C">
                <div class="row justify-content-center mx-0">
                    <div class="row">
                        <div style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">Author:</div>
                    </div>
                    <div class="row">
                        <div style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">Publish Date:</div>
                    </div>
                    <div class="row">
                        <div style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">ISBN:</div>
                    </div>
                </div>


            </div>


            <!-- favorite quote -->
            <div class="col pt-5 pb-3">
                <div class="row text-center mx-0">
                    <h1 style="color: #F3F2F2; font-family: Century Gothic, sans-serif;">Plot:</h1>
                </div>
                <div class="row mt-3 row  mx-0">
                    <div style="color: #F3F2F2;  font-family: Century Gothic, sans-serif; text-align: justify;" class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quod ratione repellat quas similique aperiam? Odio eum quaerat aperiam? Culpa quibusdam hic dicta, nam voluptatem ipsa facilis nisi unde nemo! Provident?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit debitis suscipit ex nulla corporis quos doloremque molestiae dicta vero ut, nemo molestias architecto numquam. Beatae eos qui earum dignissimos incidunt.</div>
                </div>

            </div>
        </div>
    </div>
</section>




@endsection