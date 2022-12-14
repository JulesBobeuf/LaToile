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
        <p>Avatar : </p>
        <img src="{{asset("/storage/".$user->avatar)}}" height="100" width="100">
    </div>
    <div>
        @if (Auth::id()==$user->id)
        <h4> Changer d'avatar</h4>
        <form action="{{route('updateavatar',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="avatar" id="doc"> Avatar
            <button class="btn btn-success" type="submit">Valide</button>
        </form>
        @endif
    </div>
    <div>
        <a href="{{route('users.index')}}">
            <button class="button is-info">Retour aux salles</button>
        </a>
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
