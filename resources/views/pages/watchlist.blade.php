@extends('layouts.app', ['title' => 'My Watchlist'])
@section('content')
<main id="content">
    <div class="container row mx-auto mt-4">
        <div class="d-flex align-items-center gap-2 mb-3">
            <i class="fa-solid fa-bookmark text-danger fs-3"></i>
            <h3>My <span class="text-danger">WatchList</span></h3>
        </div>
        <div class="input-group mb-4">
            <input type="search" class="form-control bg-dark border-0" placeholder="Search" aria-label="search"
                aria-describedby="button-addon2">
            <button class="btn btn-dark" type="button" id="button-addon2">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <div class="d-flex align-items-center gap-2 col-2">
            <i class="fa-solid fa-filter text-white"></i>
            <select class="form-select bg-dark border-0" placeholder="Select gender">
                <option selected>All</option>
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
            <tbody>
                @forelse ($watchlists as $w)
                <tr class="align-middle text-center">
                    <td>
                        <img src="{{ asset('storage/' . $w->movie->image_thumbnail) }}" alt="{{ $w->movie->title }}"
                            style="max-width: 100px;">
                    </td>
                    <td>{{ $w->movie->title }}</td>
                    <td class="text-success">{{ $w->status }}</td>
                    <td class="text-center">
                        <button type="button" class="btn bg-transparent text-white" data-bs-toggle="modal"
                            data-bs-target="#profileModal">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <td colspan="4" class="text-center">No Data Watchlist Found</td>
                @endforelse
            </tbody>
        </table>
        {{ $watchlists->links() }}
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Change Status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <select class="form-select bg-black border-0" placeholder="Select gender">
                        <option selected>All</option>
                        <option value="Planned">Planned</option>
                        <option value="Watching">Watching</option>
                        <option value="Finished">Finished</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- END -->
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

    @if(session('success'))
        Toast.fire({
        icon: 'success',
        title: '{!! session('success') !!}'
        });
    @endif
</script>
@endpush