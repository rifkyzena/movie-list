@extends('layouts.app', ['title' => 'Create Movie'])
@section('content')
<main class="flex flex-column" id="content">
    <div class="container py-5">
        <h4>Add Movie</h4>
        <form action="{{ route('admin.movie.create') }}" class="col-12" method="POST" id="login"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="col-2 col-form-label">Title</label>
                <input type="text" class="form-control @error('title')
                    is-invalid
                @enderror bg-dark border-0" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="desc" class="col-2 col-form-label">Description</label>
                <textarea class="form-control @error('description')
                    is-invalid
                @enderror bg-dark border-0" rows="7" id="description"
                    name="description">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="title" class="col-2 col-form-label">Genre</label>
                <select class="form-select @error('genre')
                    is-invalid
                @enderror border-0" placeholder="Select genre" name="genre[]" id="genre" multiple
                    style="background-color: black !important">
                    <option selected>Select Genre</option>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Animated">Animated</option>
                    <option value="Biography">Biography</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Crime">Crime</option>
                    <option value="Disaster">Disaster</option>
                    <option value="Drama">Drama</option>
                    <option value="Family">Family</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="History">History</option>
                    <option value="Horror">Horror</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Musical">Musical</option>
                    <option value="Romance">Romance</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Sport">Sport</option>
                    <option value="Thriller">Thriller</option>
                </select>
            </div>
            <div class="mb-4" id="actors">
                <div class="row">
                    <div class="col-6">
                        <label for="actor" class="col-form-label">Actor</label>
                        <select class="form-select @error('actor')
                            is-invalid
                        @enderror bg-dark border-0" placeholder="Select actor" name="actor[]">
                            <option selected>Select Actor</option>
                            @foreach ($actors as $a)
                            <option value="{{ $a->name }}">{{ $a->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="character_name" class="col-form-label">Character Name</label>
                        <input type="text" class="form-control @error('character_name')
                            is-invalid
                        @enderror bg-dark border-0" name="character_name[]">
                    </div>
                </div>
                <div id="moreActor"></div>
                <button type="button" class="btn btn-sm btn-primary mt-3" id="addMoreActor">Add more</button>
            </div>
            <div class="mb-3">
                <label for="directors" class="col-2 col-form-label">Directors</label>
                <input type="text" class="form-control @error('director')
                    is-invalid
                @enderror bg-dark border-0" id="director" name="director">
            </div>
            <div class="mb-3">
                <label for="release" class="col-2 col-form-label">Release Date</label>
                <input type="date" class="form-control @error('release_date')
                    is-invalid
                @enderror bg-dark border-0" id="release_date" name="release_date">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image List</label>
                <input class="form-control @error('image_thumbnail')
                    is-invalid
                @enderror bg-dark border-0" type="file" id="image_thumbnail" name="image_thumbnail">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Backgroun Url</label>
                <input class="form-control @error('background')
                    is-invalid
                @enderror bg-dark border-0" type="file" id="background" name="background">
            </div>
            <button type="submit" class="btn btn-danger w-100">
                Create
            </button>
        </form>
    </div>
</main>
@endsection
@push('js')
<script>
    $("#addMoreActor").click(function () {
        newRowAdd =
        '<div class="row">'+
            '<div class="col-6">'+
                '<label for="actor" class="col-form-label">Actor</label>'+
                '<select class="form-select @error("actor") is-invalid @enderror bg-dark border-0" placeholder="Select actor" name="actor[]">'+
                    '<option selected>Select Actor</option>'+
                    '@foreach ($actors as $a)'+
                    '<option value="{{ $a->name }}">{{ $a->name }}</option>'+
                    '@endforeach'+
                '</select>'+
            '</div>'+
            '<div class="col-6">'+
                '<label for="character_name" class="col-form-label">Character Name</label>'+
                '<input type="text" class="form-control @error("character_name") is-invalid @enderror bg-dark border-0" name="character_name[]">'+
            '</div>'+
        '</div>'

        $('#moreActor').append(newRowAdd);

    });
    $('#genre').select2();

    // $("body").on("click", "#delActor", function () {
    //     $(this).parents("#row").remove();
    // })
</script>
@endpush