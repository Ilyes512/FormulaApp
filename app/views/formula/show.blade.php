@extends('layouts.topbar')

@section('head_assets')
@parent
{{-- HTML::script(asset('/assets/js/Mathjax.min.js')) --}}
{{ HTML::script('//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML') }}
@stop

@section('content')

<div class="row">
    <medium-12 class="columns">
        <h1>{{ $formula->name }}</h1>

        @include('partials.message')

        <ul class="breadcrumbs">
            <li><a href="{{ route('category.index') }}">All Formulas</a></li>
            <li><a href="{{ route('category.show', $formula->category->id) }}">{{ $formula->category->name }}</a></li>
            <li class="current"><a href="#">{{ $formula->name }}</a></li>
        </ul>
    </medium-12>
    <div class="medium-9 columns">
        <h3>Formula:</h3>
        <div class="panel callout">
            \[{{ $formula->formula }}\]
        </div>
        @if(strlen(trim($formula->info)) > 0)
        <h3>Info:</h3>
        <div class="panel">
            <p>
                {{ $formula->info }}
            </p>
        </div>
        @endif
    </div>
    <div class="medium-3 columns">
        @if($formula->tags->count() > 0)
            <div>
                <h3>Tags:</h3>
                <p>
                    @foreach($formula->tags as $tag)
                    <a href="{{ route('tag.show', $tag->id) }}"><span class="label">{{ $tag->name }}</span></a>
                    @endforeach
                </p>
            </div>
        @endif
        @if(Auth::check())
            <div class="admin">
                <h3>Actions:</h3>
                {{ Form::open(['route' => ['formula.edit', $formula->id], 'method' => 'GET']) }}
                {{ Form::submit('Edit', ['class' => 'inline button tiny']) }}
                {{ Form::close() }}

                {{ Form::open(['route' => ['formula.destroy', $formula->id], 'method' => 'DELETE']) }}
                {{ Form::token() }}
                {{ Form::submit('Delete', ['class' => 'inline button tiny alert']) }}
                {{ Form::close() }}
            </div>
        @endif
    </div>
</div>

@stop