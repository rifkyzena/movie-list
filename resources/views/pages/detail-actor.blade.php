@extends('layouts.app', ['title' => 'Detail Actor ' . $actor->name])
@section('content')
<main id="content">
    <div class="container row mx-auto">
        <div class="col-lg-3 col-sm-12">
            <div class="position-relative d-flex justify-content-center">
                <img src="{{ asset('storage/'. $actor->image_url) }}" alt="{{ $actor->name }}" class="w-100"
                    style="max-width: 400px;">
                @if (Auth::user() && Auth::user()->role == 'admin')
                <div class="action fs-4">
                    <a href="{{ route('admin.actor.edit', $actor->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <button class="btn btn-danger btn-sm" id="delete" value="{{ $actor->id }}">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                @endif
            </div>
            <div class="d-flex flex-column gap-2">
                <h4>Personal Info</h4>
                <div id="popularity">
                    <span class="fw-semibold">Popularity</span>
                    <br>
                    <span>{{ $actor->popularity }}</span>
                </div>
                <div id="gender">
                    <span class="fw-semibold">Gender</span>
                    <br>
                    <span>{{ $actor->gender }}</span>
                </div>
                <div id="bhirtday">
                    <span class="fw-semibold">Birthday</span>
                    <br>
                    <span>{{ \Carbon\Carbon::parse($actor->date_of_birth)->format('d F Y') }}</span>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-12">
            <h2 class="mb-2">{{ $actor->name }}</h2>
            <p>Biography</p>
            <p style="text-align: justify;">{{$actor->biography}}</p>
            <h5>Known For</h5>
            <div class="movielist row col-12">
                @foreach ($movies as $m)
                @php
                $act = json_decode($m->actor);
                @endphp
                @foreach ($act as $a)
                @if ($actor->name == $a)
                <div class="card bg-transparent border-0 col-lg-2 col-md-4 col-6">
                    <img src="{{ asset('storage/'.$m->image_thumbnail) }}" class="card-img-top" alt="{{ $m->title }}"
                        style="aspect-ratio: 3/4; background-size: contain;">
                    <div class="card-body">
                        <p class="card-title text-truncate">{{ $m->title }}</p>
                        <p class="card-text">{{ \Carbon\Carbon::parse($m->release_date)->format('Y') }}</p>
                    </div>
                </div>
                @endif
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection
@push('js')
<script>
    var Toast = Swal.mixin({
        toast: true, 
        position: 'top-end', 
        showConfirmButton: false, 
        timer: 3000, 
        timerProgressBar: true 
    });

    @if(session('success'))
        Toast.fire({
        icon: 'success',
        title: '{!! session('success') !!}'
        });
    @endif

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click', '#delete', function() {
            var id = $(this).val();

            Swal.fire({
                title: 'Are you sure you want to delete this actor data ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: '#FF0000',
                cancelButtonText: 'No',
                cancelButtonColor: '#3085d6',
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/actor/" + id,
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: 'success',
                                    title: response.success
                                });
                            }
                        }
                    });
                    window.location.href = '/actor';
                }
            })
        });
</script>
@endpush