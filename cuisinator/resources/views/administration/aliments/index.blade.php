@extends('template.app')
@section('content')
    <h1>Administration</h1>
    <h2>Aliments</h2>
    <div class="container">
        <div class="form-group">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAlimentModal">Ajouter</button>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="tabAliment">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Créateur</th>
                            <th scope="col">Image</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($aliments as $aliment)
                <tr id="aliment{{$aliment->id}}">
                    <td>{{$aliment->nom}}</td>
                    <td>{{$aliment->creator->name}}</td>
                    <td><img src="{{ URL::asset('photos-aliments/' . ((!is_null($aliment->nom_photo))? $aliment->nom_photo : "default.jpg" )) }}" alt="{{$aliment->nom_photo}}" class="img-thumbnail"></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#deleteAlimentModal" data-id="{{$aliment->id}}">Supprimer</button>
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#updateAlimentModal" data-id="{{$aliment->id}}" data-nom="{{$aliment->nom}}" data-nomPhoto="{{$aliment->nom_photo}}">Modifier</button>
                    </td>
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    @include('administration.modals.aliment.add')
    @include('administration.modals.aliment.delete')
    @include('administration.modals.aliment.update')
    @include('administration.aliments.script')
@endsection
 
