@extends('layouts.app', ['title' => 'Home'])
@section('content')
<main class="flex flex-column" id="content">
    <!-- BANNER -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($slider as $s)
            <div class="carousel-item active position-relative carousel-overlay">
                <img src="{{ asset('storage/' . $s->background) }}" class="d-block" alt="{{ $s->title }}">
                <div
                    class="carousel-caption position-absolute top-0 bottom-0 text-start col-lg-4 d-flex flex-column justify-content-center">
                    <p>
                        @php
                        $genre = json_decode($s->genre);
                        @endphp
                        @foreach ($genre as $g)
                        @if (!$loop->last)
                        {{ $g }},
                        @else
                        {{ $g }}
                        @endif
                        @endforeach
                        | {{ \Carbon\Carbon::parse($s->release_date)->format('Y') }}
                    </p>
                    <h3>{{ $s->title }}</h3>
                    <p>{{$s->description}}</p>
                    <button type="button" class="btn btn-danger flex-shrink-0 w-50">
                        <i class="fa fa-solid fa-plus"></i>
                        Add to Watchlists
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- END OF BANNER -->

    <!-- Popular Movies -->
    <section class="container my-4" id="popular">
        <h5><i class="fa fa-solid fa-fire-flame-curved mb-3 mt-4"></i> Popular</h5>
        <div class="swiper">
            <!-- Movie wrapper -->
            <div class="swiper-wrapper">
                <!-- Movie Item -->
                @foreach ($movies as $m)
                <div class="swiper-slide">
                    <div class="card bg-transparent" style="width: 250px;">
                        <a href="#">
                            <img src="{{ asset('storage/'. $m->image_thumbnail) }}" class="card-img-top"
                                alt="{{ $m->title }}" style="aspect-ratio: 3/4; background-size: contain;">
                            <div class="card-body">
                                <p class="card-title text-truncate">{{ $m->title }}</p>
                                <p class="card-text">{{ \Carbon\Carbon::parse($m->release_date)->format('Y') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </section>
    <!-- END -->

    <!-- Show -->
    <section class="container my-4" id="show">
        <div class="d-flex justify-content-between mt-3">
            <h5><i class="fa-solid fa-film"></i> Show</h5>
            <input type="search" class="p-1 rounded bg-dark" placeholder="Search Movie">
        </div>
        <hr>
        <!-- TagList -->
        <div class="taglist d-flex flex-wrap justify-content-center mb-3 gap-3 overflow-auto">
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Animation</button>
        </div>
        <div class="d-flex align-items-center gap-2">
            <div class="mr-4">Sort By: </div>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Latest</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">A-Z</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center"
                style="width: max-content;">Z-A</button>
        </div>
        <!-- END -->
        <div class="d-flex justify-content-end mt-2 mb-4">
            <button type="button" class="btn btn-sm btn-danger position-relative">
                <i class="fa-solid fa-plus"></i>
                Add Movie
            </button>
        </div>
        <div class="swiper">
            <!-- Movie wrapper -->
            <div class="swiper-wrapper">
                <!-- Movie Item -->
                @foreach ($movies as $m)
                <div class="swiper-slide">
                    <div class="card bg-transparent" style="width: 250px;">
                        <a href="#">
                            <img src="{{ asset('storage/'. $m->image_thumbnail) }}" class="card-img-top"
                                alt="{{ $m->title }}" style="aspect-ratio: 3/4; background-size: contain;">
                            <div class="card-body">
                                <p class="card-title text-truncate">{{ $m->title }}</p>
                                <p class="card-text">{{ \Carbon\Carbon::parse($m->release_date)->format('Y') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </section>
    <!-- END -->
</main>
@endsection
@push('js')
<script>
    new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: false,
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        // when window width is >= 640px
        440: {
          slidesPerView: 2,
          spaceBetween: 40
        },
        740: {
          slidesPerView: 3,
          spaceBetween: 80
        },
        900: {
          slidesPerView: 5,
          spaceBetween: 40
        }
      }
    });
</script>
@endpush