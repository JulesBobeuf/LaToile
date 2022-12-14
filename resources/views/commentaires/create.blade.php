@extends('layout.master')

@section('title', 'Liste des Commentaires')

@section('main')
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

    <form action="{{route('commentaires.store')}}" method="POST" >
        {!! csrf_field() !!}
        <input  type="hidden" name="oeuvreId" value="{{$oeuvre->id}}" >
        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'un commentaire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            {{-- le titre du commentaire  --}}
            <label for="titreCommentaire"><strong>Titre du commentaire : </strong></label>
            <input type="text" name="titreCommentaire"
                   value="{{ old('titreCommentaire') }}" placeholder="Titre">
        </div>
        <div>
            {{-- le texte du commentaire  --}}
            <label for="texteCommentaire"><strong>Texte du commentaire : </strong></label>
            <textarea name="texteCommentaire" rows="6" placeholder="texteCommentaire..."
                      value="{{ old('texteCommentaire') }}"></textarea>
        </div>
        <div>
            {{-- la note du commentaire  --}}
            <label for="note"><strong>La note du commentaire : </strong></label>
            <input type="number" name="note"
                   value="{{ old('note') }}" placeholder="Note - / 5">
        </div>
        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
@endsection
