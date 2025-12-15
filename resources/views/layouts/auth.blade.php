<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login - PT.WANCARS')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/jpg">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=2') }}">

    @stack('styles')
</head>
<body>
    <main> 
        @yield('content')
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>