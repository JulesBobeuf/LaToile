@extends('layout.app')

@section('title', 'Liste de salles')

@section('content')
    <h2 class="title">La liste des salles</h2>

    <h4 class="title is-4">Filtrage par catégorie</h4>

    <form action="{{route('salles.index')}}" method="get">
        <input type="submit" value="OK">
    </form>

    @if(!empty($salles))
        <ul>
            @foreach($salles as $salle)
                <li>Theme : {{$salle['theme']}}</li>
                <a href="{{route('salles.show',$salle->id)}}">
                    <button class="button">Afficher ce commentaire</button>
                </a>
            @endforeach
        </ul>
    @else
        <h3>aucune salle</h3>
    @endif
@endsection
