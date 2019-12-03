@extends('template.app')



@section('content')
    <h1>Administration</h1>
    <h2>Recettes</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addRecetteModal">Ajouter</button>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <table class="table table-bordered" id="tabRecettes">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Créateur</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($recettes as $recette)
                <tr id="recette{{$recette->id}}">
                    <td>{{$recette->nom}}</td>
                    <td>{{$recette->username}}</td>
                    
                    <td><img src="{{ URL::asset('photos-recettes/' . ((!is_null($recette->nom_photo))? $recette->nom_photo : "default.jpg" )) }}" alt="{{$recette->nom_photo}}" class="img-thumbnail"></td>
                    <td>{{$recette->description}}</td>
                    <td>{{$recette->steps}}</td>
                    <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteRecetteModal" data-id="{{$recette->id}}">Supprimer</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateRecetteModal" data-id="{{$recette->id}}" data-nom="{{$recette->nom}}" data-nomPhoto="{{$recette->nom_photo}}">Modifier</button>
                    </td>
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">

        </div>
    </div>
    <script>  
        function updatePage(){
            $.ajax({
                url: "{{ route('recettesJSON')}}",
                cache: false,
                dataType: "json",
                success: function(data){
                    console.log(data);

                    let tbody = $("#tabRecettes").children("tbody");

                    let imagePath = "{{ URL::asset('photos-recettes/') }}/";
                    tbody.empty();
                    
                    for(i = 0; i < data.length;i++){
                        tbody.append("<tr>");
                        tbody.append("<td>" + data[i]['nom']  + "</td>");
                        tbody.append("<td>" + data[i]['username']  + "</td>");
                        tbody.append('<td><img src="' + imagePath + (data[i]['nom_photo'] === null ? "default.jpg" : data[i]['nom_photo']) + '" class="img-thumbnail" alt="' + data[i]['nom_photo'] + '"></td>');
                        tbody.append(`<td> 
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteRecetteModal" data-id="` + data[i]['id'] + `">Supprimer</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateRecetteModal" data-id="` + data[i]['id'] + `" data-nom="` + data[i]['nom'] + `" data-nomPhoto="` + data[i]['nom_photo'] + `">Modifier</button>
                            </td>`);
                        tbody.append("</tr>");
                    }
                },
                error: function(data) {
                    alert("Data not found");
                }
            });
        }
        </script>

    @include('administration.modals.recette.add')
    @include('administration.modals.recette.delete')
    @include('administration.modals.recette.update')
@endsection
 