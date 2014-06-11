@extends('layout.base')

@section('body')

<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1><a href="{{ route('index') }}">Formula App</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- class="active" -->
        <ul class="left">
            <li><a href="{{ route('index') }}"><i class="fa fa-home fa-fw fa-lg"></i> Home</a></li>
            <li class="has-dropdown">
                <a href="#"><i class="fa fa-book fa-fw fa-lg"></i> General</a>
                <ul class="dropdown">
                    <li><a href="{{ route('formula.index') }}">Show all formulas</a></li>
                    <li><a href="{{ route('category.index') }}">Show all categories</a></li>
                    <li><a href="{{ route('tag.index') }}">Show all tags</a></li>
                </ul>
            </li>
            @if(Auth::check())
                <li class="has-dropdown">
                    <a href="#"><i class="fa fa-plus fa-fw fa-lg"></i> Add new</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('formula.create') }}">Formula</a></li>
                        <li><a href="{{ route('category.create') }}">Category</a></li>
                        <li><a href="{{ route('tag.create') }}">Tag</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <ul class="right">
            <li><a href="https://github.com/Ilyes512/FormulaApp"><i class="fa fa-github fa-fw fa-lg"></i> Github</a></li>
            @if(Auth::check())
                <li><a href="{{ route('logout') }}"><i class="fa fa-user fa-fw fa-lg"></i> Logout {{ Auth::user()->username }}</a></li>
            @else
                <li><a href="{{ route('login') }}"><i class="fa fa-user fa-fw fa-lg"></i> Login</a></li>
            @endif
        </ul>
    </section>
</nav>

<div class="row">
    <div class="large-12 column">
        @yield('content')
    </div>
</div>

@stop
