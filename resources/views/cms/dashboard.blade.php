@extends('cms.parent')

@section('title','الرئيسية')
@section('page-name','الرئيسية')
@section('main-page','')
@section('sub-page','')

@section('styles')
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">سلايدر</span>
                <span class="info-box-number">
                    {{ $slider_count }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">أراء العملاء</span>
                <span class="info-box-number">{{ $reviws }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">أعمال</span>
                <span class="info-box-number">{{ $jobs }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">المستخدمين</span>
                <span class="info-box-number">{{ $users->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-10">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title">Direct Chat</h3>

                        <div class="card-tools">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">3</span>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                <i class="fas fa-comments"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages" id="messages">

                        </div>
                        <div class="direct-chat-contacts">
                            <ul class="contacts-list">
                                @foreach($users as $user)
                                    @if($user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                        <li>
                                            <a href="#" onclick="reciverUser({{ $user->id }})">
                                                <img class="contacts-list-img" src="{{ asset('storage/'. $user->image->path ) }}">
                                                <div class="contacts-list-info">
                                                    <span class="contacts-list-name">{{ $user->name }}</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <!-- /.contacts-list -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" id="message" placeholder="أدخل الرسالة" class="form-control">
                            <span class="input-group-append">
                                <button type="button" id="sendMessage" class="btn btn-warning">إرسال</button>
                            </span>
                        </div>
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
        </div>
        <!-- /.row -->

        <!-- Main row -->

        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <!-- overlayScrollbars -->
    <script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('cms/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('cms/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>

    <!-- PAGE SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: 'AIzaSyC_qaCjN-Lrgq3NFwwA5DgTjOUTWUdYM18',
            authDomain: 'nafazapp-b0544.firebaseapp.com',
            databaseURL: 'https://nafazapp-b0544-default-rtdb.firebaseio.com/',
            projectId: 'nafazapp-b0544',
            storageBucket: 'nafazapp-b0544.appspot.com',
            messagingSenderId: '847453852775',
            appId: '1:847453852775:web:81021ec7072b68aa7b30c2',
            measurementId: 'G-measurement-id',
        };
        firebase.initializeApp(firebaseConfig);
        var database = firebase.database();
        var lastIndex = 0;
        var resiver_id = 0;
        function reciverUser(id){
            @foreach($users as $user)
            var userId = {!! $user->id !!};
            if (id == userId){
                firebase.database().ref('/chats').on('value', function (snapshot) {
                    document.getElementById('messages').innerHTML = "";
                    var value = snapshot.val();
                    $.each(value, function (index, value) {
                       if (value['reciver_id'] == {!! $user->id !!} || value['sender_id'] == {!! $user->id !!}){
                           if (value['sender_id'] == {{ \Illuminate\Support\Facades\Auth::user()->id }}) {
                               $("#messages").append("<div class='direct-chat-msg'><div class='direct-chat-infos clearfix'><span class='direct-chat-name float-left'>"
                                   +'{{ \Illuminate\Support\Facades\Auth::user()->name }}'+"</div> <img class='direct-chat-img' src='{{ asset('storage/'.\Illuminate\Support\Facades\Auth::user()->image->path) }}' alt='message user image'><div class='direct-chat-text'>"
                                   +value['message']+"<div><div>");
                               resiver_id = value['reciver_id'];
                           }else{
                               $("#messages").append("<div class='direct-chat-msg right'><div class='direct-chat-infos clearfix'><span class='direct-chat-name float-left'>"
                                   +'{{ $user->name }}'+"</div> <img class='direct-chat-img' src='{{ asset('storage/'.$user->image->path) }}' alt='message user image'><div class='direct-chat-text'>"
                                   +value['message']+"<div><div>");
                           }
                           lastIndex = index;
                       }
                    });
                });
            }
            @endforeach
        }

        $('#sendMessage').on('click', function () {
            var message = document.getElementById('message').value;
            var sender_id = {!! \Illuminate\Support\Facades\Auth::user()->id !!};
            var userID = lastIndex + 1;
            firebase.database().ref('/chats/' + userID).set({
                message: message,
                sender_id: sender_id,
                reciver_id: resiver_id,
            });
            // Reassign lastID value
            lastIndex = userID;
            $("#message").val("");
        });
    </script>
@endsection
