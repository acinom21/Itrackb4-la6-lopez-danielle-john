<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Libsys Portal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

    <div class="container mt-4 mb-5">

        <h1 class="mb-1">Library Portal</h1>
        <p class="text-muted mb-3">Prepared by: Danielle John T. Lopez</p>

        @include('partials._nav')

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>