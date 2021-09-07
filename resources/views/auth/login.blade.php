<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> نفاذ  | تسجيل الدخول</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>نفاذ</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"></p>

      <form method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="name" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                تذكرني
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="button" onclick="performLogin()" class="btn btn-primary">سجل الدخول</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

{{--      <div class="social-auth-links text-center mb-3">--}}
{{--        <p>- OR -</p>--}}
{{--        <a href="#" class="btn btn-block btn-primary">--}}
{{--          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--        </a>--}}
{{--        <a href="#" class="btn btn-block btn-danger">--}}
{{--          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
{{--        </a>--}}
{{--      </div>--}}
      <!-- /.social-auth-links -->

      <p class="mb-1">
{{--        <a href="forgot-password.html">I forgot my password</a>--}}
      </p>
      <p class="mb-0">
{{--        <a href="register.html" class="text-center">Register a new membership</a>--}}
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
{{--<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>--}}
{{--<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}
{{--<script>--}}
{{--    // Initialize Firebase--}}
{{--    var firebaseConfig = {--}}
{{--        apiKey: "AIzaSyC_qaCjN-Lrgq3NFwwA5DgTjOUTWUdYM18",--}}
{{--        authDomain: "nafazapp-b0544.firebaseapp.com",--}}
{{--        projectId: "nafazapp-b0544",--}}
{{--        storageBucket: "nafazapp-b0544.appspot.com",--}}
{{--        messagingSenderId: "847453852775",--}}
{{--        appId: "1:847453852775:web:81021ec7072b68aa7b30c2"--}}
{{--    };--}}
{{--    firebase.initializeApp(config);--}}
{{--    var facebookProvider = new firebase.auth.FacebookAuthProvider();--}}
{{--    var googleProvider = new firebase.auth.GoogleAuthProvider();--}}
{{--    var facebookCallbackLink = '/login/facebook/callback';--}}
{{--    var googleCallbackLink = '/login/google/callback';--}}
{{--    async function socialSignin(provider) {--}}
{{--        var socialProvider = null;--}}
{{--        if (provider == "facebook") {--}}
{{--            socialProvider = facebookProvider;--}}
{{--            document.getElementById('social-login-form').action = facebookCallbackLink;--}}
{{--        } else if (provider == "google") {--}}
{{--            socialProvider = googleProvider;--}}
{{--            document.getElementById('social-login-form').action = googleCallbackLink;--}}
{{--        } else {--}}
{{--            return;--}}
{{--        }--}}
{{--        firebase.auth().signInWithPopup(socialProvider).then(function(result) {--}}
{{--            result.user.getIdToken().then(function(result) {--}}
{{--                document.getElementById('social-login-tokenId').value = result;--}}
{{--                document.getElementById('social-login-form').submit();--}}
{{--            });--}}
{{--        }).catch(function(error) {--}}
{{--            // do error handling--}}
{{--            console.log(error);--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
<script>
    function performLogin(){
        formData = new FormData();
        formData.append('email', document.getElementById('name').value);
        formData.append('password', document.getElementById('password').value);
        console.log(formData.values());
        axios.post('/panel/cms/login', formData)
            .then(function (response) {
                console.log(response);
                showConfirm(response.data.massage, true);
                window.location.href = '{{ route('dashboard') }}';
            })
            .catch(function (error) {
                console.log(error.response);
                showConfirm(error.response.data.massage, false);
            });
    }
    function showConfirm(massege, status){
        if(status){
            toastr.success(massege);
        }else{
            toastr.error(massege);
        }
    }
</script>
</body>
</html>
