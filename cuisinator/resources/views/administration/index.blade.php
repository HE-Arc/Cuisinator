@extends('template.app')



@section('content')
<<<<<<< HEAD
=======
<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-row-reverse">
    <div class="d-flex flex-row-reverse">
    <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>

>>>>>>> 5fb9c141d5e23b14d27dc3ddcde90246f598e8d1
    <h1>Administration</h1>
    <h2>Aliments</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Créateur</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($aliments as $aliment)
                <tr id="aliment{{$aliment->id}}">
                    <td>{{$aliment->nom}}</td>
                    <td>{{$aliment->username}}</td>
                    <td>{{$aliment->nom_photo}}</td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteAlimentModal" data-id="{{$aliment->id}}">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{$aliment->id}}" data-nom="{{$aliment->nom}}" data-nomPhoto="{{$aliment->nom_photo}}">Modifier</button>
                    </td>
              
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('administration.modals.aliment.delete')
    @include('administration.modals.aliment.update')
@endsection
 
