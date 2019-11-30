@extends('template.app')



@section('content')
    <h1>Administration</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <a type="button" href="{{route('administrationAliments')}}" class="btn btn-primary btn-lg">Aliments</a>
                <a type="button" href="{{route('administrationRecettes')}}" class="btn btn-secondary btn-lg">Recettes</a>
            </div>
    </div>
@endsection
 
