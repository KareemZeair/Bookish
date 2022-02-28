<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Profile</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
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
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Sign out</a>
                    </li>
                </ul>

                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search for Books" aria-label="Search">
                    <button class="btn" type="submit"><img src="MediaAssets/search.svg" alt=""></button>
                </form>
            </div>
        </div>
    </nav>

</head>



<body class="pt-5">

    <div class="container my-5">
        <div class="row">
            <div class="col">
                <img src="MediaAssets/user.png" style="width: 300px; height:auto;" alt="">
            </div>
            <div class="col w-75 my-5">
                <div class="row">
                    <h1>Past Reads</h1>
                    <div class="d-flex flex-row flex-nowrap overflow-auto">
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                    </div>
                </div>

                <div class="row" style="margin-top: 50px;">
                    <h1>Wish List</h1>
                    <div class="d-flex flex-row flex-nowrap overflow-auto">
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
                        <div class="card card-block mx-2" style="min-width: 300px;">Card</div>
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