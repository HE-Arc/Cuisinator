<div class="modal fade" id="deleteAlimentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteAliment">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Supprimer un aliment
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="alert alert-danger collapse" id="delete-error-bag" role="alert">
                <ul id="delete-aliment-errors">
                </ul>
                </div>
                <div class="modal-body">
                    <p>
                        Voulez-vous supprimer cet aliment ?
                    </p>
                    <p class="text-warning">
                        <small>
                           L'action est irrémédiable !
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="alimentID" name="alimentID" type="hidden" value="0">
                    <input class="btn btn-default " data-dismiss="modal" type="button" id="btn-delete-cancel" value="Cancel">
                    <button class="btn btn-danger" id="btn-delete" type="button">
                            Supprimer l'aliment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
