<nav>
    
    <ul>
        
        @guest
        <div class="logo">
            <img src="http://localhost:8000/storage/images/images/logo.PNG">
            </div>
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
