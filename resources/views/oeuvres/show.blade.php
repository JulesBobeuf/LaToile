@extends('layout.master')

@section('title', 'show oeuvre')

@section('main')
    <div class="text-center" style="margin-top: 2rem">
        @if($action == 'delete')
            <h3>Suppression d'une oeuvre</h3>
        @else
            <h3>{{$oeuvre->nomOeuvre}}</h3>
            <a href="{{route('commentaires.create', ["oeuvre_id" => $oeuvre->id])}}">ecrire un commentaire</a>
        @endif
        <hr class="mt-2 mb-2">
    </div>
    <div>
    <li> Nom : {{$oeuvre['nom']}} <br> media_url : {{$oeuvre['media_url']}} <br> media_url : {{$oeuvre['thumbnail_url']}} <br> media_url : {{$oeuvre['informations']}}
        <br> coord_x : {{$oeuvre['media_url']}} <br> coord_y : {{$oeuvre['media_url']}} <br> salle_id : {{$oeuvre['media_url']}} <br> auteur : {{$oeuvre['media_url']}}
        <br> date_creation : {{$oeuvre['media_url']}}  <br> style : {{$oeuvre['media_url']}}  <br> valide : {{$oeuvre['media_url']}}  <a href="{{route('oeuvres.show',$oeuvre->id)}}">Montrer cette oeuvre</a> <br>
    </div>
    <img src="{{url('storage/images/'.$oeuvre->lienOeuvre)}}" height="100" width="100">

    <h4> Liste des commentaires de l'oeuvre</h4>
    @foreach( $commentaires as $commentaire)
        <li> Nom : {{$commentaire['titre']}} <br> Texte : {{$commentaire['contenu']}} <br> Note : {{$commentaire['user_id']}}
    @endforeach

@endsection
