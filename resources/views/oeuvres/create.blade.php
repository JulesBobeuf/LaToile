@extends('layouts.appV2')

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

    <form class="login" action="{{route('oeuvres.store')}}" method="POST" enctype="multipart/form-data">
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
            {{-- la description de l'oeuvre  --}}
            <label for="description"><strong>description de l'oeuvre : </strong></label>
            <textarea name="description" rows="6"
                      placeholder="description..">
                    {{ old('description') }}</textarea>
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
            {{-- le style de l'oeuvre  --}}
            <label for="style"><strong>style de l'oeuvre : </strong></label>
            <input type="style" name="style"
                   value="{{ old('style') }}">
        </div>
        
        <input type="file" name="media" id="doc"> Media de l'oeuvre
        <br>
        <input type="file" name="thumbnail" id="doc"> Thumbnail de l'oeuvre
        <div>
            <button class="connexion" type="submit">Valide</button>
        </div>
    </form>
@endsection
