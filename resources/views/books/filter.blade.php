@extends('layouts.app')

@section('title', 'Filtered Books')

@section('content')

    <h2 class="mb-3">Filtered Book List</h2>

    <div class="mb-3">
        @if($activeFilter)
            <span class="badge bg-primary">Showing: {{ $activeFilter }}</span>
            <a href="{{ route('books.filter') }}" class="btn btn-sm btn-outline-secondary ms-2">Clear Filter</a>
        @else
            <span class="badge bg-secondary">Showing all books</span>
        @endif
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        <a href="{{ route('books.show', $book['id']) }}">{{ $book['id'] }}</a>
                    </td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['author'] }}</td>
                    <td>{{ $book['year'] }}</td>
                    <td>{{ $book['genre'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No books match that filter.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to full list</a>

@endsection