@extends('layouts.app', ['title' => 'Actors'])
@section('content')
<main id="content" style="padding-bottom: 25px;">
    <div class="container">
        <div class="d-flex justify-content-between mt-3 align-items-center">
            <h5 class="text-danger">Actors</h5>
            <div>
                <input type="search" class="p-1 rounded bg-dark" placeholder="Search Actor" id="search">
                @if (Auth::user() && Auth::user()->role == 'admin')
                <a href="{{ route('admin.actor.create') }}" class="btn btn-sm btn-danger">Add Actor</a>
                @endif
            </div>
        </div>
        <div class="row justify-content-center my-3" id="actor-show">
            @foreach ($actors as $a)
            <div class="col-lg-2 col-md-4 col-6 my-3" id="actor">
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
                url:"{{ route('actor.search') }}",
                data:{param:param},
                success:function(data){
                    $('div#actor').remove()
                    let count = data.length
                    if(count == 0){
                        newRowAdd = 
                            '<div class="col-12 text-center" id="actor">'+
                                '<h4>No Data Actor Found</h4>'+
                            '</div>';
                        $('#actor-show').append(newRowAdd);
                    }
                    for(i=0; i<count;i++){
                        let urlImg = ''
                        let url = '{{ route("actor.detail", ":id") }}';
                        url = url.replace(':id', data[i].id);
                        urlImg = '<a href="'+url+'" class="text-decoration-none">';
                        newRowAdd = 
                            '<div class="col-lg-2 col-md-4 col-6 my-3" id="actor">'+
                                '<div class="card bg-dark border-0 p-2">'+
                                    urlImg+
                                    '<img src="{{ asset("storage") }}/'+data[i].image_url+'" class="card-img-top pt-1" alt="'+data[i].name+'" style="max-height: 200px; object-fit: cover;">'+
                                        '<div class="px-1">'+
                                            '<p class="card-title text-truncate mt-2">'+data[i].name+'</p>'+
                                        '</div>'+
                                    '</a>'+
                                '</div>'+
                            '</div>';
                        $('#actor-show').append(newRowAdd);
                    }
                }
            });
        }
    })
</script>
@endpush