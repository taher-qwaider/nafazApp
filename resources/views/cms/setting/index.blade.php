@extends('cms.parent')

@section('title','إعدادات')
@section('page-name',$subject)
@section('main-page','الرئيسية')
@section('sub-page',$subject)

@section('styles')
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>--}}
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $subject }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="margin-top: 20px">
                        <table class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الموضوع</th>
                                    <th>مفتاح</th>
                                    <th>القيمة</th>
                                    <th>إعدادات</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
{{--                        {{ $posts->links() }}--}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
{{--    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>--}}
<script>
    $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            @if($subject == 'about_us')
                ajax: "{{ route('settings.data', $subject) }}",
            @elseif($subject == 'call_us')
                ajax: "{{ route('settings.data', $subject) }}",
            @endif
            columns: [
                {data: 'id', name: 'id'},
                {data: 'subject', name: 'subject'},
                {data: 'key', name: 'key'},
                {data: 'value', name: 'value'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

    });

</script>
<script>
    function preformedDelete(id){
        showAlert(id);
    }
    function showAlert(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                destroy(id);
            }
        })
    }
    function destroy(id){
        axios.delete('/settings/'+id)
            .then(function (response) {
                console.log(response.data.message);
                responseAlert(response.data.message, true);
                window.location.href = '';
            })
            .catch(function (error) {
                console.log(error.response.data.message);
                responseAlert(error.response.data.message, false);
            })
    }

    function responseAlert(message, status){
        if(status){
            toastr.success(message);
        }else{
            toastr.error(message);
        }

    }
</script>
@endsection
