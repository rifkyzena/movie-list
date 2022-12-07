<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <a class="navbar-brand " href="#">
            <img src="{{ asset('img/logo.png') }}" height="20px" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item mx-1">
                    <a class="nav-link{{ Request::segment(1) == 'home' ? ' active' : '' }}"
                        href="{{ route('home') }}">Home</a>
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