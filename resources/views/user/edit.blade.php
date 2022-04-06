@extends('layout')

@section('content')

<div class="container justify-content-center pt-5" style="margin-bottom: 50px;">
    <div class="row justify-content-center">
        <div class="col d-flex justify-content-center">
            <div class="card " style="margin-top: 50px; width: 60%">
                <div class="card-header" style="background-color: #4d587d; color: white; text-align: center;">
                    Edit User Profile
                </div>

                <div class="card-body">
                    <form action="/user/edit" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-form-label mb-0 pb-1">Full Name<span style="color: red;">*</span></label>
                            <input type="text" class="form-control mb-2" name="name" placeholder="Enter your first and last name" id="name" value="{{ $user->name }}" required>
                        </div>
                        @error("name")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="username" class="col-sm-2 col-form-label mb-0 pb-1">Username<span style="color: red;">*</span></label>
                            <input type="text" class="form-control mb-2" placeholder="Enter your username" name="username" id="username" value="{{ $user->username }}" required>
                        </div>
                        @error("username")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="fav_quote" class="col-sm-2 col-form-label mb-0 pb-1">Favourite Quote</label>
                            <textarea class="form-control mb-2" name="fav_quote" id="fav_quote" placeholder="What is your favorite quote?">{{$user->fav_quote}}</textarea>
                        </div>
                        @error("fav_quote")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group row">
                            <label for="fav_quote_teller" class="col-sm-2 col-form-label mb-0 pb-1 ms-5" style="width: fit-content;">By:</label>
                            <input type="text" style="width:200px" class="form-control mb-2" name="fav_quote_teller" id="fav_quote_teller" value="{{ $user->fav_quote_teller }}" placeholder="Quote Author">
                        </div>
                        @error("fav_quote_teller")
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="mb-3 form-group">
                            <label for="profile_pic" class="col-form-label mb-0 pb-1 mt-3">Upload a profile picture (max 2 MB):</label>
                            <input class="form-control" name="profile_pic" type="file" id="profile_pic" accept=".png, .jpg, .jpeg, .gif">
                        </div>
                        @error('profile_pic')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                        @enderror

                        <div>
                            <button type="submit" class="btn mb-2 mt-4" style="background-color: #4d587d; color: white;">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection