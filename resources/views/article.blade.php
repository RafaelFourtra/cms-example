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
                                    <h4 class="card-title fw-semibold float-start">Article</h4>
                                </div>

                                <div class="col-lg-6">
                                    <a href="{{ route('cms.create') }}"><button type="button" id="btn-create"
                                            class="btn btn-primary btn-md float-end">Create</button></a>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-1">
                                <div class="table-responsive mt-4">
                                    <table id="zero_config" class="display table table-striped table-hover data-table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Publication Date</th>
                                                <th>Thumbnail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="modal-create" class="modal fade" tabindex="-1" aria-labelledby="primary-header-modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-md">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-primary text-white">
                                <h4 class="modal-title text-white" id="primary-header-modalLabel">
                                    Book Create
                                </h4>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="form-create">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="category_id" class="form-label">Category <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="category_id" id="category_id">
                                                <option disabled selected></option>
                                            </select>
                                            <p class="error-message-category_id" style="font-size: 12px;"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title" class="form-label">Title <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title">
                                            <p class="error-message-title" style="font-size: 12px;"></p>
                                        </div>
                                        <div class="mt-2 col-md-6">
                                            <label for="page_count" class="form-label">Page Count <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="page_count"
                                                name="page_count">
                                            <p class="error-message-page_count" style="font-size: 12px;"></p>
                                        </div>
                                        <div class="mt-2 col-md-6">
                                            <label for="writer_id" class="form-label">Writer <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="writer_id" id="writer_id">
                                                <option disabled selected></option>
                                            </select>
                                            <p class="error-message-writer_id" style="font-size: 12px;"></p>
                                        </div>
                                        <div class="mt-2 col-md-6">
                                            <label for="publisher_id" class="form-label">Publisher <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" name="publisher_id" id="publisher_id">
                                                <option disabled selected></option>
                                            </select>
                                            <p class="error-message-publisher_id" style="font-size: 12px;"></p>
                                        </div>
                                        <div class="mt-2 col-md-6">
                                            <label for="publication_year" class="form-label">Publication Year <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="publication_year"
                                                name="publication_year">
                                            <p class="error-message-publication_year" style="font-size: 12px;"></p>
                                        </div>
                                        <div class="mt-2 col-md-6">
                                            <label for="qty" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="qty"
                                                name="qty">
                                            <p class="error-message-qty" style="font-size: 12px;"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-primary-subtle text-primary">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <div id="modal-edit" class="modal fade" tabindex="-1" aria-labelledby="warning-header-modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-warning text-white">
                                <h4 class="modal-title text-white" id="warning-header-modalLabel">
                                    Book Edit
                                </h4>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="edit-div">

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
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
        showCms()

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

    function showCms() {
        const columns = [{
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: "title"
            },
            {
                data: "author",
            },
            {
                data: "publication_date",
            },
            {
                data: "thumbnail",
                render: function(data) {
                    // Jika data thumbnail tersedia, tampilkan gambar
                    if (data) {
                        return '<img src="' + data + '" alt="Thumbnail" style="width: 100px; height: auto;"/>';
                    }
                    // Jika tidak ada data thumbnail, tampilkan teks atau gambar default
                    return 'No Image';
                }
            },
        ];

        $('.data-table').DataTable({
            scrollCollapse: true,
            destroy: true,
            autoWidth: false,
            responsive: true,
            searching: true,
            bLengthChange: true,
            bPaginate: true,
            bInfo: true,
            ajax: {
                url: "{{ route('cms.index') }}",
                // data: filterData
            },
            columns: columns,
            columnDefs: [{
                targets: "datatable-nosort",
                orderable: false,
            }],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "language": {
                searchPlaceholder: "Search",
                paginate: {
                    next: '<i class="ti ti-chevron-right"></i>',
                    previous: '<i class="ti ti-chevron-left"></i>'
                }
            },
        });
    }

    function editCms(id) {
        var baseUrl = "{{ url('/') }}";
        var editUrl = baseUrl + `/book/${id}/edit`;

        $.ajax({
            url: editUrl,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('.edit-div').html(response)
                $('#modal-edit').modal('show')
            },
            error: function(res) {
                Swal.fire({
                    title: "Error",
                    text: "An error occurred in the system. Please try again later.",
                    icon: "error",
                });
            }
        })
    }

    function deleteCms(id) {
        var baseUrl = "{{ url('/') }}";
        var deleteUrl = baseUrl + `/cms/${id}`;

        $.ajax({
            url: deleteUrl,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function() {
                Swal.fire({
                    allowOutsideClick: false,
                    title: 'Please Wait',
                    text: 'Your request is being processed. This may take a moment.',
                    showCancelButton: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function(response) {
                Swal.fire({
                    title: "Succcess",
                    text: "Data deleted successfully!",
                    icon: "success",
                });

                showBook()
            },
            error: function(res) {
                Swal.close();
                Swal.fire({
                    title: "Error",
                    text: "An error occurred in the system. Please try again later.",
                    icon: "error",
                });
            }
        })
    }
</script>

</html>
