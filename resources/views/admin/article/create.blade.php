@extends('layouts.admin')
@section('title', 'Create Articles')

@push('styles')
@endpush

@section('content')
    <div class="page-heading">
        <h3>Create Article</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{ route('cms.create') }}"><button class="btn btn-primary">Create</button></a> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" id="form_article">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-select" id="category" name="category">
                                        <option disabled selected></option>
                                        <option value="Diabetes">Diabetes</option>
                                        <option value="Cancer">Cancer</option>
                                        <option value="Monkey Pox">Monkey Pox</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="titile">Title</label>
                                    <input type="text" id="titile" class="form-control" placeholder=""
                                        name="title">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" id="author" class="form-control" placeholder=""
                                        name="author">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="publication_date">Publication Date</label>
                                    <input type="date" id="publication_date" class="form-control"
                                        name="publication_date">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" id="thumbnail" class="form-control"name="thumbnail" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="youtube">Iframe Youtube</label>
                                    <input type="text" id="youtube" class="form-control"name="youtube" placeholder="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            showProducts();
        })

        ClassicEditor.create(document.querySelector("#description")).catch((error) => {
            console.error(error)
        })

        $('#form_article').on('submit', function(e) {
            e.preventDefault()
            var data = new FormData(this);
            ajaxRequestFormData($(this).attr('action'), "POST", data)
                .then((res) => {
                    Swal.fire({
                        title: "Sukses!",
                        text: res.message,
                        icon: "success"
                    });
                }).catch((e) => {
                    if (e.status == 400) {
                        serverSideValidation('#product_from', e.responseJSON.errors);
                    } else if (typeof(e.responseJSON.message) == 'object') {
                        let textError = '';
                        $.each(e.responseJSON.message, function(key, value) {
                            textError += `${value}<br>`
                        });
                        Swal.fire({
                            title: "Gagal!",
                            text: textError,
                            icon: "error"
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal!",
                            text: e.responseJSON.message,
                            icon: "error"
                        });
                    }
                });
        });
    </script>
@endpush