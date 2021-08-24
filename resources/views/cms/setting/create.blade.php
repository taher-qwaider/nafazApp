@extends('cms.parent1')

@section('title','إنشاء ')
@section('page-name','إنشاء ')
@section('main-page','الرئيسية')
@section('sub-page','إنشاء ')

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
                            <h3 class="card-title">من نحن</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_setting" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="key">العنوان</label>
                                    <input type="text" class="form-control" id="key" placeholder="أدخل العنوان">
                                </div>
                                <div class="form-group">
                                    <label for="value">القيمة</label>
                                    <input type="text" class="form-control" id="value" placeholder="أدخل القيمة">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script>
        function performStore() {

            var formData = new FormData();
            formData.append('key', document.getElementById('key').value);
            formData.append('value', document.getElementById('value').value);

            axios.post('/settings/'+'{{$subject}}', formData
            )
                .then(function (response) {
                    console.log(response);
                    showConfirm(response.data.message, true);
                    document.getElementById('create_slider').reset();
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
