@extends('template.app')

@section('page-title') Cuisinator @endsection

@section('content')
    <main class="container-fluid">
        <h1 class="pb-4 mt-4 mb-2 border-bottom text-center title">Cuisinator</h1>
        <div class="row">
            <!-- TODO Search box here!!! -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ $recette->nom_photo }}" alt="{{$recette->nom}} image"/>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3">
                <ul>
                    @foreach($recette->aliments as $aliment)
                    <li>{{$aliment->quantites->qte}} {{$aliment->quantites->unite->abbrv}} {{$aliment->nom}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9">
                <p>{{$recette->description}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>{{$recette->steps}}</p>
            </div>
        </div>
    </main>

@endsection
