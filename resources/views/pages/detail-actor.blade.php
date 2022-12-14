@extends('layouts.app', ['title' => 'Detail Actor ' . $actor->name])
@section('content')
<main id="content">
    <div class="container row mx-auto">
        <div class="col-lg-3 col-sm-12">
            <div class="position-relative d-flex justify-content-center">
                <img src="{{ asset('storage/'. $actor->image_url) }}" alt="{{ $actor->name }}" class="w-100"
                    style="max-width: 400px;">
                @if (Auth::user() && Auth::user()->role == 'admin')
                <div class="position-absolute d-flex flex-column gap-2 me-1 mt-1" style="top: 0; right: 0;">
                    <button type="button" class="btn btn-danger rounded-circle" style="width: max-content;"><i
                            class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="btn btn-danger rounded-circle" style="width: max-content;"><i
                            class="fa-solid fa-trash-can"></i></button>
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
                    <span class="fw-semibold">Bhirtday</span>
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