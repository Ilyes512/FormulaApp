@extends('layout.topbar')

@section('content')
<h1>Create a new Tag</h1>

@include('partial.message')

{{ Form::open(['route' => 'tag.store', 'method' => 'post']) }}

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>Create Tag</legend>
            <div class="row{{ $errors->has('name') ? ' error' : '' }}">
                <div class="medium-3 columns">
                    {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::text('name', null, ['placeholder' => 'Type in your Tag name', 'maxlength' => '255']) }}
                    {{ $errors->first('name', '<small class="error">:message</small>') }}
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