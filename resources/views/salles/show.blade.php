@extends('layouts.appShow')

@section('title', 'Une salle')

@section('content')


<div class='content'>
    <div class="oeuvres">
       
        <img src="{{asset('/images/pixel.png')}}" />


        <div class='grid'>
            <div class='grid1'>
                <form action="{{route('salles.show',$salle->id)}}" method="get">
                    <select name="cat">
                        @foreach($categoriesOeuvres as $categorie)
                            <option value="{{$categorie}}" @if($cat == $categorie) selected @endif>{{$categorie}}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="OK">
                </form>
                @foreach($oeuvres as $oeuvre)
                    <div class='oeuvre'>
                        <img src="{{asset("/storage/".$oeuvre->media_url)}}">
                        <h1> {{$oeuvre['nom']}} </h1>
                        auteur : {{$oeuvre['auteur']}}
                        <div><p class="descriptionoeuvre">{{$oeuvre['description']}}</p></div>

                        <p>{{$oeuvre['date_creation']}} </p>
                        <a href="{{route('oeuvres.show',$oeuvre->id)}}">Montrer cette oeuvre</a>
                        <a href='{{$oeuvre["media_url"]}}'>mediaurl</a>
                        @if ($salle->id==5 and $oeuvre->valide==false and Auth::user()->admin==true)
                            <form action="{{route('approuveoeuvre', $oeuvre->id)}}" method="post">
                                @csrf
                                <p>Approuver cette oeuvre </p>
                                <input type="submit" value="approuver"/>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>

        </div>
                <div class="retour">
                    
                @if($salle->id==5)
                    <a href="{{route('salles.index')}}">
                    <button class="button is-info">Arrêt suivant ></button>
                    </a>
                        @else
                        <a href="{{route('salles.show',$salle->id+1)}}">
                        <button class="button is-info">Arrêt suivant ></button>
                        </a>
                @endif
                </div>
    </div>
<script>
    const scrollContainer = document.querySelector(".oeuvres");

scrollContainer.addEventListener("wheel", (evt) => {
    evt.preventDefault();
    scrollContainer.scrollLeft += evt.deltaY;
});
</script>

@endsection
