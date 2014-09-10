@extends('layouts.default')

@section('content')
<div class="row">
    <div class="ghost col-md-12 clearfix">
        <div class="page-header inverted">
            <h1>All categories</h1>
        </div>

        @include('partials.message')

        @if (isset($categories) && ! $categories->isEmpty())
            <div class="table-responsive">
                <table class="table table-striped">
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
                            <td>{{ link_to_action('CategoryController@show', $category->name, $category->id) }}</td>
                            @if(Auth::check())
                                <td class="actions">
                                    {{ Form::open(['action' => ['CategoryController@edit', $category->id], 'method' => 'GET']) }}
                                        {{ Form::submit('Edit', ['class' => 'btn btn-primary btn-sm']) }}
                                    {{ Form::close() }}

                                    @if($category->id != 1)
                                        {{ Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'DELETE']) }}
                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                                        {{ Form::close() }}
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>There are no categories at the moment!</p>
        @endif
    </div>
</div>
@stop