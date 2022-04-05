<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <img src="MediaAssets/header.png" class="img-fluid ">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            /* background-color: #f8f0e8; */
            /* background-image: url("MediaAssets/bg.jpg"); */
        }
    </style>

</head>

<body>
    <div class="container justify-content-center" style="margin-bottom: 50px;">
        <div class="row justify-content-center">
            <div class="col d-flex justify-content-center">
                <div class="card " style="margin-top: 50px; width: 60%">
                    <div class="card-header" style="background-color: #4d587d; color: white; text-align: center;">
                        Create Account
                    </div>

                    <div class="card-body">
                        <form action="/register" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-form-label mb-0 pb-1">Full Name<span style="color: red;">*</span></label>
                                <input type="text" class="form-control mb-2" name="name" placeholder="Enter your first and last name" id="name" value="{{ old('name') }}" required>
                            </div>
                            @error("name")
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <label for="email" class="col-sm-2 col-form-label mb-0 pb-1">Email Address<span style="color: red;">*</span></label>
                                <input type="email" class="form-control mb-2" placeholder="Enter your email address" name="email" id="email" value="{{ old('email') }}" required>
                            </div>
                            @error("email")
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <label for="username" class="col-sm-2 col-form-label mb-0 pb-1">Username<span style="color: red;">*</span></label>
                                <input type="text" class="form-control mb-2" placeholder="Enter your username" name="username" id="username" value="{{ old('username') }}" required>
                            </div>
                            @error("username")
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <label for="password" class="col-sm-2 col-form-label mb-0 pb-1">Password<span style="color: red;">*</span></label>
                                <input type="password" class="form-control mb-2" placeholder="Enter a unique password" name="password" id="password" value="{{ old('password') }}" required>
                            </div>
                            @error("password")
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <label for="fav_quote" class="col-sm-2 col-form-label mb-0 pb-1">Favourite Quote</label>
                                <textarea class="form-control mb-2" name="fav_quote" id="fav_quote" placeholder="What is your favorite quote?">{{ old('fav_quote') }}</textarea>
                            </div>
                            @error("fav_quote")
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="form-group row">
                                <label for="fav_quote_teller" class="col-sm-2 col-form-label mb-0 pb-1 ms-5" style="width: fit-content;">By:</label>
                                <input type="text" style="width:200px" class="form-control mb-2" name="fav_quote_teller" id="fav_quote_teller" value="{{ old('fav_quote_teller') }}" placeholder="Quote Author">
                            </div>
                            @error("fav_quote_teller")
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <div for="profile_pic" class="col-form-label mb-0 pb-1 mt-3">Upload a profile picture (Max 2 MB):</div>
                                <label for="profile_pic" id="file-upload" class="btn mb-0 pb-1" style="background-color: #4d587d; color: white;">Browse</label>
                                <br>
                                <input type="file" style="display: none;" name="profile_pic" placeholder="Choose image" id="profile_pic" value="{{ old('profile_pic') }}" accept=".png, .jpg, .jpeg, .gif">
                            </div>
                            @error('image')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror

                            <div>
                                <button type="submit" class="btn mb-2 mt-4" style="background-color: #4d587d; color: white;">Register</button>
                                <section class="mt-2"> Already have an account? <a href="/login"> login </a></section>
                                <section class="mt-0 pt-0" style="text-align: right;"><span style="color: red;">*</span> fields are required</section>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-muted bg-dark py-5">
        <div class="">
            <p class="text-white px-5">Youssef Ali & Kareem Zeair 2022</p>
            <small class="text-white px-5">Developed For ECE 5010</small>
        </div>
    </footer>

</body>