@extends('layouts.app', ['title' => 'Profile'])
@section('content')
<main class="d-flex justify-content-center align-items-center" id="content">
    <div class="container row mx-auto d-flex justify-content-center align-items-center">
        <div class="col-lg-3 d-flex flex-column align-items-center">
            <h3>My <span class="text-danger"> Profile</span></h3>
            @if ($user->image_url)
            <img src="{{ asset('storage/'.$user->image_url) }}" alt="" class="img-thumbnail rounded-circle"
                data-bs-toggle="modal" data-bs-target="#profileModal"
                style="width: 100px; height: 100px; object-fit: cover;">
            @else
            <img src="{{ asset('img/default-user.png') }}" alt="" class="img-thumbnail rounded-circle"
                data-bs-toggle="modal" data-bs-target="#profileModal"
                style="width: 100px; height: 100px; object-fit: cover;">
            @endif
            <div class="text-center">
                <p class="fw-bold">{{ $user->username }}</p>
                <p>{{ $user->email }}</p>
            </div>
        </div>
        <div class="col-lg-9">
            <h4 class="text-danger mb-5">Update Profile</h4>
            <form class="col-12 fw-bold" method="" id="login">
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="username" class="col-2 col-form-label">Username</label>
                    <div class="col-10">
                        <input type="text" class="form-control bg-dark border-0" id="username"
                            placeholder="Enter your username" value="{{ $user->username }}">
                    </div>
                </div>
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="email" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input type="email" class="form-control bg-dark border-0" id="email"
                            placeholder="Enter your email" value="{{ $user->email }}">
                    </div>
                </div>
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="birth" class="col-2 col-form-label">DOB</label>
                    <div class="col-10">
                        <input type="date" class="form-control bg-dark border-0" id="birth"
                            value="{{ $user->date_of_birth }}">
                    </div>
                </div>
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="phone" class="col-2 col-form-label">Phone</label>
                    <div class="col-10">
                        <input type="tel" class="form-control bg-dark border-0" id="phone"
                            placeholder="Enter phone number" {{ $user->phone }}>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger w-100 mt-4">
                    Save changes
                </button>
            </form>
        </div>
    </div>
</main>
<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input class="form-control bg-dark border-0" type="file" id="formFile">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection