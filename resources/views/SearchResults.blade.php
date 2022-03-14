@extends('layout')

@section('content')
<section class="jumbotron text-center bg-light">
    <div class="album bg-light">
        <div class="container justify-content-center">

            @if(session()->has('error-message'))
            <div class="container text-center">
                <p class="alert alert-danger">
                    {{session()->get('error-message')}}
                </p>

            </div>
            @endif

            @if($books)
            <div class="row">

                @foreach($books as $book)
                <div class="col-md-6 col-lg-3 py-2">
                    <div class="card">
                        <!-- account for null covers -->
                        <img src="https://covers.openlibrary.org/b/olid{{$book['olid'].'-L.jpg'}}" onerror="this.src='/images/fallback.png'" class="card-img-top img-fluid" />
                        <div class="card-body">
                            <p>{{$book['title']}} ({{$book['author_name']}}) - {{$book['publish_date']}}</p>
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
</section>
@endsection