<nav>
    <ul>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            <a href="{{ route('oeuvres.index') }}">
                <button class="button">Oeuvres</button>
            </a>
        @else
            <li> Bonjour {{ Auth::user()->name }}</li>
            @if (Auth::user())
                <li><a href="#">Des liens spécifiques pour utilisateurs connectés..</a></li>
            @endif

            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.
          getElementById('logout-form').submit();">
                    Logout
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}"
                  method="POST" style="display: none;"> {{ csrf_field() }}
            </form>
        @endguest
    </ul>
</nav>
