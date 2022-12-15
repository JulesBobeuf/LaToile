@extends('layouts.appV2')

@section('content')

    @include("_errors")
<div class="login">
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <h1>Accès musée</h1>
        </div>
        <div>
            <label for="email">Adresse mail</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="pwd">Mot de passe</label>
            <input type="password" name="password" id="pwd">
        </div>
        <div >
            <input type="submit" value="Connexion">
        </div>
    </form>
    <div>
        <a href="{{route('accueil')}}">Retour à la page principale</a>
    </div>

            <div>
                Si vous n'avez pas de compte, <a href="{{route('register')}}">vous pouvez en créer un ici.</a>
            </div>

</div>
@endsection
