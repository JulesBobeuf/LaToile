@extends('layouts.appOeuvre')

@section('title', 'show oeuvre')

@section('content')

<div class="retour">
    <a href="/salles/{{$oeuvre->salle_id}}"><i class='bx bx-left-arrow-circle' ></i></a>
</div>

<div class=container>
    <div class="text-center" style="margin-top: 2rem">
        <h3>{{$oeuvre->nomOeuvre}}</h3>

    </div>
    <img src=" {{asset("/storage/".$oeuvre->media_url)}}">
    <div>
        <li>
            <h1> {{$oeuvre['nom']}} </h1>
             {{$oeuvre['auteur']}}, {{$oeuvre['date_creation']}}
            <p class="description"> {{$oeuvre['description']}}</p>


           {{$oeuvre['style']}}
            likes : {{$nbLikes}}
            <a href="{{$oeuvre['media_url']}}">Lien de l'oeuvre</a>
        </li>
    </div>

    <hr class="mt-2 mb-2">
    
    <div>
        @if (Auth::user())
            @if (!$like)
                <form action="{{route('like', $oeuvre->id)}}" method="post">
                    @csrf
                    <p>Actuellement non liké ! </p>
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

    <h3>Commentaires</h3>

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
        <li><h2> {{$commentaire['titre']}}</h2> <br> {{$commentaire['contenu']}} <br> User-Id
            : {{$commentaire['user_id']}}
            @if ($commentaire->valide==false)
                <form action="{{route('approuvecommentaire', $commentaire->id)}}" method="post">
                    @csrf
                    <p>Approuver ce commentaire </p>
                    <input type="submit" value="approuver"/>
                </form>
        @endif
    @endforeach
  
</div>
</div>
@endsection
