@extends('template.app')

@section('content')
    <h1>Aliments</h1>
    @foreach($aliments as $a)
        <div>
            <p>Name: {{$a->nom}}</p>
        </div>
    @endforeach
@endsection
