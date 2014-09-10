@extends('layouts.default')

@section('js_footer')
@parent
<script src="{{ asset('assets/js/selectize.min-0.11.0.js') }}"></script>
@stop

@section('content')
<div class="row">
    <div class="ghost col-md-offset-2 col-md-8 clearfix">
        <div class="page-header inverted">
            <h1>Edit the "{{ $formula->name }}"-formula</h1>
        </div>
        {{ Form::model($formula, ['action' => ['FormulaController@update', $formula->id], 'method' => 'put', 'class' => 'ghost form-horizontal panel panel-default', 'role' => 'form']) }}
            <fieldset class="panel-body">
                <legend>Create Formula</legend>

                @include('layouts.partials.errors')

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                   {{ Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Type in your Formula name', 'maxlength' => '255', 'autofocus']) }}
                        {{ $errors->first('name', '<small class="help-block">:message</small>') }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                    {{ Form::label('category_id', 'Category', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('category_id', Category::lists('name', 'id'), 1, ['class' => 'form-control selectize']) }}
                        {{ $errors->first('category_id', '<small class="help-block">:message</small>') }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('formula') ? ' has-error' : '' }}">
                    {{ Form::label('formula', 'Formula', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('formula', null, ['class' => 'form-control', 'placeholder' => 'Type in your Formula', 'maxlength' => '21844']) }}
                        {{ $errors->first('formula', '<small class="help-block">:message</small>') }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('info') ? ' has-error' : '' }}">
                    {{ Form::label('info', 'Info', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::textarea('info', null, ['class' => 'form-control', 'placeholder' => 'Type in your Formula Info', 'maxlength' => '21844']) }}
                        {{ $errors->first('info', '<small class="help-block">:message</small>') }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                    {{ Form::label('tags', 'Tags', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::select('tags[]', Tag::lists('name', 'id'), $formula->tags->lists('id'), ['class' => 'form-control selectize', 'multiple', 'size' => '3', 'data-placeholder' => 'Choose your Tags...']) }}
                        {{ $errors->first('tags', '<small class="help-block">:message</small>') }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-right">
                        <hr>
                        {{ Form::submit('Save formula', ['class' => 'btn btn-primary btn-lg']) }}
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
</div>
@stop
