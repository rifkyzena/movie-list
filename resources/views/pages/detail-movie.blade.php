@extends('layouts.app', ['title' => 'Detail Movie '. $movie->title])
@section('content')
<main class="flex flex-column" id="content">
    <!-- BANNER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner">
            <div class="carousel-item active position-relative carousel-overlay">
                <img src="{{ asset('storage/'. $movie->background) }}" class="d-block details-banner"
                    alt="{{ $movie->title }}">
                <div class="position-absolute text-start col-12 d-flex flex-sm-wrap flex-lg-nowrap container banner-content"
                    style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                    <img src="{{ asset('storage/'. $movie->image_thumbnail) }}" alt="{{ $movie->title }}"
                        class="w-25 mx-auto">
                    <div class="ms-5 d-flex flex-column justify-content-center">
                        <div class="d-flex flex-wrap justify-content-between mb-4">
                            <h2>{{ $movie->title }}</h2>
                            @if (Auth::user() && Auth::user()->role == 'admin')
                            <div class="action fs-4">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <i class="fa-solid fa-trash-can"></i>
                            </div>
                            @endif
                        </div>
                        <div class="tag d-flex flex-wrap gap-3 mb-3">
                            @php
                            $genre = json_decode($movie->genre);
                            @endphp
                            @foreach ($genre as $g)
                            <span class="px-3 py-1 border rounded-pill" style="width: max-content;">{{ $g }}</span>
                            @endforeach
                        </div>
                        <div class="text-center" style="width: max-content;">
                            <i class="fa-solid fa-calendar-days fs-2 text-primary"></i>
                            <p>
                                Release Year <br>
                                <span class="fw-bold">{{ \Carbon\Carbon::parse($movie->release_date)->format('Y')
                                    }}</span>
                            </p>
                        </div>
                        <div>
                            <span class=" fw-bold">
                                Storyline
                            </span>
                            <p>{{{$movie->description}}}</p>
                        </div>
                        <div>
                            <h5 class="fw-bold">{{ $movie->director }}</h5>
                            <span>Director</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF BANNER -->

    <div class="container mt-5">
        <!-- CAST -->
        <div class="d-flex flex-column">
            <div class="border-start border-3 border-danger mb-4" style="height: max-content; line-height: normal;">
                <h4 class="ms-3">Cast</h4>
            </div>
            <div class="row col-12">
                @php

                // ambil semua nama aktor di tabel aktor, masukan kedalam array
                // looping semua data aktor di tabel movie
                // bandingkan aktor dari tabel movie dengan semua aktor dari tabel aktor
                // jika iyam, maka ketemu
                $actor = json_decode($movie->actor);
                $character_name = json_decode($movie->character_name);
                @endphp
                @for ($i = 0; $i < count($actor); $i++) @foreach ($actors as $a) @if ($a->name == $actor[$i])
                    <div class="card rounded bg-transparent col-lg-2 col-md-4 col-6">
                        <a href="{{ route('actor.detail', $a->id) }}" class="text-decoration-none">
                            <img src="{{ asset('storage/'.$a->image_url) }}" class="card-img-top w-100"
                                alt="{{ $a->name }}">
                            <div class="card-body bg-danger rounded">
                                <h5 class="card-title">{{ $actor[$i] }}</h5>
                                <p class="card-text">{{ $character_name[$i] }}</p>
                            </div>
                        </a>
                    </div>

                    @endif
                    @endforeach
                    @endfor
            </div>
        </div>
        <!-- END -->

        <!-- MORE -->
        <div class="d-flex flex-column mt-5">
            <div class="border-start border-3 border-danger mb-4" style="height: max-content; line-height: normal;">
                <h4 class="ms-3">More</h4>
            </div>
            <div class="row col-12">
                @foreach ($more as $m)
                <div class="card bg-transparent border-0 col-lg-2 col-md-4 col-6">
                    <a href="{{ route('movie.detail', $m->id) }}" class="text-decoration-none">
                        <img src="{{ asset('storage/' . $m->image_thumbnail) }}" class="card-img-top"
                            alt="{{ $m->title }}" style="aspect-ratio: 3/4; background-size: contain;">
                        <div class="card-body">
                            <p class="card-title text-truncate">{{ $m->title }}</p>
                            <p class="card-text">{{ \Carbon\Carbon::parse($m->release_date)->format('Y') }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <!-- END -->
    </div>
</main>
@endsection