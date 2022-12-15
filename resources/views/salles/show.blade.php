@extends('layouts.appShow')

@section('title', 'Une salle')

@section('content')


        @guest
            header("{{route('login')}}");
        @else
        @endguest


<div class="back">
    <a href="{{route('salles.index')}}"><i class='bx bx-left-arrow-circle' ></i></a>
</div>


<div class='content'>
    <div class="oeuvres">
       
        @if($salle->id==1)
        <img src="{{asset('/images/arretpixel.png')}}" />
        @elseif($salle->id==2)
        <img src="{{asset('/images/arretia.png')}}" />
        @elseif($salle->id==3)
        <img src="{{asset('/images/3D.png')}}" />
        @elseif($salle->id==4)
        <img src="{{asset('/images/arretflat.png')}}" />
        @elseif($salle->id==5)
        <img src="{{asset('/images/arret.png')}}" />
        @endif

        <div class='grid'>
            <div class='grid1'>
                <form class="valider" action="{{route('salles.show',$salle->id)}}" method="get">


        @guest
        <a href="{{route('login')}}">Connectez vous pour ajouter une oeuvre</a>
        @else
        <a href="{{route('oeuvres.create')}}">Créer une oeuvre</a>
        @endguest

                





                    <select class="selectvalider" name="cat">
                        @foreach($categoriesOeuvres as $categorie)
                            <option value="{{$categorie}}" @if($cat == $categorie) selected @endif>{{$categorie}}</option>
                        @endforeach
                    </select>
                    <input class="inputvalider" type="submit" value="OK">
                </form>
                @foreach($oeuvres as $oeuvre)
                    <div class='oeuvre'>
                        <img src="{{asset("/storage/".$oeuvre->media_url)}}">
                        <h1> {{$oeuvre['nom']}} </h1>
                         {{$oeuvre['auteur']}}
                        <div><p class="descriptionoeuvre">{{$oeuvre['description']}}</p></div>

                        <p>{{$oeuvre['date_creation']}} </p>
                        <div class="showurls">
                        <a class="show" href="{{route('oeuvres.show',$oeuvre->id)}}">Voir oeuvre</a>
                        </div>
                        @if ($salle->id==5 and $oeuvre->valide==false and Auth::user()->admin==true)
                            <form action="{{route('approuveoeuvre', $oeuvre->id)}}" method="post">
                                @csrf
                                <p>Approuver cette oeuvre </p>
                                <input type="submit" value="approuver"/>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
                <div class="retour">
                    
                @if($salle->id==5)
                    <a href="{{route('salles.index')}}">
                    <p class="button is-info">Terminus<i class='bx bx-right-arrow-circle' ></i></p>
                    </a>
                        @else
                        <a href="{{route('salles.show',$salle->id+1)}}">
                        <p class="button is-info">Arrêt suivant<i class='bx bx-right-arrow-circle' ></i></p>
                        </a>

            

                @endif
                </div>
    </div>
<script>
    const scrollContainer = document.querySelector(".oeuvres");

scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    scrollContainer.scrollLeft += evt.deltaY;
});
</script>

@endsection
