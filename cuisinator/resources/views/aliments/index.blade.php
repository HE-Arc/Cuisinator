@extends('template.app')

@section('page-title') Aliments @endsection
@section('content')
    <h1>Aliments</h1>
    @foreach($aliments as $a)
        <div class="row">
            <div class="col-md-3 mx-4">
                <p>Nom: {{$a->nom}}</p>
            </div>
            <div class="col-md-3">
                <p>Créateur: {{$a->id_createur}}</p>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    @endforeach
@endsection
