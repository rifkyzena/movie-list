<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container ">
            <a class="navbar-brand " href="#">
                <img src="{{ asset('img/logo.png') }}" height="20px" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="#">Movies</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link" href="#">Actors</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="btn {{ Request::segment(1) == 'login' ? ' btn-primary' : ' btn-outline-primary' }}"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="btn {{ Request::segment(1) == 'register' ? ' btn-primary' : ' btn-outline-primary' }}"
                            href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="p-3">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-center my-1">
                <img src="{{ asset('img/logo.png') }}" height="50px" alt="Logo">
            </div>
            <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-center my-1">
                <p class="text-white">
                    <img src="{{ asset('img/logo.png') }}" height="15px" alt="Logo"> is a Website that contains list of
                    movie
                </p>
            </div>
            <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-center my-1">
                <div class="round round-lg mx-1">
                    <a href="#"><i class="bi bi-twitter"></i></a>
                </div>
                <div class="round round-lg mx-1">
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="round round-lg mx-1">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="round round-lg mx-1">
                    <a href="#"><i class="bi bi-reddit"></i></a>
                </div>
                <div class="round round-lg mx-1">
                    <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-2 col-md-2 col-12"></div>
                    <div class="col-lg-2 col-md-2 col-12 border-end text-center"><a href="#"
                            class="text-decoration-none">Privacy Policy</a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 border-end text-center"><a href="#"
                            class="text-decoration-none">Term
                            of Service</a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12 border-end text-center"><a href="#"
                            class="text-decoration-none">Contact Us</a></div>
                    <div class="col-lg-2 col-md-2 col-12 text-center"><a href="#" class="text-decoration-none">About
                            Us</a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12"></div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-center mt-3">
                <p class="text-center text-white">Copyright &copy; 2022 <img src="{{ asset('img/logo.png') }}"
                        height="15px" alt="Logo"> All Rights Reserved</p>
            </div>
        </div>
    </footer>
</body>

</html>