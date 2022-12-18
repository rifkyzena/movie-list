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
            <div class="carousel-item {{ $loop->first ? 'active' : '' }} position-relative carousel-overlay">
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
                    @if ($user && $user->role == 'user')
                    <a href="{{ route('member.watchlist.add', $s->id) }}" class="btn btn-danger flex-shrink-0 w-50">
                        <i class="fa-solid fa-plus"></i>
                        Add to Watchlists
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- END OF BANNER -->

    <!-- Popular Movies -->
    <section class="container my-4" id="popular">
        <div class="d-flex align-items-center gap-1 mb-3">
            <i class="fa-solid fa-fire-flame-curved text-white"></i>
            <h5 style="margin: 0 !important">Popular</h5>
        </div>
        <div class="swiper">
            <!-- Movie wrapper -->
            <div class="swiper-wrapper">
                <!-- Movie Item -->
                @foreach ($movie_populars as $m)
                <div class="swiper-slide">
                    <a href="{{ route('movie.detail', $m->id) }}" class="text-decoration-none">
                        <div class="card bg-transparent">
                            <img src="{{ asset('storage/'. $m->image_thumbnail) }}" class="card-img-top"
                                alt="{{ $m->title }}">
                            <div class="card-body">
                                <p class="card-title text-truncate">{{ $m->title }}</p>
                                <div class="d-flex justify-content-between center">
                                    <p>{{ \Carbon\Carbon::parse($m->release_date)->format('Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
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
            <input type="search" class="p-1 rounded bg-dark" placeholder="Search Movie" id="search">
        </div>
        <hr>
        <!-- TagList -->
        <div class="taglist d-flex flex-wrap justify-content-center mb-3 gap-3 overflow-auto">
            @foreach ($genres as $g)
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center" style="width: max-content;"
                onclick="sort(this);" value="{{$g['name']}}">{{$g['name']}}</button>
            @endforeach
        </div>
        <div class="d-flex align-items-center mb-3 gap-2">
            <div class="mr-4 text-white">Sort By: </div>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center" style="width: max-content;"
                id="sortLatest">Latest</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center" style="width: max-content;"
                id="sortAsc">A-Z</button>
            <button type="button" class="btn btn-dark rounded-pill px-3 text-center" style="width: max-content;"
                id="sortDesc">Z-A</button>
        </div>
        <!-- END -->
        @if ($user && $user->role == 'admin')
        <div class="d-flex justify-content-end mt-2 mb-4">
            <a href="{{ route('admin.movie.create') }}" class="btn btn-sm btn-danger position-relative">
                <i class="fa-solid fa-plus"></i>
                Add Movie
            </a>
        </div>
        @endif
        <div class="swiper">
            <!-- Movie wrapper -->
            <div class="swiper-wrapper" id="movie-show">
                <!-- Movie Item -->
                @foreach ($movies as $m)
                <div class="swiper-slide" id="movie">
                    <div class="card bg-transparent">
                        <img src="{{ asset('storage/'. $m->image_thumbnail) }}" class="card-img-top"
                            alt="{{ $m->title }}">
                        <div class="card-body">
                            <p class="card-title text-truncate">{{ $m->title }}</p>
                            <div class="d-flex justify-content-between center">
                                <p>{{ \Carbon\Carbon::parse($m->release_date)->format('Y') }}</p>
                                @if ($user && $user->role == 'user')
                                @if ($m->watchlist)
                                <i class="fa-solid fa-check text-success"></i>
                                @else
                                <a href="{{ route('member.watchlist.add', $m->id) }}">
                                    <i class="fa-solid fa-plus text-danger"></i>
                                </a>
                                @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="row" id="row-movie"></div>
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
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });

    @if(session('error'))
        Toast.fire({
        icon: 'error',
        title: '{!! session('error') !!}'
        });
    @endif

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    let movies = {!! json_encode($movies) !!};

    function sort(ele){
        $.ajax({
        type:'POST',
        url:"{{ route('movie.sort.category') }}",
        data:{param:ele.value},
        success:function(data){
            $('div#movie').remove()
            let count = data.length
            if(count == 0){
                newRowAdd = '<div class="row ms-3" id="movie">'+
                    '<div class="col-12 text-center">'+
                        '<h4>No Data Movie Found</h4>'+
                    '</div>'+
                '</div>';
                $('#movie-show').append(newRowAdd);
            }
            for(i=0; i<count;i++){
                let date = new Date(data[i].release_date);
                let icon = ''
                if(data[i].watchlist != null){
                    icon = '<i class="fa-solid fa-check text-success"></i>';
                }else{
                    var url = '{{ route("member.watchlist.add", ":id") }}';
                    url = url.replace(':id', data[i].id);
                    icon = '<a href="'+url+'">'+
                                    '<i class="fa-solid fa-plus text-danger"></i>'+
                                '</a>';
                }
                newRowAdd = '<div class="swiper-slide" id="movie" style="width: max-content;">'+
                    '<div class="card bg-transparent">'+
                        '<img src="{{ asset("storage") }}/'+data[i].image_thumbnail+'" class="card-img-top" alt="'+data[i].title+'">'+
                        '<div class="card-body">'+
                            '<p class="card-title text-truncate">'+data[i].title+'</p>'+
                            '<div class="d-flex justify-content-between center">'+
                                '<p>'+date.getFullYear()+'</p>'+
                                '@if ($user && $user->role == "user")'+
                                    icon +
                                '@endif'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                $('#movie-show').append(newRowAdd);
            }
        }
        });
    }

    $("#search").keyup(function(e) {
        if (event.keyCode === 13) {
            let param = $('#search').val();
            $.ajax({
                type:'POST',
            url:"{{ route('movie.search') }}",
            data:{param:param},
            success:function(data){
                $('div#movie').remove()
                let count = data.length
                if(count == 0){
                    newRowAdd = '<div class="row ms-3" id="movie">'+
                        '<div class="col-12 text-center">'+
                            '<h4>No Data Movie Found</h4>'+
                        '</div>'+
                    '</div>';
                    $('#movie-show').append(newRowAdd);
                }
                for(i=0; i<count;i++){
                    let date = new Date(data[i].release_date);
                    let icon = ''
                    if(data[i].watchlist != null){
                        icon = '<i class="fa-solid fa-check text-success"></i>';
                    }else{
                        var url = '{{ route("member.watchlist.add", ":id") }}';
                        url = url.replace(':id', data[i].id);
                        icon = '<a href="'+url+'">'+
                                        '<i class="fa-solid fa-plus text-danger"></i>'+
                                    '</a>';
                    }
                    newRowAdd = '<div class="swiper-slide" id="movie">'+
                        '<div class="card bg-transparent">'+
                            '<img src="{{ asset("storage") }}/'+data[i].image_thumbnail+'" class="card-img-top" alt="'+data[i].title+'">'+
                            '<div class="card-body">'+
                                '<p class="card-title text-truncate">'+data[i].title+'</p>'+
                                '<div class="d-flex justify-content-between center">'+
                                    '<p>'+date.getFullYear()+'</p>'+
                                    '@if ($user && $user->role == "user")'+
                                        icon +
                                    '@endif'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
                    $('#movie-show').append(newRowAdd);
                }
            }
            });
        }
    })
    $('#sortLatest').click(function(){
        $.ajax({
        type:'GET',
        url:"{{ route('movie.sort.latest') }}",
        success:function(data){
            $('div#movie').remove()
            let count = data.length
            for(i=0; i<count;i++){
                let date = new Date(data[i].release_date);
                let icon = ''
                if(data[i].watchlist != null){
                    icon = '<i class="fa-solid fa-check text-success"></i>';
                }else{
                    var url = '{{ route("member.watchlist.add", ":id") }}';
                    url = url.replace(':id', data[i].id);
                    icon = '<a href="'+url+'">'+
                                    '<i class="fa-solid fa-plus text-danger"></i>'+
                                '</a>';
                }
                newRowAdd = '<div class="swiper-slide" id="movie">'+
                    '<div class="card bg-transparent">'+
                        '<img src="{{ asset("storage") }}/'+data[i].image_thumbnail+'" class="card-img-top" alt="'+data[i].title+'">'+
                        '<div class="card-body">'+
                            '<p class="card-title text-truncate">'+data[i].title+'</p>'+
                            '<div class="d-flex justify-content-between center">'+
                                '<p>'+date.getFullYear()+'</p>'+
                                '@if ($user && $user->role == "user")'+
                                    icon +
                                '@endif'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                $('#movie-show').append(newRowAdd);
            }
        }
        });
    })
    $('#sortAsc').click(function(){
        $.ajax({
        type:'GET',
        url:"{{ route('movie.sort.asc') }}",
        success:function(data){
            $('div#movie').remove()
            let count = data.length
            for(i=0; i<count;i++){
                let date = new Date(data[i].release_date);
                let icon = ''
                if(data[i].watchlist != null){
                    icon = '<i class="fa-solid fa-check text-success"></i>';
                }else{
                    var url = '{{ route("member.watchlist.add", ":id") }}';
                    url = url.replace(':id', data[i].id);
                    icon = '<a href="'+url+'">'+
                                    '<i class="fa-solid fa-plus text-danger"></i>'+
                                '</a>';
                }
                newRowAdd = '<div class="swiper-slide" id="movie">'+
                    '<div class="card bg-transparent">'+
                        '<img src="{{ asset("storage") }}/'+data[i].image_thumbnail+'" class="card-img-top" alt="'+data[i].title+'">'+
                        '<div class="card-body">'+
                            '<p class="card-title text-truncate">'+data[i].title+'</p>'+
                            '<div class="d-flex justify-content-between center">'+
                                '<p>'+date.getFullYear()+'</p>'+
                                '@if ($user && $user->role == "user")'+
                                    icon +
                                '@endif'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                $('#movie-show').append(newRowAdd);
            }
        }
        });
    })
    $('#sortDesc').click(function(){
        $.ajax({
        type:'GET',
        url:"{{ route('movie.sort.desc') }}",
        success:function(data){
            $('div#movie').remove()
            let count = data.length
            for(i=0; i<count;i++){
                let date = new Date(data[i].release_date);
                let icon = ''
                if(data[i].watchlist != null){
                    icon = '<i class="fa-solid fa-check text-success"></i>';
                }else{
                    var url = '{{ route("member.watchlist.add", ":id") }}';
                    url = url.replace(':id', data[i].id);
                    icon = '<a href="'+url+'">'+
                                    '<i class="fa-solid fa-plus text-danger"></i>'+
                                '</a>';
                }
                newRowAdd = '<div class="swiper-slide" id="movie">'+
                    '<div class="card bg-transparent">'+
                        '<img src="{{ asset("storage") }}/'+data[i].image_thumbnail+'" class="card-img-top" alt="'+data[i].title+'">'+
                        '<div class="card-body">'+
                            '<p class="card-title text-truncate">'+data[i].title+'</p>'+
                            '<div class="d-flex justify-content-between center">'+
                                '<p>'+date.getFullYear()+'</p>'+
                                '@if ($user && $user->role == "user")'+
                                    icon +
                                '@endif'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                $('#movie-show').append(newRowAdd);
            }
        }
        });
    })
</script>
@endpush