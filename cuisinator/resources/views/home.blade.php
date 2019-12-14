@extends('template.app')

@section('page-title') Cuisinator @endsection

@section('content')
    <main class="container-fluid full-height">
        <h1 class="pb-4 mt-4 mb-2 border-bottom text-center title">Cuisinator</h1>

        <!-- Three main columns -->
        <div class="row fill-parent">
            <!-- All aliments column -->
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments" ondrop="removeAlimentDragDrop(event)" ondragover="allowDrop(event)">
                        <!-- Search box -->
                        <div class="row w-100 mx-auto">
                            <div class="col-12 spaced-bottom">
                                <form class="form-inline">
                                    <input class="form-control col" id="search-box" type="search" placeholder="Chercher un aliment" />
                                </form>
                            </div>
                        </div>
                        <!-- Aliments container -->
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
            <!-- Possessed aliments -->
            <div class="col-md-3 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent" id="liste-aliments-possedes" ondrop="AddAlimentDragDrop(event)" ondragover="allowDrop(event)">
                        <div class="row mb-auto" id="alims">
                            <!-- Will be added here by javascript (AJAX request) -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Availabe recipes -->
            <div class="col-md-6 container spaced-inside fill-parent">
                <div class="container fill-parent">
                    <div class="row p-3 border bg-light rounded-lg fill-parent">
                        <div class="row mb-auto w-100" id="recettes">
                            <!-- Will be added here by javascript (AJAX request) -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        /**
         * Defines the effect of drop
         * @param ev
         */
        function allowDrop(ev){
            ev.preventDefault();
            ev.dataTransfer.dropEffect = "move";
        }

        /**
         * Defines the drag behaviour
         * @param ev
         */
        function drag(ev){
            ev.dataTransfer.setData("text/plain", ev.target.id);
        }

        /**
         * Function called on drop. Adds aliment to possessed ones and finds the corresponding recipes
         * @param ev
         * @constructor
         */
        function AddAlimentDragDrop(ev){
            ev.preventDefault();
            // Get the id of the target and add the moved element to the target's DOM
            let data = ev.dataTransfer.getData("text/plain");
            document.getElementById("alims").appendChild(document.getElementById(data));
            findRecipes();
        }

        /**
         * Function called when drag-dropping an aliment from possessed one to all aliments. Removes it and finds recipes
         * @param ev
         */
        function removeAlimentDragDrop(ev){
            ev.preventDefault();
            // Get the id of the target and add the moved element to the target's DOM
            let data = ev.dataTransfer.getData("text/plain");
            document.getElementById("tous-aliments").appendChild(document.getElementById(data));
            findRecipes();
        }

        /**
         * Drag-drop equivalent, but on click. Useful for example on mobile, where drag-drop is a pain
         */
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

        /**
         * Executes an AJAX request to find the recipes corresponding to the possessed aliments
         * and displays those recipes in the third column of the page
         */
        function findRecipes(){
            let ids = [];
            let alims = $("#alims");

            //Take all aliments IDs
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
                    //Add a figure to the recipes for each recipe in the AJAX response
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

        /**
         * Perform a filter when typing in the search box
         */
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
