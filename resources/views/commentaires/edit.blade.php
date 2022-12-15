@extends('layouts.app')

@section('title', 'Modification du commentaire')

@section('content')
    {{--
       messages d'erreurs dans la saisie du formulaire.
    --}}

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{--
         formulaire de saisie d'un commentaire
         la fonction 'route' utilise un nom de route
      --}}

    <form action="{{route('commentaires.store')}}" method="POST">
        {!! csrf_field() !!}
        <input type="hidden" name="oeuvreId" value="{{$commentaire->idOeuvre}}">
        <h3>Modification du commentaire</h3>
        <hr>
        <div>
            {{-- le titre du commentaire  --}}
            <label for="titre"><strong>Titre du commentaire : </strong></label>
            <input type="text" name="titre"
                   value="{{ $commentaire->titre }}" placeholder="Titre">
        </div>
        <div>
            {{-- le texte du commentaire  --}}
            <label for="contenu"><strong>Contenu du commentaire : </strong></label>
            <textarea name="contenu" rows="10" placeholder="contenu...">{{ $commentaire->contenu }}</textarea>
        </div>

        <div>
            <button type="submit">Valide</button>
        </div>
    </form>
@endsection
