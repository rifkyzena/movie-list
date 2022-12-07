@extends('layouts.app', ['title' => 'Home'])
@push('css')
<style>
    img {
        -webkit-user-drag: none;
        -moz-user-drag: none;
        -o-user-drag: none;
        user-drag: none;
    }

    img {
        pointer-events: none;
    }

    .movie_card {
        padding: 0 !important;
        border-radius: 10px;
        box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.2), 0 4px 15px 0 rgba(0, 0, 0, 0.19);
    }

    .movie_card img {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 20rem;
    }

    .movie_info {
        color: #5e5c5c;
    }

    .card-title {
        width: 80%;
    }
</style>
@endpush
@section('content')
{{-- Carousel --}}
<section id="carousel" class="my-3">
    <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <div class="d-flex justify-content-center">
                    <img src="https://images.pexels.com/photos/3658809/pexels-photo-3658809.jpeg" class="d-block w-75"
                        alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <div class="d-flex justify-content-center">
                    <img src="https://images.pexels.com/photos/3417747/pexels-photo-3417747.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="d-block w-75" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <div class="d-flex justify-content-center">
                    <img src="https://images.pexels.com/photos/13415559/pexels-photo-13415559.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                        class="d-block w-75" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
{{-- Content Popular --}}
<div class="container">
    <section id="popular" class="my-3">
        <div class="header">
            <h5 class="text-white fw-bold"><i class="fa fa-fire"></i> Popular</h5>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <div class="card movie_card">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/christmas-movie-night-design-template-01eb0ad04965caab1e86e8be852c6348_screen.jpg?ts=1670220559"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="" class="text-decoration-none" style="color: white !important">
                            <h5 class="card-title">Toy Story 4</h5>
                        </a>
                        <span class="movie_info">2019</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <div class="card movie_card">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/christmas-movie-night-design-template-01eb0ad04965caab1e86e8be852c6348_screen.jpg?ts=1670220559"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="" class="text-decoration-none" style="color: white !important">
                            <h5 class="card-title">Toy Story 4</h5>
                        </a>
                        <span class="movie_info">2019</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <div class="card movie_card">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/christmas-movie-night-design-template-01eb0ad04965caab1e86e8be852c6348_screen.jpg?ts=1670220559"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="" class="text-decoration-none" style="color: white !important">
                            <h5 class="card-title">Toy Story 4</h5>
                        </a>
                        <span class="movie_info">2019</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <div class="card movie_card">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/christmas-movie-night-design-template-01eb0ad04965caab1e86e8be852c6348_screen.jpg?ts=1670220559"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Toy Story 4</h5>
                        <span class="movie_info">2019</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <div class="card movie_card">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/christmas-movie-night-design-template-01eb0ad04965caab1e86e8be852c6348_screen.jpg?ts=1670220559"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Toy Story 4</h5>
                        <span class="movie_info">2019</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-6 mb-3">
                <div class="card movie_card">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/christmas-movie-night-design-template-01eb0ad04965caab1e86e8be852c6348_screen.jpg?ts=1670220559"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Toy Story 4</h5>
                        <span class="movie_info">2019</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection