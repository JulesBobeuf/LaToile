@extends('layouts.appV2')

@section('title', 'Une salle')

@section('content')

    <div class="text-center" style="margin-top: 2rem">
        @if($action == 'delete')
            <h3 class="title is-3 is-uppercase has-text-danger has-text-centered">Suppression d'une salle</h3>
        @else
            <h3 class="title is-3 has-text-centered">Mon profil</h3>
        @endif
        <hr>
    

    <div>
        {{-- Le nom de l'utilisateur --}}
        <h2 class="pseudo">{{$user->name}}</h2>
    </div>
    <div>
        {{-- l'email --}}
        <p><strong>Email : </strong>{{$user->email}}</p>
    </div>
    <div>
        {{-- l'avatar --}}
        <img class="avatarimg" src="{{asset("/storage/".$user->avatar)}}">
    </div>
    <div>
        @if (Auth::id()==$user->id)
        <h4> Changer d'avatar:</h4>
        <form action="{{route('updateavatar',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="avatar" class="connexion pdp">Importer ma photo</label>
            <input type="file" name="avatar" id="doc"> 
            <button class="connexion" type="submit">Valider</button>
        </form>
        @endif
    </div>

    <div>
        <x-statut-utilisateur :user="$user"/>
    </div>

    <div>
        <a href="{{route('users.index')}}">
            <button class="connexion bas">Retour aux salles</button>
        </a>

    </div>

    </div>

@endsection
