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
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::text('name', null, ['placeholder' => 'Type in your Formula name']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('category', 'Category: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::select('category', Category::lists('name', 'id'), 1, ['class' => 'chosen-select']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('formula', 'Formula: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::textarea('formula', null, ['placeholder' => 'Type in your Formula']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('info', 'Info: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::textarea('info', null, ['placeholder' => 'Type in your Formula Info']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('tags', 'Tags: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::select('tags[]', Tag::lists('name', 'id'), null, ['class' => 'chosen-select', 'multiple', 'size' => '3', 'data-placeholder' => 'Choose your Tags...']) }}
                    {{-- chosen-select --}}
                </div>
            </div>
            <div class="row">
                <div class="medium-12 columns">
                    <hr>
                    <input type="submit" class="button right" >
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
