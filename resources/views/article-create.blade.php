<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables/bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('components.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('components.header')
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="card-title fw-semibold float-start">Article Create</h4>
                                </div>
                            </div>  
                            <hr>
                            <div class="row mt-1">
                                <form action="{{ route('cms.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title">
                                    </div>
                                    <div class="mb-3">
                                        <label for="author" class="form-label">Author</label>
                                        <input type="text" class="form-control" id="author" name="author">
                                    </div>
                                    <div class="mb-3">
                                        <label for="publication_date" class="form-label">Publication Date</label>
                                        <input type="date" class="form-control" id="publication_date" name="publication_date">
                                    </div>
                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Thumbnail</label>
                                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name="description">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

<script>
    $(document).ready(function() {

        // $('#btn-create').click(function() {
        //     $('#modal-create').modal('show')
        // })

        // $('#form-create').submit(function(e) {
        //     e.preventDefault();

        //     const url = this.getAttribute('action')
        //     $.ajax({
        //         url: url,
        //         method: 'POST',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data: new FormData(this),
        //         processData: false,
        //         contentType: false,
        //         beforeSend: function() {
        //             Swal.fire({
        //                 allowOutsideClick: false,
        //                 title: 'Please Wait',
        //                 text: 'Your request is being processed. This may take a moment.',
        //                 showCancelButton: false,
        //                 showConfirmButton: false,
        //                 didOpen: () => {
        //                     Swal.showLoading();
        //                 }
        //             });
        //         },
        //         success: function(response) {
        //             Swal.fire({
        //                 title: "Succcess",
        //                 text: "Data added successfully!",
        //                 icon: "success",
        //             });
        //             $('#modal-create').modal('hide')
        //             $('#form-create').trigger('reset')
        //             showBook()

        //         },
        //         error: function(res) {
        //             Swal.close();
        //             try {
        //                 const errors = JSON.parse(res.responseText).errors;
        //                 for (const fieldName in errors) {
        //                     const input = $(`#${fieldName}`);
        //                     const errorMessage = errors[fieldName][0];
        //                     input.addClass('border border-danger');
        //                     $(`.error-message-${fieldName}`).text(
        //                         errorMessage).addClass('text-danger');
        //                 }


        //             } catch (e) {
        //                 Swal.fire({
        //                     title: "Error",
        //                     text: "An error occurred in the system. Please try again later.",
        //                     icon: "error",
        //                     onClose: function() {
        //                         $('#modal-create').modal('hide')
        //                     }
        //                 });
        //             }
        //         }
        //     })

        // });


    })
</script>

</html>
