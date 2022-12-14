@extends('layouts.app')

@section('title', 'Une salle')

@section('content')

    <div class="text-center" style="margin-top: 2rem">
        @if($action == 'delete')
            <h3 class="title is-3 is-uppercase has-text-danger has-text-centered">Suppression d'une salle</h3>
        @else
            <h3 class="title is-3 has-text-centered">Affichage du profil</h3>
        @endif
        <hr>
    </div>

    <div>
        {{-- Le nom de l'utilisateur --}}
        <p><strong>Nom : </strong>{{$user->name}}</p>
    </div>
    <div>
        {{-- l'email --}}
        <p><strong>Email : </strong>{{$user->email}}</p>
    </div>
    <div>
        {{-- l'avatar --}}
        <p><strong>Avatar : </strong>{{$user->avatar}} / 5</p>
    </div>

    <div>
        <x-statut-utilisateur :user="$user"/>
    </div>

    <div>
        <a href="{{route('users.index')}}">
            <button>Retour aux salles</button>
        </a>

    </div>


@endsection
