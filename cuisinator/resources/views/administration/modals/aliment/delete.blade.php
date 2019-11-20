<!-- Delete Task Modal Form HTML -->
<div class="modal fade" id="deleteAlimentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteTask">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Delete Task
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
                        Are you sure you want to delete this task?
                    </p>
                    <p class="text-warning">
                        <small>
                            This action cannot be undone.
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="task_id" name="task_id" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                            <button class="btn btn-danger" id="btn-delete" type="button">
                                Delete Task
                            </button>
                        </input>
                    </input>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    var alimentID = 0;
    $('#deleteAlimentModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var modal = $(this)
      alimentID = button.data('id');
    })


    $("#btn-delete").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '{{ route('aliments.index')}}/' + alimentID,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(data) {
                $('#frmDeleteTask').trigger("reset");
                $("#frmDeleteTask .close").click();
                window.location.reload();
            },
            error: function(data) {
              var errors = $.parseJSON(data.responseText);
              $('#delete-aliment-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#delete-aliment-errors').append('<li>' + value + '</li>');
                });
                $("#delete-error-bag").show(); 
            }
        });
    });

</script>