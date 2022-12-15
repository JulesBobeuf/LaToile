@extends('layouts.app')

@section('title', 'Liste Oeuvres')

@section('content')
    <h2>La liste des oeuvres</h2>
    <br>
    <h3> Lien utiles :</h3>
    <a href="{{route('oeuvres.create')}}">Créer une oeuvre</a>
    <h4>Filtrage par catégorie</h4>
    @if(!empty($oeuvres))
        <ul>
            @foreach($oeuvres as $oeuvre)
                <li> Nom : {{$oeuvre['nom']}} <br> media_url : {{$oeuvre['media_url']}} <br> thumbnail_url : {{$oeuvre['thumbnail_url']}} <br> description : {{$oeuvre['description']}}
                    <br> coord_x : {{$oeuvre['coord_x']}} <br> coord_y : {{$oeuvre['coord_y']}} <br> salle_id : {{$oeuvre['salle_id']}} <br> auteur : {{$oeuvre['auteur']}}
                    <br> date_creation : {{$oeuvre['date_creation']}}  <br> style : {{$oeuvre['style']}}  <br> valide : {{$oeuvre['valide']}}  <br> <a href="{{route('oeuvres.show',$oeuvre->id)}}">Montrer cette oeuvre</a> <br>
                <br><hr><br>
            @endforeach
        </ul>
    @else
        <h3>aucune oeuvre (toutes volées:/)</h3>
    @endif
@endsection

