@extends('layout.topbar')

@section('content')
<h1>Edit the "{{ $tag->name }}"-tag</h1>

@include('partial.message')

{{ Form::open(['route' => ['tag.update', $tag->id], 'method' => 'put']) }}

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>Create Tag</legend>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::text('name', $tag->name, ['placeholder' => 'Type in your Tag name']) }}
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