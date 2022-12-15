@extends('layouts.app', ['title' => 'Register'])

@section('content')
<main class="d-flex justify-content-center align-items-center flex-column" id="content">
    <p class="fw-bold fs-3 mb-5 text-center">Hello Welcome to <span class="text-danger fw-bolder">Movie</span>List</p>
    <form action="{{ route('register') }}" class="col-12 col-lg-4" method="POST" id="login">
        @csrf
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="username" class="col-4 col-form-label">Username</label>
            <div class="col-8">
                <input type="text" class="form-control @error('username')
                    is-invalid
                @enderror bg-dark border-0" id="username" name="username" placeholder="Enter your username"
                    value="{{ old('username') }}">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input type="email" class="form-control @error('email')
                    is-invalid
                @enderror bg-dark border-0" id="email" name="email" placeholder="Enter your email"
                    value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="password" class="col-4 col-form-label">Password</label>
            <div class="col-8">
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
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="password" class="col-4 col-form-label">Confirm Password</label>
            <div class="col-8">
                <input type="password" class="form-control bg-dark border-0" id="password_confirmation"
                    name="password_confirmation" placeholder="Enter your confirm password">
            </div>
        </div>
        <button type="submit" class="btn btn-danger w-100 mt-2">
            Register <i class="fa fa-solid fa-arrow-right"></i>
        </button>
        <p class="text-center mt-2 fw-bold">Already have account ? <a href="{{ route('login') }}"
                class="text-danger">Login now!</a></p>
    </form>
</main>
@endsection