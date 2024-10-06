<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel1">Bentuk Kegiatan Edit</h5>
    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<form method="POST" id="form-edit">
    @csrf
    @method('put')
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <input type="hidden" name="id-edit" id="id-edit" value="{{ $data->id }}">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" placeholder=""
                        name="title" value="{{ $data->title ?? '' }}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ $data->description ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Submit</span>
        </button>
    </div>
</form>

<script>
    $('#form-edit').submit(function(e) {
        e.preventDefault();

        var id = $('#id-edit').val();
        var baseUrl = "{{ url('/') }}";
        var updateUrl = baseUrl + `/admin/bentukkegiatan/${id}`;

        $.ajax({
            url: updateUrl,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: new FormData(this),
            processData: false,
            contentType: false,
            // beforeSend: function() {
            //     Swal.fire({
            //         allowOutsideClick: false,
            //         title: 'Please Wait',
            //         text: 'Your request is being processed. This may take a moment.',
            //         showCancelButton: false,
            //         showConfirmButton: false,
            //         didOpen: () => {
            //             Swal.showLoading();
            //         }
            //     });
            // },
            success: function(response) {
                // Swal.fire({
                //     title: "Succcess",
                //     text: "Data updated successfully!",
                //     icon: "success",
                // });
                $('#modal-edit').modal('hide')
                $('#form-edit').trigger('reset')
                showBentukKegiatan()

            },
            error: function(res) {
                // Swal.close();
                // try {
                //     const errors = JSON.parse(res.responseText).errors;
                //     for (const fieldName in errors) {
                //         const input = $(`.${fieldName}`);
                //         const errorMessage = errors[fieldName][0];
                //         input.addClass('border border-danger');
                //         $(`#error-message-${fieldName}`).text(
                //             errorMessage).addClass('text-danger');
                //     }


                // } catch (e) {
                //     Swal.fire({
                //         title: "Error",
                //         text: "An error occurred in the system. Please try again later.",
                //         icon: "error",
                //         onClose: function() {
                //             $('#modal-edit').modal('hide')
                //         }
                //     });
                // }
            }
        })

    });
</script>