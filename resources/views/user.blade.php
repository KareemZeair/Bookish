@extends('layout')

@section('content')

<section style="background-color: #705C57;">
    <div class="container my-5">
        <!-- user info -->
        <div class="row">
            <div class="col-3 mx-0 pt-5 pb-2" style="border-right: 2px solid beige; height: 454.4px;">
                <div class="row">
                    <img src="MediaAssets/user.png" style="width: 300px; height:auto;">
                </div>
                <div class="row" style="width: 300px;">
                    <h1 style="color: #000000;   text-align: center;" class="mt-3">Michael Scott</h1>
                </div>
            </div>
            <!-- favorite book -->
            <div class="col pt-5 pb-3 mx-5 text-center">
                <h1 style="color: #000000; text-decoration: underline;">Favourite Title</h1>
                <img src="MediaAssets/1984.jpg" style="width:150px;" class="my-3">
                <h2 style="color: #F3F2F2;">"1984" by George Orwell</h2>
            </div>
            <!-- favorite quote -->
            <div class="col pt-5 pb-3 border-left">
                <h1 style="color: #000000; text-decoration: underline;text-align: center;">Favourite Quote</h1>
                <h2 style="color: #F3F2F2; font-family: Times New Roman, Times, serif; letter-spacing: 1px;" class="mt-5">“Would I rather be feared or loved?</h2>
                <h2 style="color: #F3F2F2; font-family: Times New Roman, Times, serif; letter-spacing: 1px;"> Easy. Both. I want people to be afraid of how much they love me.”</h2>
                <h2 style="color: #F3F2F2; font-family: Times New Roman, Times, serif; letter-spacing: 1px; text-align: right;" class="mb-5"> ~Michael Scott</h2>
            </div>
        </div>
</section>

<div class="container">
    <div class="col w-75 my-5">
        <div class="row">
            <h1>Past Reads</h1>
            <div class="d-flex flex-row flex-nowrap overflow-auto">

                <div class="card card-block mx-2" style="width: 200px;">
                    <img src="MediaAssets/1984.jpg" width="200" onerror=" this.src='/images/fallback.png'" class=" card-img-top img-fluid" />
                    <div class="card-body">
                        <p style="color: #000000;">1984 (George Orwell)</p>
                    </div>
                </div>
                <div class="card card-block mx-2" style="width: 200px;">
                    <img src="https://covers.openlibrary.org/b/olid/OL32500776M-L.jpg" width="200" onerror=" this.src='/images/fallback.png'" class=" card-img-top img-fluid" />
                    <div class="card-body">
                        <p style="color: #000000;">The Secret Adversary (Agatha Christie)</p>
                    </div>
                </div>
                <div class="card card-block mx-2" style="width: 200px;">
                    <img src="https://kbimages1-a.akamaihd.net/2dd50b25-cd34-4b85-8752-34dad2fb8e5d/1200/1200/False/the-forty-rules-of-love-1.jpg" width="200" onerror=" this.src='/images/fallback.png'" class=" card-img-top img-fluid" />
                    <div class="card-body">
                        <p style="color: #000000;">The Forty Rules of Love (Elif Shafak)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <h1>Wish List</h1>
            <div class="d-flex flex-row flex-nowrap overflow-auto ">
                <div class="card card-block mx-2 my-2" style="width: 200px;min-width: 200px">
                    <img src="https://covers.openlibrary.org/b/olid/OL22173620M-L.jpg" width="200" onerror=" this.src='/images/fallback.png'" class=" card-img-top img-fluid" />
                    <div class="card-body">
                        <p style="color: #000000;">Design Patterns (Erich Gamma)</p>
                    </div>
                </div>
                <div class="card card-block mx-2 my-2" style="width: 200px;min-width: 200px">
                    <img src="https://covers.openlibrary.org/b/olid/OL34153767M-L.jpg" width="200" onerror=" this.src='/images/fallback.png'" class=" card-img-top img-fluid" />
                    <div class="card-body">
                        <p style="color: #000000;">Harry Potter and the Prisoner of Azkaban (J. K. Rowling)</p>
                    </div>
                </div>
                <div class="card card-block mx-2 my-2" style="width: 200px;min-width: 200px">
                    <img src="https://covers.openlibrary.org/b/olid/OL25429536M-L.jpg" width="200" onerror=" this.src='/images/fallback.png'" class=" card-img-top img-fluid" />
                    <div class="card-body">
                        <p style="color: #000000;">Inferno (Dan Brown)</p>
                    </div>
                </div>
                <div class="card card-block mx-2 my-2" style="width: 200px; min-width: 200px">This is a book</div>
                <div class="card card-block mx-2 my-2" style="width: 200px; min-width: 200px">This is a book</div>
                <div class="card card-block mx-2 my-2" style="width: 200px; min-width: 200px">This is a book</div>
                <div class="card card-block mx-2 my-2" style="width: 200px; min-width: 200px">This is a book</div>
                <div class="card card-block mx-2 my-2" style="width: 200px; min-width: 200px">This is a book</div>

            </div>
        </div>
    </div>
</div>
@endsection