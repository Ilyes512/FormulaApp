@extends('layouts.topbar')

@section('content')
<h1>{{ $heading or 'All formulas' }}</h1>

@include('partials.message')

@if ( isset($formulas) && ! $formulas->isEmpty() )
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Tags</th>
            @if(Auth::check())
                <th>Actions</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($formulas as $formula)
            <tr>
                <td>{{ $formula->id }}</td>
                <td>{{ HTML::link(action('FormulaController@show', $formula->id) , $formula->name) }}</td>
                <td>{{ HTML::link(route('category.show', $formula->category->id), $formula->category->name) }}</td>
                <td class="tags">
                @foreach( $formula->tags as $tag )
                    <a href="{{ route('tag.show', $tag->id) }}"><span class="label"><i class="fa fa-tag fa-fw fa-lg"></i> {{ $tag->name }}</span></a>
                @endforeach
                </td>
                @if(Auth::check())
                    <td class="actions">
                        {{ Form::open(['route' => ['formula.edit', $formula->id], 'method' => 'GET']) }}
                        {{ Form::submit('Edit', ['class' => 'button tiny']) }}
                        {{ Form::close() }}

                        {{ Form::open(['route' => ['formula.destroy', $formula->id], 'method' => 'DELETE']) }}
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
    <p>There are no formula's at the moment!</p>
@endif

@stop