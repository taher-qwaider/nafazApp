@extends('cms.parent')

@section('title','تحديث أراء')
@section('page-name','تحديث أراء')
@section('main-page','الرئيسية')
@section('sub-page','تحديث أراء')

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
                            <h3 class="card-title" dir="rtl">تحديث أراء</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" id="create_category" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">إسم العميل</label>
                                    <input type="text" class="form-control" id="name" value="{{ $opinion->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="profession">المهنة</label>
                                    <input type="text" class="form-control" id="profession" value="{{ $opinion->profession }}">
                                </div>
                                <div class="form-group">
                                    <label for="text">الرئي</label>
                                    <textarea class="form-control" id="text">{{ $opinion->text }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="rate">تقييم :</label>
                                    <input type="number" min="0" max="5" value="{{ $opinion->rate }}" id="rate">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" onclick="performStore({{ $opinion->id }})" class="btn btn-primary">حفظ</button>
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
        function performStore(id) {

            axios.put('/opinions/'+id, {
                name:document.getElementById('name').value,
                profession:document.getElementById('profession').value,
                text:document.getElementById('text').value,
                rate:document.getElementById('rate').value
            })
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
