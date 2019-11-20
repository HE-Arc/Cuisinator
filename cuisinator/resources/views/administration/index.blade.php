@extends('template.app')



@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-row-reverse">
    <div class="d-flex flex-row-reverse">
    <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
    <h1>Administration</h1>
    <h2>Aliments</h2>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Créateur</th>
                            <th scope="col">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($aliments as $aliment)
                <tr id="aliment{{$aliment->id}}">
                    <td>{{$aliment->nom}}</td>
                    <td>{{$aliment->id_createur}}</td>
                    <td>{{$aliment->nom_photo}}</td>
                    <td>
                    <form action="{{ route('aliments.destroy', $aliment->id) }}" method="post">
                        @method('DELETE')

                        @csrf

                        <input class="btn btn-sm btn-danger" class="btn  btn-danger"type="submit" value="Delete" />
                    </form>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{$aliment->id}}" data-nom="{{$aliment->nom}}" data-nomPhoto="{{$aliment->nom_photo}}">Modifier</button>
                    </td>
                   
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier un aliment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger collapse" id="edit-error-bag" role="alert">
            <ul id="edit-task-errors">
            </ul>
        </div>
        <form id="frmEditTask"> 
          <input type="hidden" id="aliment-id" value="" >
          <div class="form-group">
            <label for="aliment-nom" class="col-form-label">Nom :</label>
            <input type="text" class="form-control" id="aliment-nom">
          </div>
          <div class="form-group">
            <label for="aliment-image" class="col-form-label">Image :</label>
            <input type="text" class="form-control" id="aliment-photo">
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
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      let alimentNom = button.data('nom') // Extract info from data-* attributes
      let alimentPhoto = button.data('nomPhoto')
      let alimentID = button.data('id')

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#aliment-nom').val(alimentNom)
      modal.find('#aliment-photo').val(alimentPhoto)
      modal.find('#aliment-id').val(alimentID)
    })


    $("#btn-save").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            
            url: '{{ route('aliments.index')}}/' + $("#aliment-id").val(),
            data: {
                "_token": "{{ csrf_token() }}",
                nom: $("#aliment-nom").val(),
                photo: $("#aliment-photo").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditTask').trigger("reset");
                $("#frmEditTask .close").click();
                window.location.reload();
            },
            error: function(data) {
              var errors = $.parseJSON(data.responseText);
              $('#edit-task-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-task-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show(); 
            }
        });
    });
</script>
@endsection
 
