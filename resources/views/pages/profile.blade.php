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
            <form action="{{ route('profile.update') }}" class="col-12 fw-bold" method="POST" id="login">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="username" class="col-2 col-form-label">Username</label>
                    <div class="col-10">
                        <input type="text" class="form-control @error('username')
                            is-invalid
                        @enderror bg-dark border-0" id="username" name="username" placeholder="Enter your username"
                            value="{{ old('username',$user->username) }}">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: #dc3545 !important">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="email" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input type="email" class="form-control @error('email')
                            is-invalid
                        @enderror bg-dark border-0" id="email" name="email" placeholder="Enter your email"
                            value="{{ old('email',$user->email) }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: #dc3545 !important">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="date_of_birth" class="col-2 col-form-label">DOB</label>
                    <div class="col-10">
                        <input type="date" class="form-control @error('date_of_birth')
                            is-invalid
                        @enderror bg-dark border-0" id="date_of_birth" name="date_of_birth"
                            value="{{ old('date_of_birth',$user->date_of_birth) }}">
                        @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: #dc3545 !important">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 bg-dark rounded-3 p-2 d-flex">
                    <label for="phone" class="col-2 col-form-label">Phone</label>
                    <div class="col-10">
                        <input type="tel" class="form-control @error('phone')
                            is-invalid
                        @enderror bg-dark border-0" id="phone" name="phone" placeholder="Enter phone number"
                            value="{{ old('phone',$user->phone) }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: #dc3545 !important">{{ $message }}</strong>
                        </span>
                        @enderror
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
@push('js')
<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
    @if(session('success'))
        Toast.fire({
        icon: 'success',
        title: '{!! session('success') !!}'
        });
    @endif
</script>
@endpush