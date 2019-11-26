<div class="modal fade" id="addAlimentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            
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
                <form id="frmAddAliment" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="add-aliment-id" name="id_createur" value="{{ Auth::user()->id }}" >
                        
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
                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" id="btn-add-cancel" data-dismiss="modal" type="button" value="Cancel">                    </input>
                    <button class="btn btn-info" id="btn-add" type="submit" value="add">
                        Add New aliment
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#frmAddAliment').on('hidden.bs.modal', function () {
    $('#add-aliment-errors').html("");
    $('#add-error-bag').hide();
});
$("#frmAddAliment").on("submit", function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var fd = new FormData();
    var files = $('#add-aliment-photo')[0].files[0];
    fd.append('_token',"{{ csrf_token() }}");
    fd.append('nom', $("#add-aliment-nom").val());
    fd.append('photo',files);
    fd.append('id_createur',{{ Auth::user()->id }});

    $.ajax({
        type: 'POST',
        url: '{{ route('aliments.store')}}',
        data : new FormData(this),
        processData: false,
        contentType: false,
        success: function(data) {
            $('#frmAddAliment').trigger("reset");
            $("#btn-add-cancel").click();
            updatePage();
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