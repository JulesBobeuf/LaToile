@extends('layouts.appOeuvre')

@section('title', 'show oeuvre')

@section('content')
    <div class="text-center" style="margin-top: 2rem">
        @if($action == 'delete')
            <h3>Suppression d'une oeuvre</h3>
        @else
            <h3>{{$oeuvre->nomOeuvre}}</h3>
        @endif
        
    </div>
    <p> media </p>
        <img src=" {{asset("/storage/".$oeuvre->media_url)}}">
    <div>
    <li> 
        Nom : {{$oeuvre['nom']}} 
        auteur : {{$oeuvre['auteur']}}
        date_creation : {{$oeuvre['date_creation']}}
         <p class="description"> {{$oeuvre['description']}}</p>
        
          
        style : {{$oeuvre['style']}}  
        valide : {{$oeuvre['valide']}}  
        likes : {{$nbLikes}} 
        <a href="{{$oeuvre['media_url']}}">media url</a> 
    </li>
    </div>


    <h4> Liste des commentaires de l'oeuvre</h4>

    <form action="{{route('oeuvres.show',$oeuvre->id)}}" method="get">
        <select name="cat">
            <option value="All" @if($cat == 'All') selected @endif>-- Filtrage --</option>
            @foreach($categories as $categorie)
                <option value="{{$categorie}}" @if($cat == $categorie) selected @endif>{{$categorie}}</option>
            @endforeach
        </select>
        <input type="submit" value="OK">
    </form>

    @foreach( $commentaires as $commentaire)
        <li> Nom : {{$commentaire['titre']}} <br> Texte : {{$commentaire['contenu']}} <br> Note : {{$commentaire['user_id']}}
    @endforeach

@endsection
