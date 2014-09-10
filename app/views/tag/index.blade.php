@extends('layouts.default')

@section('content')
<div class="row">
    <div class="ghost col-md-12 clearfix">
        <div class="page-header inverted">
            <h1>All Tags</h1>
        </div>

        @if ( isset($tags) && ! $tags->isEmpty() )
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tag</th>
                        @if(Auth::check())
                            <th>Actions</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr class="tags">
                            <td>{{ $tag->id }}</td>
                            <td><a href="{{ action('TagController@show', $tag->id) }}"><span class="btn btn-primary btn-sm"><i class="fa fa-tag fa-fw fa-lg"></i> {{ $tag->name }}</span></a></td>
                            @if(Auth::check())
                                <td class="actions">
                                    {{ Form::open(['action' => ['TagController@edit', $tag->id], 'method' => 'GET']) }}
                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary btn-sm']) }}
                                    {{ Form::close() }}

                                    {{ Form::open(['action' => ['TagController@destroy', $tag->id], 'method' => 'DELETE']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                                    {{ Form::close() }}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>There are no tag's at the moment!</p>
        @endif
    </div>
</div>
@stop