@extends('layouts.app')

@section('title', 'show oeuvre')

@section('content')
    <div class="text-center" style="margin-top: 2rem">
            <h3>{{$oeuvre->nomOeuvre}}</h3>
        <hr class="mt-2 mb-2">
    </div>
    <div>
        @if (Auth::user())
            @if (!$like)
            <form action="{{route('like', $oeuvre->id)}}" method="post">
                @csrf
                <p>Actuellement Disliké ! </p>
                <input type="submit" value="Like"/>
            </form>
            @else
                <form action="{{route('dislike', $oeuvre->id)}}" method="post">
                    @csrf
                    <p> Actuellement Liké ! </p>
                    <input type="submit" value="Dislike"/>
                </form>
            @endif
        @endif
    </div>
    <div>
        <li> Nom : {{$oeuvre['nom']}} <br> media_url : {{$oeuvre['media_url']}} <br> thumbnail_url
            : {{$oeuvre['thumbnail_url']}} <br> description : {{$oeuvre['description']}}
            <br> coord_x : {{$oeuvre['coord_x']}} <br> coord_y : {{$oeuvre['coord_y']}} <br> salle_id
            : {{$oeuvre['salle_id']}} <br> auteur : {{$oeuvre['auteur']}}
            <br> date_creation : {{$oeuvre['date_creation']}} <br> style : {{$oeuvre['style']}} <br> valide
            : {{$oeuvre['valide']}} <br> likes : {{$nbLikes}} <br>
    </div>
    <p> media </p>
    <img src=" {{asset("/storage/".$oeuvre->media_url)}}" height="100" width="100">
    <p> thumbnail </p>
    <img src="{{asset("/storage/".$oeuvre->thumbnail_url)}}" height="100" width="100">

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

    @if(Auth::user())
        <a href="{{route('commentaires.create', ["oeuvre_id" => $oeuvre->id])}}">
            <button>Ecrire un commentaire</button>
        </a>
    @endif

    @foreach( $commentaires as $commentaire)
        <li> Nom : {{$commentaire['titre']}} <br> Texte : {{$commentaire['contenu']}} <br> User-Id
            : {{$commentaire['user_id']}}
    @endforeach

@endsection
