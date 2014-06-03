@extends('layout.topbar')

@section('content')
<h1>Edit the "{{ $category->name }}"-category</h1>

@include('partial.message')

{{ Form::open(['route' => ['category.update', $category->id], 'method' => 'put']) }}

<div class="row">
    <div class="medium-8 columns">
        <fieldset>
            <legend>Create Category</legend>
            <div class="row">
                <div class="medium-3 columns">
                    {{ Form::label('name', 'Name: ', ['class' => 'small-only-text-left text-right inline']) }}
                </div>
                <div class="medium-9 columns">
                    {{ Form::text('name', $category->name, ['placeholder' => 'Type in your Category name']) }}
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