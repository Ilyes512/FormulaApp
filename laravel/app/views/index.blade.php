@extends('layout.topbar')

@section('content')

<h1>Welcome to the Formula App</h1>
@include('partial.message')
<p>
    This is an Laravel app you can use to store any and all formulas using TeX. The formulas will be generated by <a href="http://www.mathjax.org/">MathJax</a>, an open source JavaScript display engine for mathematics, that will show the formula in either og the fallowing formats:
</p>
<ul>
    <li>MathML</li>
    <li>HTML-CSS</li>
    <li>SVG</li>
</ul>

@stop