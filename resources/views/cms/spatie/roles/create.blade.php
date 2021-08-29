@extends('cms.parent')

@section('title','إنشاء روول')
@section('page-name','إنشاء روول')
@section('main-page','الرئيسية')
@section('sub-page','إنشاء روول')

@section('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">إنشاء روول</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="create_form">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label>Guards</label>
                                <select class="form-control guards" id="guard" style="width: 100%;">
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">الإسم</label>
                                <input type="text" class="form-control" id="name" placeholder="أدخل الإسم">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="button" onclick="performStore()" class="btn btn-primary">Save</button>
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
<!-- Select2 -->
<script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/crud.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

    //Initialize Select2 Elements
    $('.guards').select2({
        theme: 'bootstrap4'
    })
</script>

<script>
    function performStore(){
        let data = {
            guard: document.getElementById ('guard').value,
            name: document.getElementById('name').value,
        }
        store('/panel/roles', data)
    }
</script>

@endsection
