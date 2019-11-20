<div class="modal fade" id="addAlimentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddAliment">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Add New Aliment
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger collapse" id="add-error-bag">
                        <ul id="add-aliment-errors">
                        </ul>
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="add-aliment-id" value="" >
                    </div>
                    <div class="form-group">
                        <label for="aliment-nom" class="col-form-label">Nom :</label>
                        <input type="text" class="form-control" id="add-aliment-nom">
                    </div>
                    <div class="form-group">
                        <label for="aliment-image" class="col-form-label">Image :</label>
                        <input type="text" class="form-control" id="add-aliment-photo">
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                        <button class="btn btn-info" id="btn-add" type="button" value="add">
                            Add New aliment
                        </button>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$('#addAlimentModal').on('hidden.bs.modal', function () {
    $('#add-aliment-errors').html("");
    $('#add-error-bag').hide();
});

$("#btn-add").click(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '{{ route('aliments.store')}}',
        data: {
            "_token": "{{ csrf_token() }}",
            nom: $("#add-aliment-nom").val(),
            photo: $("#add-aliment-photo").val(),
            id_createur: {{ Auth::user()->id }},
        },
        dataType: 'json',
        success: function(data) {
            $('#frmAddAliment').trigger("reset");
            $("#frmAddAliment .close").click();
            window.location.reload();
        },
        error: function(data) {
            let errors = $.parseJSON(data.responseText);
            $('#add-aliment-errors').html('');
            $.each(errors.messages, function(key, value) {
                $('#add-aliment-errors').append('<li>' + value + '</li>');
            });
            $("#add-error-bag").show(); 
            }
        });
    });
</script>