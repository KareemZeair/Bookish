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


        <div class="col justify-content-center">
            <div class="row d-flex justify-content-center">
                <form class="d-flex px-0" method="GET" action="/search" style="width: 60%; margin-top: 50px;">
                    <input class="form-control me-2" name="keyword" type="search" placeholder="Search for Books" aria-label="Search">
                    <input type="hidden" id="page" name="page" value="1">
                    <button class="btn" type="submit" style="border-color: #4d587d;"><img src="MediaAssets/search.svg" alt=""></button>
                </form>
            </div>

            <div class="row d-flex justify-content-center" style="margin-top: 50px;">
                <div style="width: 80%; text-align: center; border-bottom: 1px solid #4d587d; line-height: 0.1em; margin: 10px 0 20px;">
                    <span style=" background:#fff; padding:0 10px;"> OR </span>
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="card px-0" style="margin-top: 50px; width: 40%">
                    <div class="card-header" style="background-color: #4d587d; color: white; text-align: center;">
                        User Login
                    </div>
                    <div class="card-body">
                        <form method="POST" autocomplete="off" action="/login">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control my-2" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                            </div>
                            @error("email")
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <input type="password" class="form-control my-2" name="password" placeholder="Password">
                            </div>
                            <input type="submit" class="btn my-2" name="login" value="Login" style="background-color: #4d587d; color: white;"></button>
                            <section class="mt-2"> Not a member? <a href="/register"> sign up </a></section>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>

    <footer class="footer text-muted bg-dark py-5">
        <div class="">
            <p class="text-white px-5">Youssef Ali & Kareem Zeair 2022</p>
            <small class="text-white px-5">Developed For ECE 5010</small>
        </div>
    </footer>

</body>

</html>