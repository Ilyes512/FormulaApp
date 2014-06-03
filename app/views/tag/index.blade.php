@extends('layout.topbar')

@section('content')
<h1>All Tags</h1>

@include('partial.message')

@if ( isset($tags) && ! $tags->isEmpty() )
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Tag</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td><a href="{{ route('tag.show', $tag->id) }}"><span class="label">{{ $tag->name }}</span></a></td>
                <td class="actions">
                    {{ Form::open(['route' => ['tag.edit', $tag->id], 'method' => 'GET']) }}
                    {{ Form::submit('Edit', ['class' => 'button tiny']) }}
                    {{ Form::close() }}

                    {{ Form::open(['route' => ['tag.destroy', $tag->id], 'method' => 'DELETE']) }}
                    {{ Form::token() }}
                    {{ Form::submit('Delete', ['class' => 'button tiny alert']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>There are no tag's at the moment!</p>
@endif

@stop