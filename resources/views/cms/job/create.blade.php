@extends('cms.parent')

@section('title','إنشاء عمل')
@section('page-name','إنشاء عمل')
@section('main-page','الرئيسية')
@section('sub-page','إنشاء عمل')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">إنشاء عمل</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_job" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>الصنف :</label>
                                    <select class="form-control categories" id="category" style="width: 100%;">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="desc">الوصف</label>
                                    <textarea type="text" class="form-control" id="desc" placeholder="أدخل الوصف"></textarea>
                                </div>
                                <div class="container">
                                    <h2 style="margin-top: 12px;" class="alert alert-success text-center">Album</h2>
                                    <div class="row" style="clear: both;margin-top: 18px;">
                                        <div class="col-12">
                                            <div class="dropzone" id="file-dropzone"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performStore()" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('cms/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.categories').select2({
            theme: 'bootstrap4'
        });
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
        window.imagesIds = [];
        Dropzone.options.fileDropzone = {
            url: '{{ route('images.store') }}',
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            maxFilesize: 8,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            removedfile: function(file)
            {
                var name = file.upload.filename;
                $.ajax({
                    type: 'delete',
                    url: '',
                    data: { "_token": "{{ csrf_token() }}", name: name},
                    success: function (data){
                        window.images.remove(file.id);
                        console.log("File has been successfully removed!!");
                        showConfirm(data.message, true);
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                console.log(file);
                window.imagesIds.push(response.id);
                showConfirm(response.message, true);
            },
        }
    </script>
    <script>
        function performStore() {

            var formData = new FormData();
            formData.append('category_id', document.getElementById('category').value);
            formData.append('desc', document.getElementById('desc').value);
            for (var i =0; i<window.imagesIds.length; i++){
                formData.append('images['+i+']', window.imagesIds[i]);
            }
            axios.post('/jobs', formData
            )
                .then(function (response) {
                    console.log(response);
                    showConfirm(response.data.message, true);
                    document.getElementById('create_job').reset();
                })
                .catch(function (error) {
                    console.log(error);
                    showConfirm(error.response.data.message, false);
                });
        }

        function showConfirm(message, status) {
            if (status) {
                toastr.success(message);
            } else {
                toastr.error(message);
            }
        }

    </script>

    @endsection
