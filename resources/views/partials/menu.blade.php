<nav class="navbar navbar-inverse navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{config('app.name')}}</a>
             <ul class="nav navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Accueil</a></li>
                <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Stage</a></li>
                <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Formation</a></li>
                <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Contact</a></li>
            </ul>
            @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> 
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right">
               <li><a href="{{route('login')}}">Login</a></li>
            </ul>
            @endif
    </div>
</nav>

