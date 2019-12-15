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
                <form id="frmAddRecette" enctype="x-www-form-urlencoded">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" id="update-recette-id" name="id_recette" value="">
                        <input type="hidden" id="add-recette-id" name="id_createur" value="{{ Auth::user()->id }}">
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
