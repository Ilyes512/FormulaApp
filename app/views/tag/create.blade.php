@extends('layouts.default')

@section('js_footer')
@parent
<script src="{{ asset('assets/js/selectize.min-0.11.0.js') }}"></script>
@stop

@section('content')
<div class="row">
    <div class="ghost col-md-offset-2 col-md-8 clearfix">
        <div class="page-header inverted">
            <h1>Create a new Tag</h1>
        </div>
        {{ Form::open(['action' => 'TagController@create', 'class' => 'ghost form-horizontal panel panel-default', 'role' => 'form']) }}
            <fieldset class="panel-body">
                <legend>Create Tag</legend>

                @include('layouts.partials.errors')

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) }}
                    <div class="col-md-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Type in your Tag name', 'maxlength' => '255', 'autofocus']) }}
                        {{ $errors->first('name', '<small class="help-block">:message</small>') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <hr>
                        {{ Form::submit('Create', ['class' => 'btn btn-primary btn-lg']) }}
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
</div>
@stop
