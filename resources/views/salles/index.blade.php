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
        <div class="tabflex">
            <div class='round a'>1</div>
            <div class='titre'>
                <h4>L'art du pixel</h4>
                <p>Les créations les plus incroyables de ce domaine</p>
            </div>
        </div>

        <div class="tabflex">
            <div class='round b'>2</div>
            <div class='titre'>
                <h4>Oeuvre IA</h4>
                <p>Les créations les plus incroyables de ce domaine</p>
            </div>
        </div>

        <div class="tabflex">
            <div class='round c'>3</div>
            <div class='titre'>
                <h4>Rendu 3D</h4>
                <p>Les créations les plus incroyables de ce domaine</p>
            </div>
        </div>

        <div class="tabflex">
            <div class='round d'>4</div>
            <div class='titre'>
                <h4>Animation 2D</h4>
                <p>Les créations les plus incroyables de ce domaine</p>
            </div>
        </div>

        <div class="tabflex">
            <div class='round e'>5</div>
            <div class='titre'>
                <h4>Ton arrêt</h4>
                <p>Là où tu peux nous montrer tes créations</p>
            </div>
        </div>

        <div class="tabflex">
            <div class='round f'>6</div>
            <div class='titre'>
                <h4>Nous contacter</h4>
                <p>Là où tu peux nous contacter et en savoir plus sur nous</p>
            </div>
        </div>
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
