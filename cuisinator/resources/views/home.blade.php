@extends('template.app')

@section('page-title') Cuisinator @endsection

@section('content')
    <main class="container-fluid full-height">
        <h1 class="pb-4 mt-4 mb-2 border-bottom text-center title">Cuisinator</h1>

        <div class="row fill-parent">
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments" ondrop="removeAlimentDragDrop(event)" ondragover="allowDrop(event)">
                        <div class="row w-100 mx-auto">
                            <div class="col-12 spaced-bottom">
                                <form class="form-inline">
                                    <input class="form-control col" id="search-box" type="search" placeholder="Chercher un aliment" />
                                </form>
                            </div>
                        </div>
                        <div class="row mb-auto" id="tous-aliments">
                            @foreach($aliments as $a)
                                <figure class="figure col-lg-4 col-md-12 col-sm-3 col-xs-6 draggable" id="{{$loop->index +1}}" ondragstart="drag(event)">
                                    <div>
                                        <img src="{{ URL::asset('photos-aliments/' . ((!is_null($a->nom_photo))? $a->nom_photo : "default.jpg" )) }}"
                                             alt="{{$a->nom}}" class="figure-img rounded aliment-image-icon"/>
                                    </div>
                                    <figcaption class="figure-caption nom">{{$a->nom}}</figcaption>
                                </figure>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments-possedes" ondrop="AddAlimentDragDrop(event)" ondragover="allowDrop(event)">
                        <div class="row mb-auto" id="alims">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent">
                        <div class="row mb-auto w-100" id="recettes">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        function allowDrop(ev){
            ev.preventDefault();
            ev.dataTransfer.dropEffect = "move";
        }

        function preventDrop(ev){
            ev.preventDefault();
            return false;
        }

        function drag(ev){
            ev.dataTransfer.setData("text/plain", ev.target.id);
        }

        function AddAlimentDragDrop(ev){
            ev.preventDefault();
            // Get the id of the target and add the moved element to the target's DOM
            let data = ev.dataTransfer.getData("text/plain");
            // console.log(data);
            // console.log(ev.target.childNodes[1]);
            document.getElementById("alims").appendChild(document.getElementById(data));
            findRecipes();
        }

        function removeAlimentDragDrop(ev){
            ev.preventDefault();
            // Get the id of the target and add the moved element to the target's DOM
            let data = ev.dataTransfer.getData("text/plain");
            // console.log(data);
            // console.log(ev.target.childNodes[1]);
            document.getElementById("tous-aliments").appendChild(document.getElementById(data));
            findRecipes();
        }

        let draggables = $(".draggable");
        draggables.attr('draggable', true);
        draggables.click(function() {
            if($(this).parents("#tous-aliments").length !== 0){
                document.getElementById("tous-aliments").removeChild(this);
                document.getElementById("alims").appendChild(this);
            }
            else{
                document.getElementById("alims").removeChild(this);
                document.getElementById("tous-aliments").appendChild(this);
            }

            findRecipes();
        });

        function findRecipes(){
            let ids = [];
            let alims = $("#alims");

            alims.children().each(function(){
                ids.push(this.id);
            });

            $("#recettes").html("");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: 'find/' + ids,
                data: {
                    "_token": "{{ csrf_token() }}",
                    nom: $("#edit-aliment-nom").val(),
                    photo: $("#edit-aliment-photo").val(),
                },
                dataType: 'json',
                success: function (data){
                    let recipes = $("#recettes");

                    console.log(data);

                    for (let i = 0; i < data.length; ++i) {
                        let figure = "<figure class=\"figure col-lg-4 col-md-6 col-sm-6 col-xs-6 \" id=\"" + data[i].id + "\">";
                        figure += '<a class="" data-toggle="collapse" href="#collapseRecette' + data[i].id + '" role="button" aria-expanded="false" aria-controls="collapseExample">';
                        figure += '<img src="' + {!! '"'.URL::asset('photos-recettes/').'"' !!} + "/" + data[i].nom_photo + '"';
                        figure += 'alt="Image de ' + data[i].nom + '" class="figure-img rounded recette-image-icon" />';
                        figure += "</a>";
                        figure += "<figcaption class=\"figure-caption\" >" + data[i].nom + "</figcaption>";
                        figure += '<div class="collapse" id="collapseRecette' + data[i].id + '"><div class="card card-body">';
                        figure += '<a class="standard-link-text" href="recettes/' + data[i].id + '">' + data[i].description + '</a>';
                        figure += '</div></div>';
                        figure += "</figure>";
                        recipes.append(figure);
                    }
                },
                error: function (data){
                    let errors = $.parseJSON(data.responseText);
                    $('#edit-aliment-errors').html('');
                    $.each(errors.messages, function (key, value) {
                        $('#edit-aliment-errors').append('<li>' + value + '</li>');
                    });
                    $("#edit-error-bag").show();
                }
            });
        }

        $("#search-box").on('input',function (){
            let searchedString = $("#search-box").val().toLowerCase();

            let figures = $("#tous-aliments>figure");
            figures.show();

            figures.filter(function() {
                return $('.nom', this).html().toLowerCase().indexOf(searchedString) < 0 ;
            }).hide();
        });
    </script>
@endsection
