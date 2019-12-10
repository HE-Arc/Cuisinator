<div class="modal fade" id="addRecetteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Ajouter une nouvelle recette
                </h4>
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger collapse" id="add-error-bag">
                    <ul id="add-recette-errors">
                    </ul>
                </div>
                <form id="frmAddRecette" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="update-recette-id" name="id_recette" value="">
                        <input type="hidden" id="add-recette-id" name="id_createur" value="{{ Auth::user()->id }}" >
                            
                        @csrf

                    </div>
                    <div class="form-group">
                        <label for="recette-nom" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" name="nom" id="add-recette-nom">
                    </div>
                    <div class="form-group">
                        <label for="recette-description" class="col-form-label">Description :</label>
                        <textarea name="description" class="form-control" id="add-recette-description" form="frmAddRecette"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recette-steps" class="col-form-label">Etape :</label>
                        <textarea name="steps" class="form-control" id="add-recette-steps" form="frmAddRecette"></textarea>
                    </div>
                    <div class="form-group" id="ingredient-container">
                        <label for="recette-ingredient" class="col-form-label">Ingrédients :</label>
                        <div class="row" id="ingredient-form0">
                             <div class="col">
                                <select class="custom-select mr-sm-2" name="recette[0][aliment]">
                                    <option value="" selected>Choisir ...</option>
                                    @foreach($aliments as $aliment)
                                    <option value="{{$aliment->id}}">{{$aliment->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" step="0.1" class="form-control" name="recette[0][quantite]">
                            </div>
                            <div class="col">
                                <select class="custom-select mr-sm-2" name="recette[0][unite]">
                                    <option selected>Choisir ...</option>
                                    @foreach($unites as $unite)
                                    <option value="{{$unite->id}}">{{$unite->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-info" id="btn-ingredient">
                            Ajouter un aliment
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="recette-image" class="col-form-label">Image :</label>
                        <input type="file" class="form-control" name="photo" id="add-recette-photo">
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-default" id="btn-add-cancel" data-dismiss="modal" type="button" value="Cancel"></input>
                        <button class="btn btn-info" id="btn-add" type="submit" value="add">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
var nbIngredientForm = 0;
var modeModal = ""
$("#btn-ingredient").on("click", function(){
    
    let htmlCopy = $("#ingredient-form0").clone();

    nbIngredientForm++;
    $("#ingredient-container").append('<div class="row" id="ingredient-form' + nbIngredientForm + '"></div>');
    let enfants = Array.from(htmlCopy[0].children);
    $("#ingredient-form" + nbIngredientForm).append(enfants);

    let html = $("#ingredient-form" + nbIngredientForm)
    console.log(html[0].children)
    $(html[0].children[0].children[0]).attr("name","recette[" + nbIngredientForm + "][aliment]");
    $(html[0].children[1].children[0]).attr("name","recette[" + nbIngredientForm + "][quantite]");
    $(html[0].children[2].children[0]).attr("name","recette[" + nbIngredientForm + "][unite]");

    }
);

$('#addRecetteModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let modal = $(this)

    modeModal = button.data('mode');

    if(modeModal === "update"){
        modal.find("#update-recette-id").val(button.data('id'));
        modal.find('#add-recette-nom').val(button.data('nom'));
        modal.find("#add-recette-description").val(button.data('description'));
        modal.find("#add-recette-steps").val(button.data('steps'));
        modal.find("#add-recette-photo").val(button.data('nomPhoto'))
        let tabAliments = button.data('aliments');

        // clone and delete the intial input
        let htmlToCopy = $("#ingredient-form0").clone();
        $("#ingredient-form0").remove();

        for (let i = 0; i < tabAliments.length; i++){
            $("#ingredient-container").append('<div class="row" id="ingredient-form' + nbIngredientForm + '"></div>');
            let enfants = Array.from(htmlToCopy[0].children);

            $("#ingredient-form" + nbIngredientForm).append(enfants);

            let html = $("#ingredient-form" + nbIngredientForm)
            console.log(tabAliments[i].nom);
            console.log(nbIngredientForm);

            $(html[0].children[0].children[0]).attr("name","recette[" + nbIngredientForm + "][aliment]");
            $(html[0].children[0].children[0]).val(tabAliments[i].id);
            $(html[0].children[1].children[0]).attr("name","recette[" + nbIngredientForm + "][quantite]");
            $(html[0].children[1].children[0]).val(tabAliments[i].quantites.qte);
            $(html[0].children[2].children[0]).attr("name","recette[" + nbIngredientForm + "][unite]");
            $(html[0].children[2].children[0]).val(tabAliments[i].quantites.id_unite);

            htmlToCopy = $("#ingredient-form" + nbIngredientForm).clone();
            nbIngredientForm++;
        }
    }
    })

$('#addRecetteModal').on('hidden.bs.modal', function () {
    $('#add-recette-errors').html("");
    $('#add-error-bag').hide();
    $('#frmAddRecette').trigger("reset");

    for(let i = nbIngredientForm; i > 0; i--){
        $("#ingredient-form" + i).remove();
    }
    nbIngredientForm = 0;
});
$("#frmAddRecette").on("submit", function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let route = "";
    let methodType = "";

    if(modeModal === "add"){
        route = '{{ route('recettes.store')}}';
        methodType = "POST";
    } else {
        route = '{{ route('recettes.index')}}/' + $("#update-recette-id").val();
        methodType = "PUT";
    }
    $.ajax({
        type: methodType,
        url: route,
        data : new FormData(this),
        processData: false,
        contentType: false,
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
});
</script>