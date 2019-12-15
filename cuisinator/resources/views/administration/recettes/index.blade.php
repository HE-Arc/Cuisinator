@extends('template.app')
@section('content')
<h1>Administration</h1>
<h2>Recettes</h2>

<div class="container">
    <div class="form-group">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRecetteModal" data-mode="add">Ajouter</button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="tabRecettes">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Créateur</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Etapes</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($recettes as $recette)
                <tr id="recette{{$recette->id}}">
                    <td>{{$recette->nom}}</td>
                    <td>{{$recette->creator->name}}</td>

                    <td><img src="{{ URL::asset('photos-recettes/' . ((!is_null($recette->nom_photo))? $recette->nom_photo : "default.jpg" )) }}" alt="{{$recette->nom_photo}}" class="img-thumbnail"></td>
                    <td>{{$recette->description}}</td>
                    <td>{{$recette->steps}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addRecetteModal" data-mode="update" data-id="{{$recette->id}}" data-nom="{{$recette->nom}}" data-nomPhoto="{{$recette->nom_photo}}" data-description="{{$recette->description}}" data-steps="{{$recette->steps}} " data-aliments="{{$recette->aliments}}">Modifier</button>
                        <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#deleteRecetteModal" data-id="{{$recette->id}}">Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('administration.modals.recette.add')
@include('administration.modals.recette.delete')
@include('administration.recettes.script')
@endsection