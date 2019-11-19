@extends('template.app')

@section('page-title') Aliments @endsection
@section('content')
    <h1>Aliments</h1>
    @foreach($aliments as $a)
        <div>
            <p>Nom: {{$a->nom}}</p>
            <p>Créateur: {{$a->id_createur}}</p>
        </div>
    @endforeach
@endsection
