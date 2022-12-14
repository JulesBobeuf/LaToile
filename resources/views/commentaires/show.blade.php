@extends('layouts.app')

@section('title', 'Un commentaire')

@section('content')

    <div>
        @if($action == 'delete')
            <h3>Suppression d'un commentaire</h3>
        @else
            <h3>Affichage d'un commentaire</h3>
        @endif
        <hr>
    </div>

    <div>
        {{-- Le titre du commentaire --}}
        <p><strong>Titre : </strong>{{$commentaire->titre}}</p>
    </div>
    <div>
        {{-- le texte du commentaire --}}
        <p><strong>Texte : </strong>{{$commentaire->contenu}}</p>
    </div>

    @can('update',$commentaire)
        <a href="{{ route('commentaires.edit', $commentaire->id)}}">
            <button>MODIFIER</button>
        </a>
    @endcan

    @can('delete',$commentaire)
        <a href="/commentaires/{{$commentaire->id}}?action=delete">
            <button>SUPPRIMER</button>
        </a>
    @endcan

    @if($action == 'delete')
        <form action="{{route('commentaires.destroy',$commentaire->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div>
                <button type="submit" name="delete" value="valide">Valide</button>
                <button type="submit" name="delete" value="annule">Annule</button>
            </div>
        </form>
    @else
        <div>
            <a href="{{route('commentaires.index')}}">
                <button>Retour aux commentaires</button>
            </a>
        </div>
    @endif

@endsection
