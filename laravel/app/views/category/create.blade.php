@extends('layouts.topbar')

@section('content')
<h1>Create a new Category</h1>

{{ Form::open(['route' => 'category.store', 'method' => 'post']) }}
@include('partials.message')

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>Create Category</legend>
            <div class="row{{ $errors->has('name') ? ' error' : '' }}">
                <div class="medium-3 columns">
                    {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::text('name', null, ['placeholder' => 'Type in your Category name', 'maxlength' => '255']) }}
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