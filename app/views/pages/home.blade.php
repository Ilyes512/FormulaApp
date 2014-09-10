@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ghost jumbotron">
            <h1>Welcome to FormulaApp!</h1>
            <p>
                This is an Laravel app you can use to store any and all formulas using TeX. The formulas will be generated by <a href="http://www.mathjax.org/">MathJax</a>, an open source JavaScript display engine for mathematics, that will show the formula in either of the fallowing formats:
            </p>
            <ul>
                <li>MathML</li>
                <li>HTML-CSS</li>
                <li>SVG</li>
            </ul>
            <p>{{ link_to_route('register_path', 'Sign Up', null, ['class' => 'btn btn-lg btn-primary']) }}</p>
        </div>
    </div>
</div>
@endsection