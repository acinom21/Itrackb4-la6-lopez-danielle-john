@extends('layouts.app')

@section('title', 'Add a Book')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="mb-0">Add a Book</h1>
    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">
        ← Back to List
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" id="author"
                       class="form-control @error('author') is-invalid @enderror"
                       value="{{ old('author') }}">
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" name="year" id="year"
                       class="form-control @error('year') is-invalid @enderror"
                       value="{{ old('year') }}">
                @error('year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="genre" class="form-label">Genre</label>
                <select name="genre" id="genre"
                        class="form-select @error('genre') is-invalid @enderror">
                    <option value="">-- Select Genre --</option>
                    <option value="Classical" @selected(old('genre') == 'Classical')>Classical</option>
                    <option value="Mystery" @selected(old('genre') == 'Mystery')>Mystery</option>
                    <option value="Historical" @selected(old('genre') == 'Historical')>Historical</option>
                </select>
                @error('genre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Book</button>
        </form>
    </div>
</div>

@endsection