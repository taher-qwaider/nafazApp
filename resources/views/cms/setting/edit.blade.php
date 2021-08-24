@extends('cms.parent1')

@section('title','تعديل سلايدر')
@section('page-name','تعديل سلايدر')
@section('main-page','الرئيسية')
@section('sub-page','تعديل سلايدر')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

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
                            <h3 class="card-title">تعديل سلايدر</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="key">العنوان</label>
                                    <input type="text" class="form-control" id="key" value="{{ $setting->key }}">
                                </div>
                                <div class="form-group">
                                    <label for="value">القيمة</label>
                                    <input type="text" class="form-control" id="value" value="{{ $setting->value }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{ $setting->id }})" class="btn btn-primary">حفظ</button>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>

    <script>
        function performUpdate(id) {
            axios.put('/settings/'+id, {
                key : document.getElementById('key').value,
                value : document.getElementById('value').value
            })
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
