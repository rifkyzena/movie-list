@extends('layouts.app', ['title' => 'Movies'])
@section('content')
<main id="content" style="padding-bottom: 25px;">
    <div class="container">
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <h5 class="text-danger">Movies</h5>
            <div>
                <input type="search" class="p-1 rounded bg-dark" placeholder="Search Movie" id="search">
                @if (Auth::user() && Auth::user()->role == 'admin')
                <a href="{{ route('admin.movie.create') }}" class="btn btn-sm btn-danger">Add Movie</a>
                @endif
            </div>
        </div>
        <div class="row justify-content-center my-3" id="movie-show">
            @foreach ($movies as $m)
            <div class="col-lg-2 col-md-4 col-6 my-3" id="movie">
                <div class="card bg-dark border-0 p-2">
                    <a href="{{ route('movie.detail', $m->id) }}" class="text-decoration-none">
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
    </div>
</main>
@endsection
@push('js')
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    let Toast = Swal.mixin({
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
                        newRowAdd = 
                            '<div class="col-12 text-center" id="movie">'+
                                '<h4>No Data Movie Found</h4>'+
                            '</div>';
                        $('#movie-show').append(newRowAdd);
                    }
                    for(i=0; i<count;i++){
                        let date = new Date(data[i].release_date);
                        let urlImg = ''
                        let url = '{{ route("movie.detail", ":id") }}';
                        url = url.replace(':id', data[i].id);
                        urlImg = '<a href="'+url+'" class="text-decoration-none">';
                        newRowAdd = 
                            '<div class="col-lg-2 col-md-4 col-6 my-3" id="movie">'+
                                '<div class="card bg-dark border-0 p-2">'+
                                    urlImg+
                                        '<img src="{{ asset("storage") }}/'+data[i].image_thumbnail+'" class="card-img-top" alt="'+data[i].title+ 'style="aspect-ratio: 3/4; background-size: contain;">'+
                                        '<div class="card-body">'+
                                            '<p class="card-title text-truncate">'+data[i].title+'</p>'
                                            '<p class="card-text">'+date.getFullYear()+'</p>'
                                        '</div>'+
                                    '</a>'+
                                '</div>'+
                            '</div>'
                        $('#movie-show').append(newRowAdd);
                    }
                }
            });
        }
    })
</script>
@endpush