@extends('layouts.default')

@section('js_head')
@parent
{{ HTML::script('//cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML') }}
@stop

@section('content')

<div class="row">
    <div class="ghost col-md-12">
        <div class="row">
            <div class="col-md-9">
                <div class="page-header inverted">
                    <h1>{{ $formula->name }}</h1>
                </div>

                <ol class="ghost breadcrumb">
                    <li><a href="{{ route('category.index') }}">All Formulas</a></li>
                    <li><a href="{{ route('category.show', $formula->category->id) }}">{{ $formula->category->name }}</a></li>
                    <li class="active">{{ $formula->name }}</li>
                </ol>
            </div>
            <div class="col-md-9">
                <div class="ghost panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formula:</h3>
                    </div>
                    <div class="panel-body">
                        \[{{ $formula->formula }}\]
                    </div>
                </div>

                @if(strlen(trim($formula->info)) > 0)
                <div class="ghost panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Info:</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                            {{ $formula->info }}
                        </p>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-3">
                @if($formula->tags->count() > 0)
                    <div class="ghost panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tags:</h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                @foreach($formula->tags as $tag)
                                <a href="{{ route('tag.show', $tag->id) }}"><span class="btn btn-primary">{{ $tag->name }}</span></a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endif
                @if(Auth::check())
                    <div class="ghost panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Actions:</h3>
                        </div>
                        <div class="panel-body actions">
                            {{ Form::open(['action' => ['FormulaController@edit', $formula->id], 'method' => 'GET']) }}
                            {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                            {{ Form::close() }}

                            {{ Form::open(['action' => ['FormulaController@destroy', $formula->id], 'method' => 'DELETE']) }}
                            {{ Form::token() }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@stop