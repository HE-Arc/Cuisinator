<script>
    var tableauxAliments = "";
    var nbIngredientForm = 0;
    var modeModal = "";

    function updatePage() {
        $.ajax({
            url: "{{ route('recettesJSON')}}",
            cache: false,
            dataType: "json",
            success: function(data) {
                let tbody = $("#tabRecettes").children("tbody");
                tableauxAliments = data;
                let imagePath = "{{ URL::asset('photos-recettes/') }}/";
                tbody.empty();
                for (i = 0; i < data.length; i++) {
                    tbody.append("<tr>");
                    tbody.append("<td>" + data[i]['nom'] + "</td>");
                    tbody.append("<td>" + "{{ Auth::user()->name }}" + "</td>");
                    tbody.append('<td><img src="' + imagePath + (data[i]['nom_photo'] === null ? "default.jpg" : data[i]['nom_photo']) + '" class="img-thumbnail" alt="' + data[i]['nom_photo'] + '"></td>');
                    tbody.append("<td>" + data[i]['description'] + "</td>");
                    tbody.append("<td>" + data[i]['steps'] + "</td>");
                    tbody.append(`<td>
                            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addRecetteModal" data-mode="update" data-id="` + data[i]['id'] + `" data-nom="` + data[i]['nom'] + `" data-nomPhoto="` + data[i]['nom_photo'] + `" data-description="` + data[i]['description'] + `"  data-steps="` + data[i]['steps'] + `" data-aliments='voirVariable'>Modifier</button>
                            <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#deleteRecetteModal" data-id="` + data[i]['id'] + `">Supprimer</button>
                            </td>`);
                    tbody.append("</tr>");

                }
            },
            error: function(data) {
                
            }
        });
    }

    $('#deleteRecetteModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let modal = $(this);
        modal.find("#recetteID").val(button.data('id'));

    });
    $('#deleteRecetteModal').on('hidden.bs.modal', function() {
        $('#delete-recette-errors').html("");
        $('#delete-error-bag').hide();
    });


    $("#btn-delete").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '{{ route('recettes.index')}}/' + $("#recetteID").val(),
            data: {
                "_token": "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(data) {
                $('#frmDeleteRecette').trigger("reset");
                $("#btn-delete-cancel").click();
                updatePage();
            },
            error: function(data) {
                let errors = $.parseJSON(data.responseText);

                $('#delete-recette-errors').append('<li>' + errors.message + '</li>');
                $("#delete-error-bag").show();
            }
        });
    });

    $("#btn-ingredient").on("click", function() {

        let htmlCopy = $("#ingredient-form0").clone();

        nbIngredientForm++;
        $("#ingredient-container").append('<div class="row" id="ingredient-form' + nbIngredientForm + '"></div>');
        let enfants = Array.from(htmlCopy[0].children);
        $("#ingredient-form" + nbIngredientForm).append(enfants);

        let html = $("#ingredient-form" + nbIngredientForm)
        $(html[0].children[0].children[0]).attr("name", "recette[" + nbIngredientForm + "][aliment]");
        $(html[0].children[1].children[0]).attr("name", "recette[" + nbIngredientForm + "][quantite]");
        $(html[0].children[2].children[0]).attr("name", "recette[" + nbIngredientForm + "][unite]");

    });

    $('#addRecetteModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let modal = $(this)

        modeModal = button.data('mode');
        if (modeModal === "update") {
            modal.find("#update-recette-id").val(button.data('id'));
            modal.find('#add-recette-nom').val(button.data('nom'));
            modal.find("#add-recette-description").val(button.data('description'));
            modal.find("#add-recette-steps").val(button.data('steps'));
            modal.find("#add-recette-photo").parent().hide();
            modal.find("#btn-add").html("Modifier");
            $(".modal-title").html("Modifier une recette");

            let tabAliments = button.data('aliments');
            let length = tabAliments.length;
            let recette = 0;
            
            if (tableauxAliments != "") {
                tabAliments = tableauxAliments;
                recette = tableauxAliments.findIndex(recette => recette.id === button.data('id'));
                length = tabAliments[recette].aliments.length;
            }

            // clone and delete the intial input
            let htmlToCopy = $("#ingredient-form0").clone();
            $("#ingredient-form0").remove();

            for (let i = 0; i < length; i++) {
                $("#ingredient-container").append('<div class="row" id="ingredient-form' + nbIngredientForm + '"></div>');
                let enfants = Array.from(htmlToCopy[0].children);

                $("#ingredient-form" + nbIngredientForm).append(enfants);

                let html = $("#ingredient-form" + nbIngredientForm)

                $(html[0].children[0].children[0]).attr("name", "recette[" + nbIngredientForm + "][aliment]");
                $(html[0].children[1].children[0]).attr("name", "recette[" + nbIngredientForm + "][quantite]");
                $(html[0].children[2].children[0]).attr("name", "recette[" + nbIngredientForm + "][unite]");

                if (tableauxAliments == "") {
                    $(html[0].children[0].children[0]).val(tabAliments[i].id);
                    $(html[0].children[1].children[0]).val(tabAliments[i].quantites.qte);
                    $(html[0].children[2].children[0]).val(tabAliments[i].quantites.id_unite);
                } else {
    
                    $(html[0].children[0].children[0]).val(tabAliments[recette].aliments[i].id);
                    $(html[0].children[1].children[0]).val(tabAliments[recette].aliments[i].quantites.qte);
                    $(html[0].children[2].children[0]).val(tabAliments[recette].aliments[i].quantites.id_unite);
                }

                htmlToCopy = $("#ingredient-form" + nbIngredientForm).clone();
                nbIngredientForm++;
            }
        } else {
            modal.find("#add-recette-photo").parent().show();
            modal.find("#btn-add").html("Ajouter");
            $(".modal-title").html("Ajouter une recette");
            $('#frmAddRecette').trigger("reset");
        }
    })

    $('#addRecetteModal').on('hidden.bs.modal', function() {
        $('#add-recette-errors').html("");
        $('#add-error-bag').hide();

        for (let i = nbIngredientForm; i > 0; i--) {
            $("#ingredient-form" + i).remove();
        }
        nbIngredientForm = 0;
    });
    $("#frmAddRecette").on("submit", function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (modeModal === "add") {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: "POST",
                url: "{{ route('recettes.store')}}",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    $('#frmAddRecette').trigger("reset");
                    $("#btn-add-cancel").click();
                    updatePage();
                },
                error: function(data) {
                    let errors = $.parseJSON(data.responseText);
                    $('#add-recette-errors').html('');
                    $.each(errors.messages, function(key, value) {
                        $('#add-recette-errors').append('<li>' + value + '</li>');
                    });
                    $("#add-error-bag").show();
                }
            });

        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: "PUT",
                url: "{{ route('recettes.store')}}/" + $("#update-recette-id").val(),
                data : $(this).serialize(),
                success: function(data) {
                    $('#frmAddRecette').trigger("reset");
                    $("#btn-add-cancel").click();
                    updatePage();
                },
                error: function(data) {
                    let errors = $.parseJSON(data.responseText);
                    $('#add-recette-errors').html('');
                    $.each(errors.messages, function(key, value) {
                        $('#add-recette-errors').append('<li>' + value + '</li>');
                    });
                    $("#add-error-bag").show();
                }
            });
        }
    });
</script>