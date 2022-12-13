@extends('layouts.app', ['title' => 'Register'])

@section('content')
<main class="d-flex justify-content-center align-items-center flex-column" id="content">
    <p class="fw-bold fs-3 mb-5 text-center">Hello Welcome to <span class="text-danger fw-bolder">Movie</span>List</p>
    <form class="col-12 col-lg-4" method="" id="login">
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="username" class="col-4 col-form-label">Username</label>
            <div class="col-8">
                <input type="text" class="form-control bg-dark border-0" id="username"
                    placeholder="Enter your username">
            </div>
        </div>
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input type="email" class="form-control bg-dark border-0" id="email" placeholder="Enter your email">
            </div>
        </div>
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="password" class="col-4 col-form-label">Password</label>
            <div class="col-8">
                <input type="password" class="form-control bg-dark border-0" id="password"
                    placeholder="Enter your password">
            </div>
        </div>
        <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
            <label for="password" class="col-4 col-form-label">Confirm Password</label>
            <div class="col-8">
                <input type="password" class="form-control bg-dark border-0" id="password"
                    placeholder="Enter your confirm password">
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