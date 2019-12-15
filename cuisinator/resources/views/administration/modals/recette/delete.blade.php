<div class="modal fade" id="deleteRecetteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteRecette">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Delete Recette
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="alert alert-danger collapse" id="delete-error-bag" role="alert">
                    <ul id="delete-recette-errors">
                    </ul>
                </div>
                <div class="modal-body">
                    <p>
                        Are you sure you want to delete this recette?
                    </p>
                    <p class="text-warning">
                        <small>
                            This action cannot be undone.
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="recetteID" name="recetteID" type="hidden" value="0"></input>
                    <input class="btn btn-default " data-dismiss="modal" type="button" id="btn-delete-cancel" value="Cancel">
                    <button class="btn btn-danger" id="btn-delete" type="button">
                        Delete recette
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>