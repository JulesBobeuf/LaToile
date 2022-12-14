@extends('layout.master')

@section('title', 'Une salle')

@section('main')

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
        <p><strong>Nom : </strong>{{$commentaire->nom}}</p>
    </div>
    <div>
        {{-- le theme de la salle --}}
        <p><strong>Theme : </strong>{{$commentaire->theme}}</p>
    </div>
    <div>
        {{-- la Description de la salle --}}
        <p><strong>Description : </strong>{{$commentaire->description}} / 5</p>
    </div>

    @can('update',$salle)
        <a href="{{ route('salles.edit', $salle->id)}}">
            <button class="button is-info">MODIFIER</button>
        </a>
    @endcan

    @can('delete',$salle)
        <a href="/salles/{{$salle->id}}?action=delete">
            <button class="button is-danger">SUPPRIMER</button>
        </a>
    @endcan

    @if($action == 'delete')
        <form action="{{route('salles.destroy',$salle->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="has-text-centered">
                <button class="button is-danger" type="submit" name="delete" value="valide">Valide</button>
                <button class="button is-info" type="submit" name="delete" value="annule">Annule</button>
            </div>
        </form>
    @else
        <div>
            <a href="{{route('salles.index')}}">
                <button class="button is-info">Retour aux salles</button>
            </a>
        </div>
    @endif

@endsection
