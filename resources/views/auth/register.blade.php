@extends('layouts.app', ['title' => 'Register'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header text-center fs-3">{{ __('Hello, Welcome back to') }} <img
                        src="{{ asset('img/logo.png') }}" height="35px" alt="Logo"></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-md-8 offset-md-2">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" placeholder="Enter your username" autofocus>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Enter your email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-8 offset-md-2">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter your password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-8 offset-md-2">
                                <input id="password-confirm" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Enter your confirm password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <button id="auth" type="submit" class="col-md-8 offset-md-2 btn btn-danger">
                                {{ __('Register') }} <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                        <div class="mb-3 row">
                            <div class="d-flex justify-content-center">
                                <label class="form-check-label" for="remember">
                                    {{ __("Already have an account?") }} <a href="{{ route('login') }}"
                                        class="text-decoration-none"> Login now!</a>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection