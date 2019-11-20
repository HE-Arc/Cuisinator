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
        <form id="frmEditAliment"> 
          <input type="hidden" id="edit-aliment-id" value="" >
          <div class="form-group">
            <label for="aliment-nom" class="col-form-label">Nom :</label>
            <input type="text" class="form-control" id="edit-aliment-nom">
          </div>
          <div class="form-group">
            <label for="aliment-image" class="col-form-label">Image :</label>
            <input type="text" class="form-control" id="edit-aliment-photo">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn-save">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
    $('#updateAlimentModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      let alimentNom = button.data('nom') // Extract info from data-* attributes
      let alimentPhoto = button.data('nomPhoto')
      let alimentID = button.data('id')
      console.log(alimentID);

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#edit-aliment-nom').val(alimentNom)
      modal.find('#edit-aliment-photo').val(alimentPhoto)
      modal.find('#edit-aliment-id').val(alimentID)
    })

    $('#updateAlimentModal').on('hidden.bs.modal', function () {
        $('#edit-aliment-errors').html("");
        $('#edit-error-bag').hide();
    });


    $("#btn-save").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '{{ route('aliments.index')}}/' + $("#edit-aliment-id").val(),
            data: {
                "_token": "{{ csrf_token() }}",
                nom: $("#edit-aliment-nom").val(),
                photo: $("#edit-aliment-photo").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditAliment').trigger("reset");
                $("#frmEditAliment .close").click();
                window.location.reload();
            },
            error: function(data) {
              var errors = $.parseJSON(data.responseText);
              $('#edit-aliment-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-aliment-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show(); 
            }
        });
    });
</script>