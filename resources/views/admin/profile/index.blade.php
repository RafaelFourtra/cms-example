@extends('layouts.admin')
@section('title', 'Profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endpush


@section('content')
    <div class="page-heading">
        <h3>Profile</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{ route('cms.create') }}"><button class="btn btn-primary">Create</button></a> --}}
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pendidikan-tab" data-bs-toggle="tab" href="#pendidikan" role="tab"
                                aria-controls="pendidikan" aria-selected="false">Pendidikan</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pengalaman-tab" data-bs-toggle="tab" href="#pengalaman" role="tab"
                                aria-controls="pengalaman" aria-selected="false">Pengalaman</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form method="POST" enctype="multipart/form-data" id="form_profile">
                                @csrf
                                @if (isset($data))
                                    @method('put')
                                @endif
                                <div class="row mt-3">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ isset($data) ? $data->id : null }}">
                                            <label for="nama">Nama</label>
                                            <input type="text" id="nama" class="form-control" placeholder=""
                                                name="nama" value="{{ isset($data) ? $data->nama : null }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gelardepan">Gelar Depan</label>
                                            <input type="text" id="gelardepan" class="form-control" placeholder=""
                                                name="gelardepan" value="{{ isset($data) ? $data->gelardepan : null }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gelarbelakang">Gelar Belakang</label>
                                            <input type="text" id="gelarbelakang" class="form-control" placeholder=""
                                                name="gelarbelakang"
                                                value="{{ isset($data) ? $data->gelarbelakang : null }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempatlahir">Tempat Lahir</label>
                                            <input type="text" id="tempatlahir" class="form-control" placeholder=""
                                                name="tempatlahir" value="{{ isset($data) ? $data->tempatlahir : null }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tanggallahir">Tanggal lahir</label>
                                            <input type="date" id="tanggallahir" class="form-control" name="tanggallahir"
                                                value="{{ isset($data) ? $data->tanggallahir : null }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" id="foto" class="form-control" name="foto"
                                                {{ isset($data) ? '' : 'required' }}>
                                        </div>
                                    </div>
                                    @if (isset($data->foto))
                                        <div class="col-md-6 col-12">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="fotosebelumnya">Foto Sebelumnya</label><br>
                                                <img style="width: 300px"
                                                    src="{{ asset('resources/img/profile/' . $data->foto) }}">
                                                <input type="hidden" name="foto_edit" id="foto_edit"
                                                    value="{{ isset($data) ? $data->foto : '' }}">
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn {{ isset($data) ? 'btn-warning' : 'btn-primary' }} me-1 mb-1">{{ isset($data) ? 'Update' : 'Simpan' }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
                            <section class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-primary float-end"
                                            id="btn-create-pendidikan">Create</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table data-table" id="pendidikan-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Tingkat</th>
                                                        <th>Institusi</th>
                                                        <th>Tahun Masuk</th>
                                                        <th>Tahun Selesai</th>
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
                        <div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="pengalaman-tab">
                            <section class="row">
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-primary float-end"
                                            id="btn-create-pengalaman">Create</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table data-table" id="pengalaman-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>Institusi</th>
                                                        <th>Deskripsi</th>
                                                        <th>Tahun Mulai</th>
                                                        <th>Tahun Selesai</th>
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
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade text-left" id="modal-create-pendidikan" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Pendidikan</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.pendidikan.store') }}" method="POST" id="form-create-pendidikan">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tingkat">Tingkat</label>
                                    <input type="text" id="tingkat" class="form-control" placeholder=""
                                        name="tingkat">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="institusi">Institusi</label>
                                    <input type="text" id="institusi" class="form-control" placeholder=""
                                        name="institusi">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tahunmasuk">Tahun Masuk</label>
                                    <input type="date" id="tahunmasuk" class="form-control" placeholder=""
                                        name="tahunmasuk">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tahunselesai">Tahun Selesai</label>
                                    <input type="date" id="tahunselesai" class="form-control" placeholder=""
                                        name="tahunselesai">
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
    <div class="modal fade text-left" id="modal-create-pengalaman" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Pengalaman</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('admin.pengalaman.store') }}" method="POST" id="form-create-pengalaman">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="institusi">Institusi</label>
                                    <input type="text" id="institusi" class="form-control" placeholder=""
                                        name="institusi">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" id="deskripsi" class="form-control" placeholder=""
                                        name="deskripsi">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tahunmulai">Tahun Mulai</label>
                                    <input type="date" id="tahunmulai" class="form-control" placeholder=""
                                        name="tahunmulai">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="tahunselesai">Tahun Selesai</label>
                                    <input type="date" id="tahunselesai" class="form-control" placeholder=""
                                        name="tahunselesai">
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
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            showPendidikan()
            showPengalaman()
            $('#btn-create-pengalaman').click(function() {
                $('#modal-create-pengalaman').modal('show')
            })

            $('#btn-create-pendidikan').click(function() {
                $('#modal-create-pendidikan').modal('show')
            })

            $('#form_profile').on('submit', function(e) {
                e.preventDefault()

                var updateUrl =
                "{{ route('admin.profile.update', ['profile' => '__ID__']) }}"; // Placeholder
                var id = $('#id').val();

                var url = id ? updateUrl.replace('__ID__', id) : "{{ route('admin.profile.store') }}";

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
                        console.log(response);
                        window.location.href = response.redirect
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

            $('#form-create-pendidikan ').on('submit', function(e) {
                e.preventDefault()
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
                        $(this).trigger('reset')
                        $('#modal-create-pendidikan').modal('hide')
                        showPendidikan()

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

            $('#form-create-pengalaman ').on('submit', function(e) {
                e.preventDefault()
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
                        $(this).trigger('reset')
                        $('#modal-create-pengalaman').modal('hide')
                        showPengalaman()

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

        function showPendidikan() {
            const columns = [{
                    data: "tingkat",
                },
                {
                    data: "institusi",
                },
                {
                    data: "tahunmasuk",
                },
                {
                    data: "tahunselesai",
                },
                {
                    render: function(data, type, full, row) {
                        return `
                    <button onclick="editPendidikan(${full.id})" class="btn bg-warning text-light">Edit</button>
                    <button onclick="deletePendidikan(${full.id})" class="btn bg-danger text-light">Delete</button>
                    `;
                    }
                },
            ];

            $('#pendidikan-datatable').DataTable({
                scrollCollapse: true,
                destroy: true,
                autoWidth: false,
                responsive: true,
                searching: true,
                bLengthChange: true,
                bPaginate: true,
                bInfo: true,
                ajax: {
                    url: "{{ route('admin.pendidikan.index') }}",
                    // data: filterData
                },
                columns: columns,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            });
        }

        function showPengalaman() {
            const columns = [{
                    data: "institusi",
                },
                {
                    data: "deskripsi",
                },
                {
                    data: "tahunmulai",
                },
                {
                    data: "tahunselesai",
                },
                {
                    render: function(data, type, full, row) {
                        return `
                    <button onclick="editPengalaman(${full.id})" class="btn bg-warning text-light">Edit</button>
                    <button onclick="deletePengalaman(${full.id})" class="btn bg-danger text-light">Delete</button>
                    `;
                    }
                },
            ];

            $('#pengalaman-datatable').DataTable({
                scrollCollapse: true,
                destroy: true,
                autoWidth: false,
                responsive: true,
                searching: true,
                bLengthChange: true,
                bPaginate: true,
                bInfo: true,
                ajax: {
                    url: "{{ route('admin.pengalaman.index') }}",
                    // data: filterData
                },
                columns: columns,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            });
        }
    </script>
@endpush
