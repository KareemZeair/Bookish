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
                        <p style="color:red" class="text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="username" class="col-sm-2 col-form-label mb-0 pb-1">Username<span style="color: red;">*</span></label>
                            <input type="text" class="form-control mb-2" placeholder="Enter your username" name="username" id="username" value="{{ $user->username }}" required>
                        </div>
                        @error("username")
                        <p style="color:red" class="text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group">
                            <label for="fav_quote" class="col-sm-2 col-form-label mb-0 pb-1">Favourite Quote</label>
                            <textarea class="form-control mb-2" name="fav_quote" id="fav_quote" placeholder="What is your favorite quote?">{{$user->fav_quote}}</textarea>
                        </div>
                        @error("fav_quote")
                        <p style="color:red" class="text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="form-group row">
                            <label for="fav_quote_teller" class="col-sm-2 col-form-label mb-0 pb-1 ms-5" style="width: fit-content;">By:</label>
                            <input type="text" style="width:200px" class="form-control mb-2" name="fav_quote_teller" id="fav_quote_teller" value="{{ $user->fav_quote_teller }}" placeholder="Quote Author">
                        </div>
                        @error("fav_quote_teller")
                        <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="mb-3 form-group">
                            <label for="profile_pic" class="col-form-label mb-0 pb-1 mt-3">Update profile picture (max 2 MB):</label>
                            <input class="form-control" onchange="loadFile(event)" name="profile_pic" type="file" id="profile_pic" accept=".png, .jpg, .jpeg, .gif">
                        </div>

                        @if($user->img)
                        <img src = "{{ $user->img }}" id="display_image" style="width: 300px; height:300px; background-color:#FFFFFF; border-radius: 50%; border: 2px solid #000000; object-fit: contain; padding: 2px;">
                        @else
                        <img id="display_image" style="width: 300px; height:300px; background-color:#FFFFFF; border-radius: 50%; border: 2px solid #000000; object-fit: contain; padding: 2px;">
                        @endif
                        <script>
                            var image = document.getElementById('display_image');
                                if(! image.src == ''){
                                    image.style.display = 'block';
                                }
                                else{
                                    image.style.display = 'none';
                                }
                                var loadFile = function(event) {
                                    image.src = URL.createObjectURL(event.target.files[0]);
                                    if(! image.src == ''){
                                        image.style.display = 'block';
                                    }
                                    else{
                                        image.style.display = 'none';
                                    }
                                };
                        </script>
                        

                        @error('profile_pic')
                        <p style="color: red;" class="text-xs mt-1">{{ $message }}</p>
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