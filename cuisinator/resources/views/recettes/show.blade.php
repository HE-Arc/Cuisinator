@extends('template.app')

@section('page-title') Cuisinator @endsection

@section('content')
    <main class="container-fluid">
        <h1 class="pb-4 mt-4 mb-2 border-bottom text-center title">Cuisinator</h1>
        <div class="row">
            <!-- TODO Search box here!!! -->
        </div>
    <body class="mx-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">{{$recette->nom}}</h2>
                <img class="rounded mx-auto my-2 d-block" src="{{URL::asset('photos-recettes/' . $recette->nom_photo)}}" alt="{{$recette->nom}} image"/>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 p-3">
                <h3>Ingrédients</h3>
                <ul>
                    @foreach($recette->aliments as $aliment)
                    <li>{{$aliment->quantites->qte}} {{$aliment->quantites->unite->abbrv}} {{$aliment->nom}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-8 col-md-offset-1 p-3">
                <h3>Description</h3>
                <p>{{$recette->description}}</p>
                <h3>Étapes</h3>
                <p><?php echo str_replace("\\n", "<br>",$recette->steps)?></p>
            </div>
        </div>

        <div class="row">
            
        </div>
    </body>
    </main>

@endsection
