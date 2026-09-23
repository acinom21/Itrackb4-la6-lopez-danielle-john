<nav class="mb-3">
    {{-- D1/D2: routeIs() checks the current route NAME.
         D3: 'books.show' had to be added here — that's the pattern change that
             keeps this marked on a detail page like /books/3.
         D4: nothing else changed for this — routeIs('books.index') already
             matches /books?genre=Classical&year=1954 the same as /books,
             because a query string never affects which route matched. --}}
    @if (request()->routeIs('books.index') || request()->routeIs('books.show'))
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-primary">All Books</a>
    @else
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-secondary">All Books</a>
    @endif

    @if (request()->routeIs('books.feature'))
        <a href="{{ route('books.feature') }}" class="btn btn-sm btn-primary">Featured</a>
    @else
        <a href="{{ route('books.feature') }}" class="btn btn-sm btn-secondary">Featured</a>
    @endif
</nav>
