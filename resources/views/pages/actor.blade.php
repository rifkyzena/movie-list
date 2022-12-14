@extends('layouts.app', ['title' => 'Actors'])
@section('content')
<main id="content" style="padding-bottom: 25px;">
    <div class="container">
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <h5 class="text-danger">Actors</h5>
            @if (Auth::user() && Auth::user()->role == 'admin')
            <div>
                <input type="search" class="p-1 rounded bg-dark me-3" placeholder="Search Movie">
                <a href="{{ route('admin.actor.create') }}" class="btn btn-sm btn-danger">Add Actor</a>
            </div>
            @endif
        </div>
        <div class="row col-12 justify-content-center gap-5 mt-3">
            @foreach ($actors as $a)
            <div class="card bg-dark border-0" style="width: 11rem;">
                <a href="{{ route('actor.detail', $a->id) }}" class="text-decoration-none">
                    <img src="{{ asset('storage/'.$a->image_url) }}" class="card-img-top pt-1" alt="{{ $a->name }}"
                        style="max-height: 200px; object-fit: cover;">
                    <div class="px-1">
                        <p class="card-title text-truncate mt-2">{{ $a->name }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection