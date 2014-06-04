<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title or 'Laracroft' }}</title>
    {{-- <meta name="description" content=""> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('head_assets')
        {{ HTML::script('assets/js/modernizr.min.js') }}
        {{ HTML::style('assets/css/style.min.css') }}
    @show
</head>
<body>

@yield('body')

@section('bottom_assets')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="{{ asset('/assets/js/jquery.min.js') }}"><\/script>')</script>
{{ HTML::script('assets/js/foundation.min.js') }}
<script>$(document).foundation();</script>
@show
</body>
</html>