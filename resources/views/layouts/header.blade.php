<nav>
    
    <ul>
        
        @guest
            <a href='/' class="logo">
            <img src="/storage/images/images/logo.PNG">
            </a>
            <li><a href="{{ route('login') }}">Connecte-toi</a></li>
            <li><a href="{{ route('register') }}">Inscris-toi</a></li>
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
