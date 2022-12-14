@extends('layouts.app')

@section('title', 'Création des Oeuvres')

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
         formulaire de saisie d'une oeuvre
         la fonction 'route' utilise un nom de route
      --}}

    <form action="{{route('oeuvres.store')}}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'une oeuvre</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            {{-- le nom de l'oeuvre  --}}
            <label for="nom"><strong>Nom de l'oeuvre : </strong></label>
            <input type="nom" name="nom"
                   value="{{ old('nom') }}">
        </div>
        <div>
            {{-- le media_url l'oeuvre  --}}
            <label for="media_url"><strong>media_url de l'oeuvre : </strong></label>
            <textarea name="media_url" rows="6"
                      placeholder="media_url..">
                    {{ old('media_url') }}</textarea>
        </div>
        <div>
            {{-- la thumbnail_url de l'oeuvre  --}}
            <label for="thumbnail_url"><strong>thumbnail_url de l'oeuvre : </strong></label>
            <textarea name="thumbnail_url" rows="6"
                      placeholder="thumbnail_url..">
                    {{ old('thumbnail_url') }}</textarea>
        </div>
        <div>
            {{-- la informations de l'oeuvre  --}}
            <label for="informations"><strong>informations de l'oeuvre : </strong></label>
            <textarea name="informations" rows="6"
                      placeholder="informations..">
                    {{ old('informations') }}</textarea>
        </div>
        <div>
            {{-- la coord_x de l'oeuvre  --}}
            <label for="coord_x"><strong>coord_x de l'oeuvre : </strong></label>
            <textarea name="coord_x" rows="6"
                      placeholder="coord_x..">
                    {{ old('coord_x') }}</textarea>
        </div>
        <div>
            {{-- la coord_y de l'oeuvre  --}}
            <label for="coord_y"><strong>coord_y de l'oeuvre : </strong></label>
            <textarea name="coord_y" rows="6"
                      placeholder="coord_y..">
                    {{ old('coord_y') }}</textarea>
        </div>        <div>
            {{-- la auteur de l'oeuvre  --}}
            <label for="auteur"><strong>auteur de l'oeuvre : </strong></label>
            <textarea name="auteur" rows="6"
                      placeholder="auteur..">
                    {{ old('auteur') }}</textarea>
        </div>


        <div>
            {{-- la date_creation de l'oeuvre --}}
            <label for="date_creation"><strong>date_creation : </strong></label>
            <input type="date" name="date_creation"
                   value="{{ old('date_creation') }}"
                   placeholder="aaaa-mm-jj">
        </div>

        <div>
            {{-- le nom de l'oeuvre  --}}
            <label for="valide"><strong>valide de l'oeuvre : </strong></label>
            <input type="valide" name="valide"
                   value="{{ old('valide') }}">
        </div>

        <div>
            {{-- le style de l'oeuvre  --}}
            <label for="style"><strong>style de l'oeuvre : </strong></label>
            <input type="style" name="style"
                   value="{{ old('style') }}">
        </div>
        <input type="file" name="image" id="doc"> Saisir le lien de l'oeuvre
        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>
@endsection
