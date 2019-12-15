<script>
    function updatePage() {
        $.ajax({
            url: "{{ route('alimentsJSON')}}",
            cache: false,
            dataType: "json",
            success: function(data) {
                let tbody = $("#tabAliment").children("tbody");

                let imagePath = "{{ URL::asset('photos-aliments/') }}/";
                tbody.empty();

                for (i = 0; i < data.length; i++) {
                    tbody.append("<tr>");
                    tbody.append("<td>" + data[i]['nom'] + "</td>");
                    tbody.append("<td>" + data[i]['creator']['name'] + "</td>");
                    tbody.append('<td><img src="' + imagePath + (data[i]['nom_photo'] === null ? "default.jpg" : data[i]['nom_photo']) + '" class="img-thumbnail" alt="' + data[i]['nom_photo'] + '"></td>');
                    tbody.append(`<td> 
                            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#deleteAlimentModal" data-id="` + data[i]['id'] + `">Supprimer</button>
                            <button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#updateAlimentModal" data-id="` + data[i]['id'] + `" data-nom="` + data[i]['nom'] + `" data-nomPhoto="` + data[i]['nom_photo'] + `">Modifier</button>
                            </td>`);
                    tbody.append("</tr>");
                }
            },
            error: function(data) {
                alert("Data not found");
            }
        });
    }

    $('#updateAlimentModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget);
        let alimentNom = button.data('nom');
        let alimentPhoto = button.data('nomPhoto');
        let alimentID = button.data('id');
        let modal = $(this);
        modal.find('#edit-aliment-nom').val(alimentNom)
        modal.find('#edit-aliment-id').val(alimentID)
    })

    $('#updateAlimentModal').on('hidden.bs.modal', function() {
        $('#edit-aliment-errors').html("");
        $('#edit-error-bag').hide();
    });

    $("#btn-edit-save").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $.ajax({
            type: 'PUT',
            url: '{{route('aliments.index')}}' + "/" + $('#edit-aliment-id').val(),
            data: {
                "_token": "{{ csrf_token() }}",
                nom: $("#edit-aliment-nom").val(),
                photo: $("#edit-aliment-photo").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditAliment').trigger("reset");
                $("#btn-edit-cancel").click();
                updatePage();
            },
            error: function(data) {
                let errors = $.parseJSON(data.responseText);
                $('#edit-aliment-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-aliment-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();
            }
        });
    });


    $('#deleteAlimentModal').on('show.bs.modal', function(event) {
        let button = $(event.relatedTarget) // Button that triggered the modal
        let modal = $(this)
        modal.find("#alimentID").val(button.data('id'));

    });
    $('#deleteAlimentModal').on('hidden.bs.modal', function() {
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
            url : '{{ route('aliments.index')}}' + "/" + $("#alimentID").val(), 
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


    $('#frmAddAliment').on('hidden.bs.modal', function() {
        $('#add-aliment-errors').html("");
        $('#add-error-bag').hide();
    });


    $("#frmAddAliment").on("submit", function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{route('aliments.store')}}',
            data: new FormData(this),
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