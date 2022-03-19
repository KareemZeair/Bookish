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
            background-color: #f8f0e8;
            /* background-image: url("MediaAssets/bg.jpg"); */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        User Login
                    </div>
                    <div class="card-body">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" autocomplete="off" action="/Home">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control my-2" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control my-2" name="password" placeholder="Password">
                            </div>
                            <input type="submit" class="btn btn-primary my-2" name="login" value="Login"></button>
                            <section class="mt-2"> Not a member? <a> sign up </a></section>
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

</html>