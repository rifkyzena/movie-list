@extends('layouts.app', ['title' => 'Create Actor'])
@section('content')
<main class="flex flex-column" id="content">
    <div class="container py-5">
        <h4>Add Movie</h4>
        <form class="col-12" method="" id="login">
            <div class="mb-3">
                <label for="name" class="col-2 col-form-label">Name</label>
                <input type="text" class="form-control bg-dark border-0" id="name">
            </div>
            <div class="mb-3">
                <label for="title" class="col-2 col-form-label">Gender</label>
                <select class="form-select bg-dark border-0" placeholder="Select gender">
                    <option selected>Select gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="biography" class="col-2 col-form-label">Biography</label>
                <textarea class="form-control bg-dark border-0" rows="7" id="biography"></textarea>
            </div>
            <div class="mb-3">
                <label for="birth" class="col-2 col-form-label">Date of birth</label>
                <input type="date" class="form-control bg-dark border-0" id="birth">
            </div>
            <div class="mb-3">
                <label for="place" class="col-2 col-form-label">Place of birth</label>
                <input type="text" class="form-control bg-dark border-0" id="place">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Image List</label>
                <input class="form-control bg-dark border-0" type="file" id="formFile">
            </div>
            <div class="mb-3">
                <label for="popularity" class="col-2 col-form-label">Popularity</label>
                <input type="text" class="form-control bg-dark border-0" id="popularity">
            </div>
            <button type="submit" class="btn btn-danger w-100 mt-3 py-2">
                Create
            </button>
        </form>
    </div>
</main>
@endsection