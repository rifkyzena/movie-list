@extends('layouts.app', ['title' => 'Edit Actor'])
@section('content')
<main class="flex flex-column" id="content">
    <div class="container py-5">
        <h4>Edit Movie</h4>
        <form action="{{ route('admin.actor.update') }}" class="col-12" method="POST" id="login"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $actor->id }}">
            <div class="mb-3">
                <label for="name" class="col-2 col-form-label">Name</label>
                <input type="text" class="form-control @error('name')
                    is-invalid
                @enderror bg-dark border-0" id="name" name="name" value="{{ old('name', $actor->name) }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="col-2 col-form-label">Gender</label>
                <select class="form-select @error('gender')
                    is-invalid
                @enderror bg-dark border-0" placeholder="Select gender" name="gender">
                    <option value="">Select gender</option>
                    <option value="Male" {{ old('gender', $actor->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $actor->gender) == 'Female' ? 'selected' : '' }}>Female
                    </option>
                </select>
                @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="biography" class="col-2 col-form-label">Biography</label>
                <textarea class="form-control @error('biography')
                    is-invalid
                @enderror bg-dark border-0" rows="7" id="biography"
                    name="biography">{{ old('biography', $actor->biography) }}</textarea>
                @error('biography')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="col-2 col-form-label">Date of birth</label>
                <input type="date" class="form-control @error('date_of_birth')
                    is-invalid
                @enderror bg-dark border-0" id="date_of_birth" name="date_of_birth"
                    value="{{ old('date_of_birth', $actor->date_of_birth) }}">
                @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="place_of_birth" class="col-2 col-form-label">Place of birth</label>
                <input type="text" class="form-control @error('place_of_birth')
                    is-invalid
                @enderror bg-dark border-0" id="place_of_birth" name="place_of_birth"
                    value="{{ old('place_of_birth', $actor->place_of_birth) }}">
                @error('place_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image List</label>
                <input type="hidden" name="image_url_old" value="{{ $actor->image_url }}">
                <input class="form-control @error('image_url')
                    is-invalid
                @enderror bg-dark border-0" type="file" id="image_url" name="image_url">
                @if ($actor->image_url)
                <span style="color: #dc3545 !important">
                    Image data already exists, if you don't want to change the image just ignore it.
                </span>
                @endif
                @error('image_url')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="popularity" class="col-2 col-form-label">Popularity</label>
                <input type="number" class="form-control @error('popularity')
                    is-invalid
                @enderror bg-dark border-0" id="popularity" name="popularity"
                    value="{{ old('popularity', $actor->popularity) }}">
                @error('popularity')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: #dc3545 !important">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger w-100 mt-3 py-2">
                Edit
            </button>
        </form>
    </div>
</main>
@endsection