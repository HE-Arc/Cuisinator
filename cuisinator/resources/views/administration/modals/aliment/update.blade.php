<div class="modal fade" id="updateAlimentModal" tabindex="-1" role="dialog" aria-labelledby="updateAlimentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateAlimentModalLabel">Modifier un aliment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger collapse" id="edit-error-bag" role="alert">
          <ul id="edit-aliment-errors">
          </ul>
        </div>
        <form id="frmEditAliment" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">
          @csrf

          <input type="hidden" id="edit-aliment-id" value="">

          <div class="form-group">
            <label for="aliment-nom" class="col-form-label">Nom :</label>
            <input type="text" class="form-control" name="nom" id="edit-aliment-nom">
          </div>
          <div class="form-group d-none">
            <label for="aliment-image" class="col-form-label">Image :</label>
            <input type="file" class="form-control" name="photo" id="edit-aliment-photo">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-edit-cancel">Annuler</button>
            <button type="button" class="btn btn-primary" id="btn-edit-save">Sauvegarder</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>