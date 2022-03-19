<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bookish</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: #F3F2F2;">
        <div class="container-fluid">
            <a class="navbar-brand mb-2" href="/"><img src="MediaAssets/iconTr1.png" alt="home" style="width: 120px; height:auto;"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">

                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 200px; padding-right: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Marketplace</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login" tabindex="-1">Sign out</a>
                    </li>
                </ul>

                <form class="d-flex" method="GET" action="/search">
                    <input class="form-control me-2" name="keyword" type="search" placeholder="Search for Books" aria-label="Search">
                    <input type="hidden" id="page" name="page" value="1">
                    <button class="btn" type="submit"><img src="MediaAssets/search.svg" alt=""></button>
                </form>
            </div>
        </div>
    </nav>

</head>



<body class="pt-3 bg-light">

    @yield('content')

    <footer class="footer text-muted bg-dark py-5">
        <div class="">
            <p class="text-white px-5">Youssef Ali & Kareem Zeair 2022</p>
            <small class="text-white px-5">Developed For ECE 5010</small>
        </div>
    </footer>

</body>



</html>