@extends('layouts.app')

@section('title', 'Book Recommendations')

@section('content')

    <h2 class="mb-3">List of Recommendations</h2>

    {{-- B5: state which filters are currently active --}}
    <div class="mb-3">
        @if ($genre === '' && $year === '')
            <span class="badge bg-secondary">Showing all books</span>
        @else
            <span class="badge bg-primary">
                {{ $genre !== '' ? $genre : 'any genre' }},
                {{ $year !== '' ? "year {$year}" : 'any year' }}
            </span>
            {{-- B3: clear both filters at once --}}
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-secondary ms-2">Clear Filter</a>
        @endif
    </div>

    {{-- B1/B2/B4: every link passes BOTH current values via route()'s array
         argument, so switching one filter keeps the other one applied. --}}
    <div class="mb-2">
        <strong>Genre:</strong>
        <a href="{{ route('books.index', array_filter(['year' => $year])) }}" class="btn btn-sm btn-outline-primary">All</a>
        @foreach ($genres as $g)
            <a href="{{ route('books.index', array_filter(['genre' => $g, 'year' => $year])) }}"
               class="btn btn-sm btn-outline-primary">{{ $g }}</a>
        @endforeach
    </div>

    <div class="mb-3">
        <strong>Year:</strong>
        <a href="{{ route('books.index', array_filter(['genre' => $genre])) }}" class="btn btn-sm btn-outline-secondary">All</a>
        @foreach ($years as $y)
            <a href="{{ route('books.index', array_filter(['genre' => $genre, 'year' => $y])) }}"
               class="btn btn-sm btn-outline-secondary">{{ $y }}</a>
        @endforeach
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
                        <a href="{{ route('books.show', ['book' => $book['id']]) }}">
                            {{ $loop->iteration }}
                        </a>
                    </td>
                    <td>{{ $book['title'] }}</td>
                    <td>{{ $book['author'] }}</td>
                    <td>
                        {{ $book['year'] }}
                        @if ($book['year'] >= 2000)
                            <span class="badge bg-primary">Classic</span>
                        @else
                            <span class="badge bg-primary">Oldies</span>
                        @endif
                    </td>
                    <td>
                        {{-- B2: keeps the current year filter when jumping via the genre --}}
                        <a href="{{ route('books.index', array_filter(['genre' => $book['genre'], 'year' => $year])) }}">
                            {{ $book['genre'] }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No Books Available</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection
