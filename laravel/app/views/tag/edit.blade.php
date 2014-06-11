@extends('layouts.topbar')

@section('content')
<h1>Edit the "{{ $tag->name }}"-tag</h1>

@include('partials.message')

<div class="row">
    <div class="medium-8 columns">
        {{ Form::open(['route' => ['tag.update', $tag->id], 'method' => 'put']) }}
            <fieldset>
                <legend>Create Tag</legend>
                <div class="row{{ $errors->has('name') ? ' error' : '' }}">
                    <div class="medium-3 columns">
                        {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                    </div>
                    <div class="medium-9 columns">
                        {{ Form::text('name', $tag->name, ['placeholder' => 'Type in your Tag name', 'maxlength' => '255']) }}
                        {{ $errors->first('name', '<small class="error">:message</small>') }}
                    </div>
                </div>
                <div class="row">
                    <div class="medium-12 columns">
                        <hr>
                        {{ Form::submit('Edit', ['class' => 'button right']) }}
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
</div>

@stop