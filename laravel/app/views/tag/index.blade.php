@extends('layouts.topbar')

@section('content')
<h1>All Tags</h1>

@include('partials.message')

@if ( isset($tags) && ! $tags->isEmpty() )
    <table>
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
                <td><a href="{{ route('tag.show', $tag->id) }}"><span class="label"><i class="fa fa-tag fa-fw fa-lg"></i> {{ $tag->name }}</span></a></td>
                @if(Auth::check())
                    <td class="actions">
                        {{ Form::open(['route' => ['tag.edit', $tag->id], 'method' => 'GET']) }}
                        {{ Form::submit('Edit', ['class' => 'button tiny']) }}
                        {{ Form::close() }}

                        {{ Form::open(['route' => ['tag.destroy', $tag->id], 'method' => 'DELETE']) }}
                        {{ Form::token() }}
                        {{ Form::submit('Delete', ['class' => 'button tiny alert']) }}
                        {{ Form::close() }}
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>There are no tag's at the moment!</p>
@endif

@stop