@extends('layout')
<!-- #9FB1BC -->
@section('content')
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
                <div class="row">

                    @foreach($books as $book)
                    <div class="col-md-6 col-lg-3 py-2">
                        <div class="card h-100" style="width: 300px; min-width: 250px; background-color: #373E56;">
                            <!-- account for null covers -->
                            <img src="https://covers.openlibrary.org/b/olid{{$book['olid'].'-L.jpg'}}" onerror="this.src='MediaAssets/fallback.jpg'" class="card-img-top img-fluid" />
                            <div class="card-body">
                                <p style="color: white;" class="align-middle">{{$book['title']}} ({{$book['author_name']}}) - {{$book['publish_date']}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="container text-center">
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