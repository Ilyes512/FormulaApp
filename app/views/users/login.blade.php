@extends('layouts.topbar')

@section('content')
<div class="row">
    <div class="medium-7 medium-centered columns">
        {{ Form::open(['route' => 'login']) }}
            <fieldset>
                <legend>Login</legend>
                @include('partials.message')
                <div class="row{{ $errors->has('username') ? ' error' : '' }}">
                    <div class="medium-3 columns">
                        {{ Form::label('username', 'Username: ', ['class' => 'small-only-text-left right inline']) }}
                    </div>
                    <div class="medium-9 columns">
                        {{ Form::text('username', null, ['class' => '', 'placeholder' => 'Fill in your Username']) }}
                        {{ $errors->first('username', '<small class="error">:message</small>') }}
                    </div>
                </div>
                <div class="row{{ $errors->has('password') ? ' error' : '' }}">
                    <div class="medium-3 columns">
                        {{ Form::label('password', 'Password: ', ['class' => 'small-only-text-left right inline']) }}
                    </div>
                    <div class="medium-9 columns">
                        {{ Form::password('password', ['class' => '', 'placeholder' => 'Fill in your Password']) }}
                        {{ $errors->first('password', '<small class="error">:message</small>') }}
                    </div>
                </div>
                <div class="row">
                    <div class="medium-offset-3 medium-9 columns">
                        {{ Form::checkbox('remember', 1, null, ['id' => 'remember']) }}
                        {{ Form::label('remember', 'Remember me!') }}
                    </div>
                </div>
                {{ Form::submit('Log in', ['class' => 'button right']) }}
            </fieldset>
        {{ Form::close() }}
    </div>
</div>
@stop