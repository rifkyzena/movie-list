@extends('layouts.app', ['title' => 'Login'])

@section('content')
<main class="d-flex justify-content-center align-items-center flex-column" id="content">
    <p class="fw-bold fs-3 mb-5 text-center">Hello Welcome Back to <span class="text-danger fw-bolder">Movie</span>List
    </p>
    <form action="{{ route('login') }}" class="col-12 col-lg-4" id="login" method="POST">
        @csrf
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="email" class="col-2 col-form-label">Email</label>
            <div class="col-10">
                <input type="email" class="form-control @error('email')
                    is-invalid
                @enderror bg-dark border-0" id="email" name="email" placeholder="Enter your email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="password" class="col-2 col-form-label">Password</label>
            <div class="col-10">
                <input type="password" class="form-control @error('password')
                    is-invalid
                @enderror bg-dark border-0" id="password" name="password" placeholder="Enter your password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="remember">
                    <label class="form-check-label" for="gridCheck1">
                        Remember Me
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-danger w-100">
            Login <i class="fa fa-solid fa-arrow-right"></i>
        </button>
        <p class="text-center mt-2 fw-bold">Dont have account ? <a href="{{ route('register') }}"
                class="text-danger">Register now!</a></p>
    </form>
</main>
@endsection