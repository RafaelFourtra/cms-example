<div class="modal-header">
    <h5 class="modal-title" id="myModalLabel1">Info Edit</h5>
    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<form method="POST" id="form-edit">
    @csrf
    @method('put')
    <div class="modal-body">
        <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="hidden" name="id-edit" id="id-edit" value="{{ $data->id }}">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" id="lokasi" class="form-control" placeholder="" name="lokasi"
                            value="{{ $data->lokasi ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="notelp">No. Telp</label>
                        <input type="number" id="notelp" class="form-control" placeholder="" name="notelp"
                            value="{{ $data->notelp ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" placeholder="" name="email"
                            value="{{ $data->email ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" id="website" class="form-control" placeholder="" name="website"
                            value="{{ $data->website ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" id="facebook" class="form-control" placeholder="" name="facebook"
                            value="{{ $data->facebook ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" id="twitter" class="form-control" placeholder="" name="twitter"
                            value="{{ $data->twitter ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" id="instagram" class="form-control" placeholder="" name="instagram"
                            value="{{ $data->instagram ?? '' }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" id="linkedin" class="form-control" placeholder="" name="linkedin"
                            value="{{ $data->linkedin ?? '' }}">
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
        var updateUrl = baseUrl + `/admin/info/${id}`;

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
                showInfo()

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
