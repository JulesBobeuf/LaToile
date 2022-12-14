<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Styles-->
    <link rel="stylesheet" href="/css/styles.css">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div class="container">
    <nav>
        <ul>
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li> Bonjour {{ Auth::user()->name }}</li> @if (Auth::user())

                    <li><a href="#">Des liens spécifiques pour utilisateurs connectés..</a></li>
                @endif
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.
          getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}"
                      method="POST" style="display: none;"> {{ csrf_field() }}
                </form>
            @endguest  </ul>
    </nav>

    <!-- <div class="illustration">
        <img class="oeuvre" src="{{asset('storage/images/oeuvres/oeuvre-5.png')}}" alt="">
    </div> -->

    <div class="welcome">Bienvenue au musée virtuel !</div>


</div>


<div class="background">
    <div class="portes">
       <a class="porte" id="porte1" href="/salle1">
      <div  ></div>
      </a>

       <a class="portemilieu" id="porte2" href="/salle1">
      <div  ></div>
      </a>

       <a class="portemilieu" id="porte3" href="/salle1">
      <div  ></div>
      </a>

       <a class="porte" id="porte4" href="/salle1">
      <div ></div>
      </a>
    </div>
</div>


</div>
</div>

<!-- overlay -->
<div class="overlay"></div>

<div class="mentions">
  <a href="mentions">mentions légales</a>
</div>

</div>
</body>
</html>
