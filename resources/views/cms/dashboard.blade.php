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
                        <h3 class="card-title float-left" id="chat_box_title">الرسائل</h3>

                        <div class="card-tools float-right">
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
                                            <a href="#" onclick="reciverUser({{ $user->id }})" id="{{ $user->id }}">
                                                <img class="contacts-list-img float-left mr-2" src="{{ asset('storage/'. $user->image->path ) }}">
                                                <div class="contacts-list-info">
                                                    @if($user->isActive)
                                                        <span class="contacts-list-name">{{ $user->name }}</span>
                                                        <i class="fas fa-circle" style="color: blue;"></i>
                                                        <span class="contacts-list-msg">متصل </span>
                                                    @else
                                                        <span class="contacts-list-name">{{ $user->name }}</span>
                                                        <i class="fas fa-circle" style="color: darkred;"></i>
                                                        <span class="contacts-list-msg">متصل </span>
                                                    @endif
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
        var resiver_user = null;
        var lastMessageId = null;
        function reciverUser(id){
            @foreach($users as $user)
                var userId = {!! $user->id !!};
                if (id == userId){
                    document.getElementById('chat_box_title').innerHTML = '{!! $user->name !!}';
                    resiver_user = {!! json_encode($user) !!};
                    firebase.database().ref('chats').limitToLast(20).on('value', function (snapshot) {
                        document.getElementById('messages').innerHTML = "";
                        var value = snapshot.val();
                        $.each(value, function (index, value) {
                           if ((value['reciver_id'] === {!! $user->id !!} &&  value['sender_id'] === {!! \Illuminate\Support\Facades\Auth::user()->id !!})
                               || (value['reciver_id'] === {!! \Illuminate\Support\Facades\Auth::user()->id !!} && value['sender_id'] === {!! $user->id !!}))
                           {
                               if (value['sender_id'] === {{ \Illuminate\Support\Facades\Auth::user()->id }}) {

                                   if (value['reciverIsRead'] == 1){
                                       $("#messages").append(getHtml('left', value['message'], null, null, true));
                                   }else{
                                       $("#messages").append(getHtml('left', value['message'], null, null, false));
                                   }

                               }else{
                                   $("#messages").append(getHtml('right', value['message'], '{!! $user->name !!}', '{!! $user->image->path !!}'));
                                   if (value['reciverIsRead'] == 0){
                                       var data = {
                                           reciverIsRead:1,
                                           reciver_read_at:'{{ now() }}'
                                       };
                                       firebase.database().ref('chats/'+index).update(data);
                                   }
                               }
                           }
                           lastMessageId =index;
                        });
                        document.getElementById('messages').scrollTop =document.getElementById('messages').scrollHeight;
                    });
                }
            @endforeach
        }
        firebase.database().ref('chats/').limitToLast(1).on('child_added', function (snapshot) {
            var value = snapshot.val();
            if (resiver_user){
                console.log(snapshot.key);
                console.log(value);
                if ((value['reciver_id'] === resiver_user.id &&  value['sender_id'] === {!! \Illuminate\Support\Facades\Auth::user()->id !!})
                    || (value['reciver_id'] === {!! \Illuminate\Support\Facades\Auth::user()->id !!} && value['sender_id'] === resiver_user.id))
                {

                    document.getElementById('messages').scrollTop =document.getElementById('messages').scrollHeight;
                    const music = new Audio('{{ asset('cms/audio/audio.ogg') }}');
                    music.play();
                }
            }
        });

        $('#sendMessage').on('click', function () {
            if (resiver_user){
                var message = document.getElementById('message').value;
                var sender_id = {!! \Illuminate\Support\Facades\Auth::user()->id !!};
                var sender_user_type = 'user';
                var reciver_user_type = 'user';
                var created_at = '{{ now() }}';
                var lastIndex =0;
                firebase.database().ref('chats').limitToLast(1).on('value', function(sna){
                    var value = sna.val();
                    $.each(value, function (index, value) {
                        lastIndex = parseInt(index) + 1;
                    })
                });
                firebase.database().ref('chats/'+lastIndex).set({
                    message: message,
                    sender_id: sender_id,
                    reciver_id: resiver_user['id'],
                    reciver_user_type:reciver_user_type,
                    sender_user_type:sender_user_type,
                    created_at:created_at,
                    reciverIsRead:0,
                    reciver_read_at:''
                });
            }
            $("#message").val("");
        });
        function getHtml(dir, message, name=null, path=null, isRead=false){
            var textHtml = "";
            switch (dir) {
                case 'right':
                    textHtml +="<div class='direct-chat-msg right'><div class='direct-chat-infos clearfix'><span class='direct-chat-name float-left'>";
                    textHtml += name+"</div> <img class='direct-chat-img' src='/storage/"+path+"' alt='message user image'><div class='direct-chat-text' style='width: fit-content;'>"
                    +message+"</div></div>"
                    break;
                case 'left':
                    textHtml +="<div class='direct-chat-msg'><div class='direct-chat-infos clearfix'>";
                    if (isRead){
                        textHtml += "<span class='direct-chat-timestamp float-right'><small style='color: #016bc6'><i class='fas fa-check-double'></i></small></span>";
                    }else{
                        textHtml += "<span class='direct-chat-timestamp float-right'><small><i class='fas fa-check'></i></small></span>";
                    }
                    textHtml += "</div>";
                    textHtml +="<div class='direct-chat-text ml-0' style='float: left'>"+message+"</div></div>";
                    break;
            }
            return textHtml;
        }
    </script>
@endsection
