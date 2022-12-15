<nav>

    <ul>

        @guest
            <a href='/' class="logo">
                
            <img src="{{asset('/images/logo.PNG')}}">
            </a>
            <li><a href="{{ route('apropos') }}">À propos</a></li>
            <li><a href="{{ route('login') }}">Connecte-toi</a></li>
            <li><a href="{{ route('register') }}">Inscris-toi</a></li>
        @else
            <a href='/' class="logo">
            <img src="{{asset('/images/logo.PNG')}}">
            </a>
            <li><a href="{{ route('apropos') }}">À propos</a></li>
            <li><a href="{{route('users.show',Auth::user()->id)}}">Profil</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.
          getElementById('logout-form').submit();">
                    Se déconnecter
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}"
                  method="POST" style="display: none;"> {{ csrf_field() }}
            </form>
        @endguest
    </ul>
</nav>
