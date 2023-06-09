@extends('layouts.app', ['title' => 'My Watchlist'])
@push('css')
<style>
    .pagination {
        /* --bs-pagination-bg: #343a40 !important; */
        --bs-pagination-color: black !important;
        --bs-pagination-active-bg: #343a40 !important;
        /* --bs-pagination-active-color: black !important; */
        --bs-pagination-active-border-color: #dee2e6 !important;
    }
</style>
@endpush
@section('content')
<main id="content">
    <div class="container row mx-auto mt-4">
        <div class="d-flex align-items-center gap-2 mb-3">
            <i class="fa-solid fa-bookmark text-danger fs-3"></i>
            <h3>My <span class="text-danger">WatchList</span></h3>
        </div>
        <div class="input-group mb-4">
            <input type="text" class="form-control bg-dark border-0" placeholder="Search" aria-label="search"
                aria-describedby="buttonSearch" id="search">
            <button class="btn btn-dark" type="button" id="buttonSearch">
                <i class=" fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="d-flex align-items-center gap-2 col-2">
            <i class="fa-solid fa-filter text-white"></i>
            <select class="form-select bg-dark border-0" placeholder="Select filter" id="filter">
                <option value="All">All</option>
                <option value="Planned">Planned</option>
                <option value="Watching">Watching</option>
                <option value="Finished">Finished</option>
            </select>
        </div>
        <table class="table table-borderless border-primary mt-3">
            <thead>
                <tr class="align-middle text-center">
                    <th scope="col">Poster</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody id="watchlist-show">
                @forelse ($watchlists as $w)
                <tr class="align-middle text-center" id="watchlist">
                    <td>
                        <img src="{{ asset('storage/' . $w->movie->image_thumbnail) }}" alt="{{ $w->movie->title }}"
                            style="max-width: 100px;">
                    </td>
                    <td>{{ $w->movie->title }}</td>
                    <td class="text-success">{{ $w->status }}</td>
                    <td class="text-center">
                        <button type="button" class="btn bg-transparent text-white" id="editStatus"
                            value="{{ $w->id }}">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr id="watchlist">
                    <td colspan="4" class="text-center">No Data Watchlist Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div id="pagination-show">
            <div class="d-flex justify-content-center mt-2" id="pagination">
                {{ $watchlists->links() }}
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('member.watchlist.update') }}" id="main_form" class="form-horizontal"
                    method="POST">
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <select class="form-select bg-black border-0" name="status">
                            <option value="">Select Status</option>
                            <option value="Planned">Planned</option>
                            <option value="Watching">Watching</option>
                            <option value="Finished">Finished</option>
                            <option value="Remove">Remove</option>
                        </select>
                        <span class="text-danger error_text status_error"></span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger mx-1">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END -->
@endsection
@push('js')
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var Toast = Swal.mixin({
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

    $('#filter').on('change', function(){
        let param = $(this).val();
        $('#pagination-show').remove();
        $.ajax({
            type:'POST',
            url:"{{ route('member.watchlist.filter') }}",
            data:{param:param},
            success:function(data){
                $('tr#watchlist').remove()
                let count = data.data.length
                if(count == 0){
                    newRowAdd = '<tr id="watchlist"><td colspan="4" class="text-center">No Data Watchlist Found</td></tr>';
                    $('#watchlist-show').append(newRowAdd);
                }
                for(i=0; i<count;i++){
                    newRowAdd = '<tr class="align-middle text-center" id="watchlist">'+
                            '<td>'+
                                '<img src="{{ asset("storage") }}/'+data.data[i].movie.image_thumbnail+'" alt="'+data.data[i].movie.title+'" style="max-width: 100px;">'+
                            '</td>'+
                            '<td>'+data.data[i].movie.title+'</td>'+
                            '<td class="text-success">'+data.data[i].status+'</td>'+
                            '<td class="text-center">'+
                                '<button type="button" class="btn bg-transparent text-white" id="editStatus" value="'+data.data[i].id+'">'+
                                    '<i class="fa-solid fa-ellipsis"></i>'+
                                '</button>'+
                            '</td>'+
                        '</tr>';
                    $('#watchlist-show').append(newRowAdd);
                }
                newRowPag = '<div class="d-flex justify-content-center mt-2" id="pagination">'+
                                '{{'+data.links+'}}'+
                            '</div>';
                $('#pagination-show').append(newRowPag);
            }
        });
    })

    $('#buttonSearch').click(function(){
        let param = $('#search').val();
        $('#pagination-show').remove();
        $.ajax({
            type:'POST',
            url:"{{ route('member.watchlist.search') }}",
            data:{param:param},
            success:function(data){
                $('tr#watchlist').remove()
                let count = data.data.length
                if(count == 0){
                    newRowAdd = '<tr id="watchlist"><td colspan="4" class="text-center">No Data Watchlist Found</td></tr>';
                    $('#watchlist-show').append(newRowAdd);
                }
                for(i=0; i<count;i++){
                    newRowAdd = '<tr class="align-middle text-center" id="watchlist">'+
                            '<td>'+
                                '<img src="{{ asset("storage") }}/'+data.data[i].movie.image_thumbnail+'" alt="'+data.data[i].movie.title+'" style="max-width: 100px;">'+
                            '</td>'+
                            '<td>'+data.data[i].movie.title+'</td>'+
                            '<td class="text-success">'+data.data[i].status+'</td>'+
                            '<td class="text-center">'+
                                '<button type="button" class="btn bg-transparent text-white" id="editStatus" value="'+data.data[i].id+'">'+
                                    '<i class="fa-solid fa-ellipsis"></i>'+
                                '</button>'+
                            '</td>'+
                        '</tr>';
                    $('#watchlist-show').append(newRowAdd);
                }
                newRowPag = '<div class="d-flex justify-content-center mt-2" id="pagination">'+
                                '{{'+data.links+'}}'+
                            '</div>';
                $('#pagination-show').append(newRowPag);
            }
        });
    })

    $('body').on('click', '#editStatus', function() {
        let id = $(this).val();
        $('#modal').modal('show');
        $('#id').val(id);
    });

    $('#main_form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
                $(document).find('span.error_text').text('')
            },
            success:function(data){
                if(data.status == 0){
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }else{
                    $('#main_form').trigger("reset");;
                    $('#modal').modal('hide');
                    Toast.fire({
                        icon: 'success',
                        title: data.success
                    });
                    setInterval(() => {
                        location.reload()
                    }, 3000);
                }
            }
        })
    })
</script>
@endpush