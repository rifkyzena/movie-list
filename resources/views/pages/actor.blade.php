@extends('layouts.app', ['title' => 'Actors'])
@section('content')
<main id="content">
    <div class="container">
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <h5 class="text-danger">Actors</h5>
            <div>
                <input type="search" class="p-1 rounded bg-dark me-3" placeholder="Search Movie">
                <button type="button" class="btn btn-sm btn-danger">Add Actor</button>
            </div>
        </div>
        <div class="row col-12 justify-content-center gap-4 mt-3">
            @foreach ($actors as $a)
            <div class="card bg-dark border-0" style="width: 11rem;">
                <img src="{{ asset('storage/'.$a->image_url) }}" class="card-img-top pt-1" alt="{{ $a->name }}"
                    style="max-height: 200px; object-fit: cover;">
                <div class="px-1">
                    <p class="card-title text-truncate mt-2">{{ $a->name }}</p>
                    <p class="text-secondary">Spiderman</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection