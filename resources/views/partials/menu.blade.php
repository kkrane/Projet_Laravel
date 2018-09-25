

<nav class="navbar navbar-inverse navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
         <ul class="nav navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Accueil</a></li>
            <li class="nav-item active"><a class="nav-link" href="{{url('/stage')}}">Stage</a></li>
            <li class="nav-item active"><a class="nav-link" href="{{url('/formation')}}">Formation</a></li>
            <li class="nav-item active"><a class="nav-link" href="{{url('/contact')}}">Contact</a></li>
        </ul>
        <form action="{{route('search')}}" method="GET" style="margin-right: 10px;" class="form-inline my-2 my-lg-0" enctype="multipart/form-data">
            {{csrf_field ()}}
          <input class="form-control mr-sm-2" name="search" type="search" placeholder="Recherche" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
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
        @endif
    </div>
</nav>

