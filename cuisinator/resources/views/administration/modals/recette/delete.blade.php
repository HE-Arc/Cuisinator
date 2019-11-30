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
                    <input id="recetteID" name="recetteID" type="hidden" value="0">
                        <input class="btn btn-default " data-dismiss="modal" type="button" id="btn-delete-cancel" value="Cancel">
                        <button class="btn btn-danger" id="btn-delete" type="button">
                                Delete recette
                        </button>                
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#deleteRecetteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        modal.find("#recetteID").val(button.data('id'));

    });
    $('#deleteRecetteModal').on('hidden.bs.modal', function () {
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

</script>