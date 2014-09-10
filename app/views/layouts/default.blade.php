<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formula App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('css_head')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @show

    @section('js_head')
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    @show
</head>
<body>
    @include('layouts.partials.menu')
    <div class="container">
        @yield('content')
    </div>
    @section('js_footer')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('assets/js') }}/jquery-2.1.1.min.js"><\/script>')</script>
    <script src="{{ asset('assets/js/bootstrap-3.2.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    @show
</body>
</html>