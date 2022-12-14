@extends('layouts.app')

    <!--Styles-->
    <link rel="stylesheet" href="/css/styles.css">

    <title>{{ config('app.name', 'Laravel') }}</title>
@section('title', 'La toile - Accueil')

@section('content')
    <h1>La toile</h1>

    <p id="description_exposition">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet diam eu leo blandit congue. Ut ut nulla vitae mi gravida scelerisque. Fusce eget orci aliquet, luctus dolor euismod, ultrices justo. Nullam bibendum hendrerit augue, non hendrerit justo pellentesque quis. Nunc non sem varius, ultricies augue sit amet, bibendum ligula.
    </p>

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
    <a href="{{route('salles.index')}}">Liste de salles</a>

    <a href="#">INTERVIEW</a>
@endsection
