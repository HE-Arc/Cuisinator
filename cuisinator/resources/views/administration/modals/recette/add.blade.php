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
                        <div class="row" id="ingredient-form1">
                            <div class="col">
                                <select class="custom-select mr-sm-2" name="nom-aliment1">
                                    <option selected>Choisir ...</option>
                                    @foreach($aliments as $aliment)
                                    <option value="{{$aliment->id}}">{{$aliment->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="quantite-aliment1">
                            </div>
                            <div class="col">
                                <select class="custom-select mr-sm-2" name="unite-aliment1">
                                    <option selected>Choisir ...</option>
                                    @foreach($unites as $unite)
                                    <option value="{{$unite->id}}">{{$unite->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" id="btn-ingredient">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="recette-image" class="col-form-label">Image :</label>
                        <input type="file" class="form-control" name="photo" id="add-recette-photo">
                    </div>
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

<script>

var nbIngredientForm = 1;
$("#btn-ingredient").on("click", function(){
    
    let htmlElement = $("#ingredient-form" + nbIngredientForm).clone()
    nbIngredientForm++;
    console.log( htmlElement);

    //.appendTo("#ingredient-container");
    }
);
$('#frmAddRecette').on('hidden.bs.modal', function () {
    $('#add-recette-errors').html("");
    $('#add-error-bag').hide();
});
$("#frmAddRecette").on("submit", function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var fd = new FormData();
    var files = $('#add-recette-photo')[0].files[0];
    fd.append('_token',"{{ csrf_token() }}");
    fd.append('nom', $("#add-recette-nom").val());
    fd.append('photo',files);
    fd.append('id_createur',{{ Auth::user()->id }});

    $.ajax({
        type: 'POST',
        url: '{{ route('recettes.store')}}',
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