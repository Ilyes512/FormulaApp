@extends('layouts.topbar')

@section('content')
<h1>All categories</h1>

@include('partials.message')

@if ( isset($categories) && ! $categories->isEmpty() )
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Category</th>
            @if(Auth::check())
                <th>Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ HTML::link( route('category.show', $category->id), $category->name) }}</td>
                @if(Auth::check())
                    <td class="actions">
                        {{ Form::open(['route' => ['category.edit', $category->id], 'method' => 'GET']) }}
                        {{ Form::submit('Edit', ['class' => 'inline button tiny']) }}
                        {{ Form::close() }}

                        @if ( $category->id != 1 )
                            {{ Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE']) }}
                            {{ Form::token() }}
                            {{ Form::submit('Destroy', ['class' => 'inline button tiny alert']) }}
                            {{ Form::close() }}
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>There are no categories at the moment!</p>
@endif

@stop