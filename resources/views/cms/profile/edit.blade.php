@extends('cms.parent')

@section('title','تعديل الملف الشخصي')
@section('page-name','تعديل الملف الشخصي')
@section('main-page','الرئيسية')
@section('sub-page','تعديل الملف الشخصي')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.css') }}">

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
                            <h3 class="card-title">تعديل الملف الشخصي</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_slider" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">الإسم</label>
                                    <input type="text" class="form-control" id="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">الإيميل</label>
                                    <input type="text" class="form-control" id="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="image">صورة</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image">إختر صورة</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{ $user->id }})" class="btn btn-primary">حفظ</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });

    </script>
    <script>
        function performUpdate(id) {

            var formData = new FormData();
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('image', document.getElementById('image').files[0]);

            axios.post('/user/'+id+'/update', formData
            )
                .then(function (response) {
                    console.log(response);
                    showConfirm(response.data.message, true);

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
