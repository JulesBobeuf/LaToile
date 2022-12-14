@extends('layouts.app')

@section('title', 'Une salle')

@section('content')

    <div class="text-center" style="margin-top: 2rem">
        @if($action == 'delete')
            <h3 class="title is-3 is-uppercase has-text-danger has-text-centered">Suppression d'une salle</h3>
        @else
            <h3 class="title is-3 has-text-centered">Affichage d'une salle</h3>
        @endif
        <hr>
    </div>

    <div>
        {{-- Le nom de la salle --}}
        <p><strong>Nom : </strong>{{$salle->nom}}</p>
    </div>
    <div>
        {{-- le theme de la salle --}}
        <p><strong>Theme : </strong>{{$salle->theme}}</p>
    </div>
    <div>
        {{-- la Description de la salle --}}
        <p><strong>Description : </strong>{{$salle->description}} / 5</p>
    </div>
    @foreach($oeuvres as $oeuvre)
        <li> Nom : {{$oeuvre['nom']}} <br> media_url : {{$oeuvre['media_url']}} <br> thumbnail_url : {{$oeuvre['thumbnail_url']}} <br> description : {{$oeuvre['description']}}
            <br> coord_x : {{$oeuvre['coord_x']}} <br> coord_y : {{$oeuvre['coord_y']}} <br> salle_id : {{$oeuvre['salle_id']}} <br> auteur_id : {{$oeuvre['auteur_id']}}
            <br> date_creation : {{$oeuvre['date_creation']}}  <br> style : {{$oeuvre['style']}}  <br> valide : {{$oeuvre['valide']}}  <br> <a href="{{route('oeuvres.show',$oeuvre->id)}}">Montrer cette oeuvre</a> <br>
            <br><hr><br>
    @endforeach
        <div>
            <a href="{{route('salles.index')}}">
                <button class="button is-info">Retour aux salles</button>
            </a>
        </div>

@endsection
