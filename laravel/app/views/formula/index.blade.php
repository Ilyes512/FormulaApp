@extends('layout.topbar')

@section('content')
<h1>{{ $heading or 'All formulas' }}</h1>

@include('partial.message')

@if ( isset($formulas) && ! $formulas->isEmpty() )
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($formulas as $formula)
            <tr>
                <td>{{ $formula->id }}</td>
                <td>{{ HTML::link(action('FormulaController@show', $formula->id) , $formula->name) }}</td>
                <td>{{ HTML::link(route('category.show', $formula->category->id), $formula->category->name) }}</td>
                <td>
                @foreach( $formula->tags as $tag )
                    <a href="{{ route('tag.show', $tag->id) }}"><span class="label">{{ $tag->name }}</span></a>
                @endforeach
                </td>
                <td class="actions">
                    {{ Form::open(['route' => ['formula.edit', $formula->id], 'method' => 'GET']) }}
                    {{ Form::submit('Edit', ['class' => 'button tiny']) }}
                    {{ Form::close() }}

                    {{ Form::open(['route' => ['formula.destroy', $formula->id], 'method' => 'DELETE']) }}
                    {{ Form::token() }}
                    {{ Form::submit('Delete', ['class' => 'button tiny alert']) }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>There are no formula's at the moment!</p>
@endif

@stop