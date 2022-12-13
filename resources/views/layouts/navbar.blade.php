<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 sticky-top">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand" href="#">
            <h3><span class="text-danger fw-bolder">Movie</span>List</h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center d-lg-flex justify-content-end align-items-center"
            id="navbarText">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="nav-link{{ Request::segment(1) == 'home' ? ' active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::segment(1) == 'movie' ? ' active' : '' }}"
                        href="{{ route('movie') }}">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::segment(1) == 'actor' ? ' active' : '' }}"
                        href="{{ route('actor') }}">Actors</a>
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
<!-- END OF NAVBAR -->