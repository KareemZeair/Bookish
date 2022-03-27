@extends('layout')
<!-- #9FB1BC -->
@section('content')

<style>
    .card:hover {
        transform: scale(1.03);
        box-shadow: 0 0px 7px 3px rgba(0, 0, 0, 0.5);
    }
</style>
<section class="jumbotron text-center" style="margin-top: 80px;">
    <div>
        <div class="container justify-content-center">

            @if(session()->has('error-message'))
            <div class="container text-center">
                <p class="alert alert-danger">
                    {{session()->get('error-message')}}
                </p>

            </div>
            @endif

            @if($books)

            <div class="container-fluid content-row">
                <div class="row" id="search_results">

                    @foreach($books as $book)
                    <div class="col-md-6 col-lg-3 py-2">
                        <div class="card h-100" style="width: 300px; min-width: 250px; background-color: #373E56; transition: ease-in-out .3s;">
                            <form action="/book/external" method="POST">
                                @csrf
                                <div style="background-color: #FFFFFF;">
                                    <button type="submit" class="search-results-image" style="padding: 0; border: none; background: none;">
                                        <img src="{{$book->img}}" style="height: 400px; object-fit: contain;" class="card-img-top img-fluid"/>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="details" value="{{json_encode($book)}}">
                                    <button class="btn" type="submit" style="color: white;" class="align-middle">{{$book->title}} ({{$book->author_name}})</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <script>
                window.addEventListener("load", function() {
                    var elements_list = document.getElementsByClassName("search-results-image");
                    var image = new Image(1, 1);
                    var img_tag = "";
                    for (let i = 0; i < elements_list.length; i++) {
                        img_tag = elements_list[i].getElementsByTagName("img")[0];

                        if (img_tag.naturalHeight == 1) {
                            img_tag.src = "{{$book->fallback_img}}";
                        }
                    }
                });
            </script>
            @else
            <br>
            <div class="container text-center pt-7">
                <p class="alert alert-secondary ">
                    Your search returned no results. Please Try a different name.
                </p>
            </div>
            @endif

        </div>
    </div>
    </div>
</section>
@endsection