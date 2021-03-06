@extends('cms.parent')

@section('title','إنشاء صنف')
@section('page-name','إنشاء صنف')
@section('main-page','الرئيسية')
@section('sub-page','إنشاء صنف')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

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
                            <h3 class="card-title" dir="rtl">إنشاء صنف</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_category" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">العنوان</label>
                                    <input type="text" class="form-control" id="title" placeholder="أدخل العنوان">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });

    </script>
    <script>
        function performStore() {

            var formData = new FormData();
            formData.append('title', document.getElementById('title').value);

            axios.post('/panel/cms/categories', formData
            )
                .then(function (response) {
                    console.log(response);
                    showConfirm(response.data.message, true);
                    document.getElementById('create_category').reset();
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
