<div class="modal fade" id="addAlimentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Ajouter un nouvel aliment
                </h4>
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    ×
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger collapse" id="add-error-bag">
                    <ul id="add-aliment-errors"></ul>
                </div>
                <form id="frmAddAliment" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="add-aliment-id" name="id_createur" value="{{ Auth::user()->id }}">
                        @csrf
                    </div>
                    <div class="form-group">
                        <label for="aliment-nom" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" name="nom" id="add-aliment-nom">
                    </div>
                    <div class="form-group">
                        <label for="aliment-image" class="col-form-label">Image :</label>
                        <input type="file" class="form-control" name="photo" id="add-aliment-photo">
                    </div>

                    <div class="modal-footer">
                        <input class="btn btn-default" id="btn-add-cancel" data-dismiss="modal" type="button" value="Cancel">
                        <button class="btn btn-info" id="btn-add" type="submit" value="add">
                        Ajouter un nouvel aliment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>