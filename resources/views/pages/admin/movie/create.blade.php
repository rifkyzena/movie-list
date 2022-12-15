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
                @enderror bg-dark border-0" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="desc" class="col-2 col-form-label">Description</label>
                <textarea class="form-control @error('description')
                    is-invalid
                @enderror bg-dark border-0" rows="7" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="title" class="col-2 col-form-label">Genre</label>
                <select class="form-select @error('genre')
                    is-invalid
                @enderror bg-dark border-0" placeholder="Select genre">
                    <option selected>Select genre</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-4" id="actors">
                <div class="row">
                    <div class="col-6">
                        <label for="title" class="col-form-label">Actor</label>
                        <select class="form-select @error('actor')
                            is-invalid
                        @enderror bg-dark border-0" placeholder="Select genre">
                            <option selected>Select genre</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="title" class="col-form-label">Character Name</label>
                        <input type="text" class="form-control @error('character_name')
                            is-invalid
                        @enderror bg-dark border-0" id="title">
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-primary mt-3">Add more</button>
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