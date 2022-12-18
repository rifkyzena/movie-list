@extends('layouts.app', ['title' => 'Edit Movie'])
@push('css')
<style>
    .select2-search--dropdown {
        background-color: #0f172a;
    }

    .select2-search__field {
        background-color: #0f172a;
    }

    .select2-results {
        background-color: #0f172a;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: rgb(33, 37, 41);
        border-color: rgb(60, 63, 66);
    }

    .select2-container--default .select2-selection--multiple {
        background-color: rgb(33, 37, 41);
        border: none;
    }

    .select2-container--default .select2-results__option--selected {
        background-color: #ddd;
        color: black;
    }
</style>
@endpush
@section('content')
<main class="flex flex-column" id="content">
    <div class="container py-5">
        <h4>Edit Movie</h4>
        <form action="{{ route('admin.movie.update') }}" class="col-12" method="POST" id="login"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $movie->id }}">
            <div class="mb-3">
                <label for="title" class="col-2 col-form-label">Title</label>
                <input type="text" class="form-control @error('title')
                    is-invalid
                @enderror bg-dark border-0" id="title" name="title" value="{{ old('title', $movie->title) }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="desc" class="col-2 col-form-label">Description</label>
                <textarea class="form-control @error('description')
                    is-invalid
                @enderror bg-dark border-0" rows="7" id="description"
                    name="description">{{ old('description',$movie->description) }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="col-2 col-form-label">Genre</label>
                <select class="form-select @error('genre')
                    is-invalid
                @enderror border-0" placeholder="Select genre" name="genre[]" id="genre" multiple
                    style="background-color: black !important">
                    <option>Select Genre</option>
                    @foreach ($genres as $g)
                    <option value="{{ $g['name'] }}" @if(in_array($g['name'], json_decode($movie->genre)))
                        selected @endif>{{ $g['name'] }}</option>
                    @endforeach
                </select>
                @error('genre')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-4" id="actors">
                @php
                $character = json_decode($movie->character_name);
                @endphp
                @for ($i = 0; $i < $count; $i++) <div class="row">
                    <div class="col-6">
                        <label for="actor" class="col-form-label">Actor</label>
                        <select class="form-select @error('actor') is-invalid @enderror bg-dark border-0"
                            placeholder="Select actor" name="actor[]">
                            <option selected>Select Actor</option>
                            @foreach ($actors as $a)
                            <option value="{{ $a->name }}" @if(in_array($a['name'], json_decode($movie->actor)))
                                selected @endif>{{ $a->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('actor')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: #dc3545 !important">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="character_name" class="col-form-label">Character Name</label>
                        <input type="text"
                            class="form-control @error('character_name') is-invalid @enderror bg-dark border-0"
                            name="character_name[]" value="{{ $character[$i] }}">
                        @error('character_name')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: #dc3545 !important">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            @endfor
            <div id="moreActor"></div>
            <button type="button" class="btn btn-sm btn-primary mt-3" id="addMoreActor">Add more</button>
    </div>
    <div class="mb-3">
        <label for="directors" class="col-2 col-form-label">Directors</label>
        <input type="text" class="form-control @error('director')
                            is-invalid
                        @enderror bg-dark border-0" id="director" name="director"
            value="{{ old('director', $movie->director) }}">
        @error('director')
        <span class="invalid-feedback" role="alert">
            <strong style="color: #dc3545 !important">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="release" class="col-2 col-form-label">Release Date</label>
        <input type="date" class="form-control @error('release_date')
                            is-invalid
                        @enderror bg-dark border-0" id="release_date" name="release_date"
            value="{{ old('release_date', $movie->release_date) }}">
        @error('release_date')
        <span class="invalid-feedback" role="alert">
            <strong style="color: #dc3545 !important">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Image List</label>
        <input type="hidden" id="image_thumbnail_old" name="image_thumbnail_old" value="{{ $movie->image_thumbnail }}">
        <input class="form-control @error('image_thumbnail')
                            is-invalid
                        @enderror bg-dark border-0" type="file" id="image_thumbnail" name="image_thumbnail">
        @if ($movie->image_thumbnail)
        <span style="color: #dc3545 !important">
            Image data already exists, if you don't want to change the image just ignore it.
        </span>
        @endif
        @error('image_thumbnail')
        <span class="invalid-feedback" role="alert">
            <strong style="color: #dc3545 !important">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Backgroun Url</label>
        <input type="hidden" id="background_old" name="background_old" value="{{ $movie->background }}">
        <input class="form-control @error('background')
                            is-invalid
                        @enderror bg-dark border-0" type="file" id="background" name="background">
        @if ($movie->background)
        <span style="color: #dc3545 !important">
            Image data already exists, if you don't want to change the image just ignore it.
        </span>
        @endif
        @error('background')
        <span class="invalid-feedback" role="alert">
            <strong style="color: #dc3545 !important">{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="btn btn-danger w-100">
        Edit
    </button>
    </form>
    </div>
</main>
@endsection
@push('js')
<script>
    $("#addMoreActor").click(function() {
        newRowAdd =
            '<div class="row">' +
            '<div class="col-6">' +
            '<label for="actor" class="col-form-label">Actor</label>' +
            '<select class="form-select @error("actor") is-invalid @enderror bg-dark border-0" placeholder="Select actor" name="actor[]">' +
            '<option selected>Select Actor</option>' +
            '@foreach ($actors as $a)' +
            '<option value="{{ $a->name }}">{{ $a->name }}</option>' +
            '@endforeach' +
            '</select>' +
            '</div>' +
            '<div class="col-6">' +
            '<label for="character_name" class="col-form-label">Character Name</label>' +
            '<input type="text" class="form-control @error("character_name") is-invalid @enderror bg-dark border-0" name="character_name[]">' +
            '</div>' +
            '</div>'

        $('#moreActor').append(newRowAdd);

    });
    $('#genre').select2();

    // $("body").on("click", "#delActor", function () {
    //     $(this).parents("#row").remove();
    // })

    var Toast = Swal.mixin({
        toast: true, 
        position: 'top-end', 
        showConfirmButton: false, 
        timer: 3000, 
        timerProgressBar: true 
    });

    @if(session('error'))
    Toast.fire({
        icon: 'error', 
        title: '{!! session('error') !!}'
    });
    @endif
</script>
@endpush