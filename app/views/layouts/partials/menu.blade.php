<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">FormulaApp</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="mainmenu">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}"><i class="fa fa-home fa-fw fa-lg"></i> Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book fa-fw fa-lg"></i> General <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ route('formula.index') }}">Show all formulas</a></li>
                        <li><a href="{{ route('category.index') }}">Show all categories</a></li>
                        <li><a href="{{ route('tag.index') }}">Show all tags</a></li>
                    </ul>
                </li>
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus fa-fw fa-lg"></i> Add new <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('formula.create') }}">Formula</a></li>
                            <li><a href="{{ route('category.create') }}">Category</a></li>
                            <li><a href="{{ route('tag.create') }}">Tag</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="https://github.com/Ilyes512/FormulaApp"><i class="fa fa-github fa-fw fa-lg"></i> Github</a></li>
                @if(Auth::check())
                    <li><a href="{{ route('logout') }}"><i class="fa fa-user fa-fw fa-lg"></i> Logout {{ Auth::user()->username }}</a></li>
                @else
                    <li><a href="{{ route('login') }}"><i class="fa fa-user fa-fw fa-lg"></i> Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>