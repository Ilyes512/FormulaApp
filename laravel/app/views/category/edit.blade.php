@extends('layouts.topbar')

@section('content')
<h1>Edit the "{{ $category->name }}"-category</h1>

@include('partials.message')

<div class="row">
    <div class="medium-8 columns">
        {{ Form::open(['route' => ['category.update', $category->id], 'method' => 'put']) }}
            <fieldset>
                <legend>Create Category</legend>
                <div class="row{{ $errors->has('name') ? ' error' : '' }}">
                    <div class="medium-3 columns">
                        {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                    </div>
                    <div class="medium-9 columns">
                        {{ Form::text('name', $category->name, ['placeholder' => 'Type in your Category name', 'maxlength' => '255']) }}
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