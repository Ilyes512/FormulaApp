@extends('layouts.default')

@section('content')
<div class="row">
    <div class="ghost col-md-12 clearfix">

        <div class="page-header inverted">
            <h1>{{ $heading or 'All formulas' }}</h1>
        </div>

        @include('partials.message')

        @if(isset($formulas) && ! $formulas->isEmpty())
            <div class="table-responsive">
                <table class="table table-striped">
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
                            <td>{{ link_to_action('FormulaController@show', $formula->name, $formula->id) }}</td>
                            <td>{{ link_to_action('CategoryController@show', $formula->category->name, $formula->category->id) }}</td>
                            <td class="tags">
                            @foreach($formula->tags as $tag)
                                <a href="{{ action('TagController@show', $tag->id) }}"><span class="btn btn-primary btn-sm"><i class="fa fa-tag fa-fw fa-lg"></i> {{ $tag->name }}</span></a>
                            @endforeach
                            </td>
                            @if(Auth::check())
                                <td class="actions">
                                    {{ Form::open(['action' => ['FormulaController@edit', $formula->id], 'method' => 'GET']) }}
                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary btn-sm']) }}
                                    {{ Form::close() }}

                                    {{ Form::open(['action' => ['FormulaController@destroy', $formula->id], 'method' => 'DELETE']) }}
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
            <p>There are no formula's at the moment!</p>
        @endif
    </div>
</div>
@stop