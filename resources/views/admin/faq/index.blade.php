@extends('layouts.admin')
@section('title', 'FAQ')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endpush

@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>FAQ</h3>
        <div class="position-absolute top-0 end-0 p-3" style="margin-right: 20px; margin-top: 40px;">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #f8f9fa;">
                    <li>
                        <form action="/admin/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" id="btn-create">Create</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table data-table" id="faq-datatable">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade text-left" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Bentuk Kegiatan Create</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.faq.store') }}" method="POST" id="form-create">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="pertanyaan">Pertanyaan</label>
                                    <input type="text" id="pertanyaan" class="form-control" placeholder=""
                                        name="pertanyaan">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="jawaban">Jawaban</label>
                                    <textarea id="jawaban" name="jawaban"></textarea>
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
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content" id="modal-content-edit">

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            showFaq();
            $('#btn-create').click(function() {
                $('#modal-create').modal('show')
            })

            $('#form-create').submit(function(e) {
                e.preventDefault();

                const url = this.getAttribute('action')
                $.ajax({
                    url: url,
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
                        //     text: "Data added successfully!",
                        //     icon: "success",
                        // });
                        $('#modal-create').modal('hide')
                        $('#form-create').trigger('reset')
                        showFaq()

                    },
                    error: function(res) {

                        // try {
                        //     const errors = JSON.parse(res.responseText).errors;
                        //     for (const fieldName in errors) {
                        //         const input = $(`#${fieldName}`);
                        //         const errorMessage = errors[fieldName][0];
                        //         input.addClass('border border-danger');
                        //         $(`.error-message-${fieldName}`).text(
                        //             errorMessage).addClass('text-danger');
                        //     }


                        // } catch (e) {
                        //     Swal.fire({
                        //         title: "Error",
                        //         text: "An error occurred in the system. Please try again later.",
                        //         icon: "error",
                        //         onClose: function() {
                        //             $('#modal-create').modal('hide')
                        //         }
                        //     });
                        // }
                    }
                })

            });

        })

        function showFaq() {
            const columns = [{
                    data: "pertanyaan",
                },
                {
                    data: "jawaban",
                },
                {
                    render: function(data, type, full, row) {
                        return `
                    <button onclick="editFaq(${full.id})" class="btn bg-warning text-light">Edit</button>
                    <button onclick="deleteFaq(${full.id})" class="btn bg-danger text-light">Delete</button>
                    `;
                    }
                },
            ];

            $('#faq-datatable').DataTable({
                scrollCollapse: true,
                destroy: true,
                autoWidth: false,
                responsive: true,
                searching: true,
                bLengthChange: true,
                bPaginate: true,
                bInfo: true,
                ajax: {
                    url: "{{ route('admin.faq.index') }}",
                    // data: filterData
                },
                columns: columns,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            });
        }


        function editFaq(id) {
            var baseUrl = "{{ url('/') }}";
            var editUrl = baseUrl + `/admin/faq/${id}/edit`;

            $.ajax({
                url: editUrl,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('#modal-content-edit').html(response)
                    $('#modal-edit').modal('show')
                },
                error: function(res) {
                    // Swal.fire({
                    //     title: "Error",
                    //     text: "An error occurred in the system. Please try again later.",
                    //     icon: "error",
                    // });
                }
            })
        }

        function deleteFaq(id) {
            var baseUrl = "{{ url('/') }}";
            var deleteUrl = baseUrl + `/admin/faq/${id}`;

            $.ajax({
                url: deleteUrl,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
                    //     text: "Data deleted successfully!",
                    //     icon: "success",
                    // });

                    showFaq()
                },
                error: function(res) {
                    // Swal.close();
                    // Swal.fire({
                    //     title: "Error",
                    //     text: "An error occurred in the system. Please try again later.",
                    //     icon: "error",
                    // });
                }
            })
        }
    </script>
@endpush
