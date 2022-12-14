@extends('layouts.app')

@section('title', 'Liste de commentaires')

@section('content')
    <h2>La liste des commentaires</h2>

    @if(!empty($commentaires))
        @foreach($commentaires as $commentaire)
            <ul>
                <li>Titre : {{$commentaire['titre']}}</li>
                <li>Texte : {{$commentaire['contenu']}}</li>
                <a href="{{route('commentaires.show',$commentaire->id)}}">
                    <button>Afficher ce commentaire</button>
                </a>
                @can('update', $commentaire)
                    <a href="{{route('commentaires.edit',$commentaire->id)}}">
                        <button>Editer ce commentaire</button>
                    </a>
                @endcan
                @can('delete', $commentaire)
                    <a href="/commentaires/{{$commentaire->id}}?action=delete">
                        <button>Supprimer ce commentaire</button>
                    </a>
                @endcan
            </ul>
            <hr>
        @endforeach
    @else
        <h3>Aucun commentaire à afficher</h3>
    @endif
@endsection
