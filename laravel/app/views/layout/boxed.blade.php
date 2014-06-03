@extends('layout.base')

@section('head_assets')
{{-- foundation.css, modernizr.js --}}
@parent
@stop

@section('body')

<div class="row">
    <div class="large-12 column">
        @yield('content')
    </div>
</div>

@stop

@section('bottom_assets')
{{-- jQuery.js, foundation.js --}}
@parent
@stop