@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {{ Form::open(['route' => 'login', 'class' => 'form-horizontal ghost panel panel-default', 'role' => 'form']) }}
            <fieldset class="panel-body">
                <legend>Sign up</legend>

                @include('layouts.partials.errors')

                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    {{ Form::label('username', 'Username', ['class' => 'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Fill in your Username', 'autofocus']) }}
                        {{ $errors->first('username', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {{ Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) }}
                    <div class="col-md-9">
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Fill in your Password']) }}
                        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        <div class="checkbox">
                            <label>
                                {{ Form::checkbox('remember', 1, null, ['id' => 'remember'])  }} Remember me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                        {{ Form::submit('Sign in', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </fieldset>
        {{ Form::close() }}
    </div>
</div>
@stop