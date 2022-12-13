@extends('layouts.app', ['title' => 'Movies'])
@section('content')
<main id="content" style="padding-bottom: 25px;">
    <div class="container">
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <h5 class="text-danger">Movies</h5>
            <div>
                <input type="search" class="p-1 rounded bg-dark me-3" placeholder="Search Movie">
                <button type="button" class="btn btn-sm btn-danger">Add Movie</button>
            </div>
        </div>
        <div class="row col-12 justify-content-center gap-4 mt-3">
            @foreach ($movies as $m)
            <div class="card bg-transparent" style="width: 250px;">
                <a href="#">
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