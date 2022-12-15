@extends('layouts.appSalles')

@section('title', 'Liste de salles')

@section('content')

<div class="retour">
    <a href="/"><i class='bx bx-left-arrow-circle' ></i></a>
</div>

<h1>Choisis ton arrêt</h1>

<div class="trajet">
<img src="/images/lines.svg">
</div>
    <div class="ronds">
        <div class='round a'>1</div>
       
        <div class='round b'>2</div>
        <div class='round c'>3</div>
        <div class='round d'>4</div>
        <div class='round e'>5</div>
        <div class='round f'>6</div>
    </div>

    @if(!empty($salles))
        <ul>
            @foreach($salles as $salle)
                <li>{{$salle['theme']}}
                    <a href="{{route('salles.show',$salle->id)}}">
                        <button class="button"><i class='bx bx-right-arrow-circle' ></i></button>
                    </a>

                </li>
                
            @endforeach
        </ul>
    @else
        <h3>aucune salle</h3>
    @endif

    <div class="metro">
    <img src="/images/metro2.png">
    </div>

@endsection
