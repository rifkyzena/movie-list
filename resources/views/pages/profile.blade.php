@extends('layouts.app', ['title' => 'Profile'])
@section('content')
<main class="d-flex justify-content-center align-items-center" id="content">
    <div class="container row mx-auto d-flex justify-content-center align-items-center">
        <div class="col-lg-3 d-flex flex-column align-items-center">
            <h3>My <span class="text-danger"> Profile</span></h3>
            @if ($user->image_url)
            <button class="bg-transparent border-0" type="button" id="editImage" value="{{ $user->id }}">
                <img src="{{ asset('storage/'.$user->image_url) }}" alt="" class="img-thumbnail rounded-circle"
                    style="width: 100px; height: 100px; object-fit: cover;">
            </button>
            @else
            <button class="bg-transparent border-0" type="button" id="editImage" value="{{ $user->id }}">
                <img src="{{ asset('img/default-user.png') }}" alt="" class="img-thumbnail rounded-circle"
                    style="width: 100px; height: 100px; object-fit: cover;">
            </button>
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
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.image') }}" id="main_form" class="form-horizontal" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <input class="form-control bg-dark border-0" type="file" id="image_url" name="image_url">
                        <span class="text-danger error_text image_url_error"></span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger mx-1">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });

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

    $('body').on('click', '#editImage', function() {
        let id = $(this).val();
        $('#modal').modal('show');
        $('#id').val(id);
    });

    $('#main_form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error_text').text('')
            },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('#main_form').trigger("reset");;
                    $('#modal').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: data.success
                    });
                    setInterval(() => {
                        location.reload()
                    }, 3000);
                }
            }
        })
    })
</script>
@endpush