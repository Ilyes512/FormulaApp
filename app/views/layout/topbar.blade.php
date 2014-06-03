@extends('layout.base')

@section('body')

<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1><a href="#">Formula App</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- class="active" -->
        <ul class="left">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li class="has-dropdown">
                <a href="#">General</a>
                <ul class="dropdown">
                    <li><a href="{{ route('formula.index') }}">Show all formulas</a></li>
                    <li><a href="{{ route('category.index') }}">Show all categories</a></li>
                    <li><a href="{{ route('tag.index') }}">Show all tags</a></li>
                </ul>
            </li>
            <li class="has-dropdown">
                <a href="#">Add new</a>
                <ul class="dropdown">
                    <li><a href="{{ route('formula.create') }}">Formula</a></li>
                    <li><a href="{{ route('category.create') }}">Category</a></li>
                    <li><a href="{{ route('tag.create') }}">Tag</a></li>
                </ul>
            </li>
        </ul>
    </section>
</nav>

<div class="row">
    <div class="large-12 column">
        @yield('content')
    </div>
</div>

@stop
