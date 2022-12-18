@extends('layouts.app', ['title' => 'Actors'])
@section('content')
<main id="content" style="padding-bottom: 25px;">
    <div class="container">
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <h5 class="text-danger">Actors</h5>
            @if (Auth::user() && Auth::user()->role == 'admin')
            <div>
                <input type="search" class="p-1 rounded bg-dark me-3" placeholder="Search Actor">
                <a href="{{ route('admin.actor.create') }}" class="btn btn-sm btn-danger">Add Actor</a>
            </div>
            @endif
        </div>
        <div class="row justify-content-center my-3">
            @foreach ($actors as $a)
            <div class="col-lg-2 col-md-4 col-6 my-3">
                <div class="card bg-dark border-0 p-2">
                    <a href="{{ route('actor.detail', $a->id) }}" class="text-decoration-none">
                        <img src="{{ asset('storage/'.$a->image_url) }}" class="card-img-top pt-1" alt="{{ $a->name }}"
                            style="max-height: 200px; object-fit: cover;">
                        <div class="px-1">
                            <p class="card-title text-truncate mt-2">{{ $a->name }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection