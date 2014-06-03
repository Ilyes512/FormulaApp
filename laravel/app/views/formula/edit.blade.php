@extends('layout.topbar')

@section('content')
<h1>Edit the "{{ $formula->name }}"-formula</h1>

@include('partial.message')

{{ Form::open(['route' => ['formula.update', $formula->id], 'method' => 'put']) }}

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>Create Formula</legend>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::text('name', $formula->name, ['placeholder' => 'Type in your Formula name']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('category', 'Category: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::select('category', Category::lists('name', 'id'), $formula->category_id, ['class' => 'chosen-select']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('formula', 'Formula: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::textarea('formula', $formula->formula, ['placeholder' => 'Type in your Formula']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('info', 'Info: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::textarea('info', $formula->info, ['placeholder' => 'Type in your Formula Info']) }}
                </div>
            </div>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('tags', 'Tags: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::select('tags[]', Tag::lists('name', 'id'), $formula->tags->lists('id'), ['class' => 'chosen-select', 'multiple', 'size' => '3', 'data-placeholder' => 'Choose your Tags...']) }}
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
