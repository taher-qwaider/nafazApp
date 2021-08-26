@extends('cms.parent')

@section('title','تعديل الموقع')
@section('page-name','تعديل الموقع')
@section('main-page','الرئيسية')
@section('sub-page','تعديل ')

@section('styles')

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
                            <h3 class="card-title">تعديل الموقع</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_slider" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">الإسم</label>
                                    <input type="text" class="form-control" id="name" value="{{ $socialMedia->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="link">الرابط</label>
                                    <input type="text" class="form-control" id="link" value="{{ $socialMedia->url }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performUpdate({{ $socialMedia->id }})" class="btn btn-primary">حفظ</button>
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
            axios.put('/socialMedia/'+id, {
                name:document.getElementById('name').value,
                link:document.getElementById('link').value
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
