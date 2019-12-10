@extends('template.app')

@section('page-title') Recettes @endsection
@section('content')
    <h1>Recettes</h1>
    @foreach($recettes as $recette)
        <div class="row">
            <div class="col-md-3 mx-4">
                <p>Nom: {{$recette->nom}}</p>
            </div>
            <div class="col-md-3">
                <p>Créateur: {{$recette->creator->name}}</p>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    @endforeach
@endsection
