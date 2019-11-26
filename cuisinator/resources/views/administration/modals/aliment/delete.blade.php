<div class="modal fade" id="deleteAlimentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteAliment">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Delete Aliment
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
                        Are you sure you want to delete this aliment?
                    </p>
                    <p class="text-warning">
                        <small>
                            This action cannot be undone.
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="alimentID" name="alimentID" type="hidden" value="0">
                        <input class="btn btn-default " data-dismiss="modal" type="button" id="btn-delete-cancel" value="Cancel"></input>
                        <button class="btn btn-danger" id="btn-delete" type="button">
                                Delete aliment
                        </button>
                        
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#deleteAlimentModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        modal.find("#alimentID").val(button.data('id'));

    });
    $('#deleteAlimentModal').on('hidden.bs.modal', function () {
        $('#delete-aliment-errors').html("");
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
            url: '{{ route('aliments.index')}}/' + $("#alimentID").val(),
            data: {
                "_token": "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(data) {
                $('#frmDeleteAliment').trigger("reset");
                $("#btn-delete-cancel").click();
                updatePage();
            },
            error: function(data) {
                let errors = $.parseJSON(data.responseText);

                $('#delete-aliment-errors').append('<li>' + errors.message + '</li>');
                $("#delete-error-bag").show(); 
            }
        });
    });

</script>