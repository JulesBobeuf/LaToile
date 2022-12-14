@extends('layout.master')

@section('title', 'Liste Oeuvres')

@section('main')
    <h2>La liste des oeuvres</h2>
    <br>
    <h3> Lien utiles :</h3>
    <a href="{{route('oeuvres.create')}}">Créer un oeuvre</a>
    <h4>Filtrage par catégorie</h4>
    @if(!empty($oeuvres))
        <ul>
            @foreach($oeuvres as $oeuvre)
                <li> Nom : {{$oeuvre['nom']}} <br> media_url : {{$oeuvre['media_url']}} <br> media_url : {{$oeuvre['thumbnail_url']}} <br> media_url : {{$oeuvre['informations']}}
                    <br> coord_x : {{$oeuvre['media_url']}} <br> coord_y : {{$oeuvre['media_url']}} <br> salle_id : {{$oeuvre['media_url']}} <br> auteur : {{$oeuvre['media_url']}}
                    <br> date_creation : {{$oeuvre['media_url']}}  <br> style : {{$oeuvre['media_url']}}  <br> valide : {{$oeuvre['media_url']}}  <a href="{{route('oeuvres.show',$oeuvre->id)}}">Montrer cette oeuvre</a> <br>
                <br><hr><br>
            @endforeach
        </ul>
    @else
        <h3>aucune oeuvre (toutes volées:/)</h3>
    @endif
@endsection

