@extends('template.app')

@section('page-title') Recettes @endsection
@section('content')
    <h1>Recettes</h1>
    @foreach($recettes as $recette)
        <div class="row">
            <div class="col-md-3 mx-4">
                <p>Nom: {{$recette->nom}}</p>
            </div>
            <div class="col-md-3">
                <p>Créateur: {{$recette->creator->name}}</p>
            </div>
            <div class="col-md-6">
            </div>
        </div>
<<<<<<< HEAD
    @endforeach
=======
    </main>
@endsection

@section('scripts')
    <script type="text/javascript">
        function allowDrop(ev) {
            ev.preventDefault();
            ev.dataTransfer.dropEffect = "move";
        }

        function preventDrop(ev) {
            ev.preventDefault();
            return false;
        }

        function drag(ev) {
            ev.dataTransfer.setData("text/plain", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            // Get the id of the target and add the moved element to the target's DOM
            let data = ev.dataTransfer.getData("text/plain");
            // console.log(data);
            // console.log(ev.target.childNodes[1]);
            document.getElementById("alims").appendChild(document.getElementById(data));
            search();
        }

        function search() {

            let ids = [];
            let alims = $("#alims");

            // console.log(alims);
            // console.log(alims.children);

            alims.children().each(function() {
                ids.push(this.id);
            });

            // console.log(ids);

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
                success: function (data) {

                    let recipes = $("#recettes");
                    console.log(data);

                    for (let i = 0; i < data.length; ++i) {
                        let figure = "<figure class=\"figure col-lg-4 col-md-12 col-sm-3 col-xs-6 \" id=\"" + data[i].id + "\">";
                        figure += "<div>";
                        figure += '<img src="' + {!! '"'.URL::asset('photos-recettes/').'"' !!} + "/" + data[i].nom_photo + '"'
                                    + 'alt="Image de ' + data[i].nom + '" class="figure-img rounded recette-image-icon" />';
                        figure += "</div>";
                        figure += "<figcaption class=\"figure-caption\" >" + data[i].nom + "</figcaption>";
                        figure += "</figure>";
                        recipes.html(figure);
                    }

                },
                error: function (data) {
                    var errors = $.parseJSON(data.responseText);
                    $('#edit-aliment-errors').html('');
                    $.each(errors.messages, function (key, value) {
                        $('#edit-aliment-errors').append('<li>' + value + '</li>');
                    });
                    $("#edit-error-bag").show();
                }
            });
        }
    </script>
>>>>>>> 3d14093ff12aff75719f5d3858adbec8493c29f8
@endsection
