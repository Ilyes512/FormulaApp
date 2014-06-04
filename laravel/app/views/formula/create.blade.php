@extends('layout.topbar')

@section('head_assets')
@parent
{{-- HTML::style('assets/css/chosen.min.css') --}}
@stop

@section('content')
<h1>Create a new Formula</h1>

@include('partial.message')

{{ Form::open(['route' => 'formula.store', 'method' => 'post']) }}

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>Create Formula</legend>
            <div class="row{{ $errors->has('name') ? ' error' : '' }}">
                <div class="medium-3 columns">
                    {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::text('name', null, ['placeholder' => 'Type in your Formula name', 'maxlength' => '255']) }}
                    {{ $errors->first('name', '<small class="error">:message</small>') }}
                </div>
            </div>
            <div class="row{{ $errors->has('category') ? ' error' : '' }}">
                <div class="medium-3 columns">
                    {{ Form::label('category', 'Category: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::select('category', Category::lists('name', 'id'), 1, ['class' => 'chosen-select']) }}
                    {{ $errors->first('category', '<small class="error">:message</small>') }}
                </div>
            </div>
            <div class="row{{ $errors->has('formula') ? ' error' : '' }}">
                <div class="medium-3 columns">
                    {{ Form::label('formula', 'Formula: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::textarea('formula', null, ['placeholder' => 'Type in your Formula', 'maxlength' => '21844']) }}
                    {{ $errors->first('formula', '<small class="error">:message</small>') }}
                </div>
            </div>
            <div class="row{{ $errors->has('info') ? ' error' : '' }}">
                <div class="medium-3 columns">
                    {{ Form::label('info', 'Info: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::textarea('info', null, ['placeholder' => 'Type in your Formula Info', 'maxlength' => '21844']) }}
                    {{ $errors->first('info', '<small class="error">:message</small>') }}
                </div>
            </div>
            <div class="row{{ $errors->has('tags') ? ' error' : '' }}">
                <div class="medium-3 columns">
                    {{ Form::label('tags', 'Tags: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::select('tags[]', Tag::lists('name', 'id'), null, ['class' => 'chosen-select', 'multiple', 'size' => '3', 'data-placeholder' => 'Choose your Tags...']) }}
                    {{ $errors->first('tags', '<small class="error">:message</small>') }}
                </div>
            </div>
            <div class="row">
                <div class="medium-12 columns">
                    <hr>
                    {{ Form::submit('Create', ['class' => 'button right']) }}
                </div>
            </div>
        </fieldset>
    </div>
</div>

{{ Form::close() }}

@stop

@section('bottom_assets')
@parent
{{ HTML::script('assets/js/chosen.jquery.min.js') }}
<script>$(".chosen-select").chosen({width: "100%", disable_search_threshold: 5, no_results_text: "Nothing found!"});</script>
@stop
