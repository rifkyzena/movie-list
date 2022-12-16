@extends('layouts.app', ['title' => 'Movies'])
@section('content')
<main id="content" style="padding-bottom: 25px;">
    <div class="container">
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <h5 class="text-danger">Movies</h5>
            @if (Auth::user() && Auth::user()->role == 'admin')
            <div>
                <input type="search" class="p-1 rounded bg-dark me-3" placeholder="Search Movie">
                <a href="{{ route('admin.movie.create') }}" class="btn btn-sm btn-danger">Add Movie</a>
            </div>
            @endif
        </div>
        <div class="row col-12 justify-content-center mt-3">
            @foreach ($movies as $m)
            <div class="card bg-transparent col-lg-2 col-md-4 col-6">
                <a href="{{ route('movie.detail', $m->id) }}" class="text-decoration-none">
                    <img src="{{ asset('storage/'. $m->image_thumbnail) }}" class="card-img-top" alt="{{ $m->title }}"
                        style="aspect-ratio: 3/4; background-size: contain;">
                    <div class="card-body">
                        <p class="card-title text-truncate">{{ $m->title }}</p>
                        <p class="card-text">{{ \Carbon\Carbon::parse($m->release_date)->format('Y') }}</p>
                    </div>
                </a>
            </div>
            @endforeach
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