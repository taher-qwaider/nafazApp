<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>نفاذ | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">

    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav mr-auto-navbav">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
{{--          <span class="badge badge-danger navbar-badge">3</span>--}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
{{--          <span class="badge badge-warning navbar-badge">15</span>--}}
        </a>

      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('cms/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">نفاذ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/'.\Illuminate\Support\Facades\Auth::user()->image->path) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                الرئيسية
              </p>
            </a>
          </li>
            <li class="nav-header">المستخدمين</li>
            @canany(['read-users', 'create-users'])
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <p>
                        المستخدمين
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('read-users')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>عرض</p>
                            </a>
                        </li>
                    @endcan
                    @can('create-users')
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>إنشاء</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            <li class="nav-header">لوحة التحكم</li>
            @canany(['read-sliders', 'create-sliders'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list-ul"></i>
                        <p>
                            السلايدر
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                <ul class="nav nav-treeview">
                    @can('read-sliders')
                        <li class="nav-item">
                            <a href="{{ route('sliders.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>عرض</p>
                            </a>
                        </li>
                    @endcan
                    @can('create-sliders')
                        <li class="nav-item">
                            <a href="{{ route('sliders.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>إنشاء</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            @canany(['read-settings', 'create-settings'])
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <p>
                        إعدادات
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-list-ul"></i>
                            <p>
                                من نحن
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('settings.index', 'about_us') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>عرض</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('setting.create', 'about_us') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>إنشاء</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-phone-square-alt"></i>
                            <p>
                                اتصل بنا
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('settings.index', 'call_us') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>عرض</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('setting.create', 'call_us') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>إنشاء</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings.index', 'maps') }}" class="nav-link">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>الموقع</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logo.edit') }}" class="nav-link">
                            <i class="fab fa-joomla"></i>
                            <p>شعار الموقع</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endcanany
            @canany(['read-services', 'create-services'])
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fab fa-usps"></i>
                    <p>
                        خدمات
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('read-services')
                        <li class="nav-item">
                            <a href="{{ route('services.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>عرض</p>
                            </a>
                        </li>
                    @endcan
                    @can('create-services')
                        <li class="nav-item">
                            <a href="{{ route('services.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>إنشاء</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            @canany(['read-categories', 'create-categories'])
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-layer-group"></i>
                    <p>
                        الأصناف
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('read-categories')
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>عرض</p>
                            </a>
                        </li>
                    @endcan
                    @can('create-categories')
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>إنشاء</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            @canany(['read-categories', 'create-categories'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-check-square"></i>
                        <p>
                            الأعمال
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read-jobs')
                            <li class="nav-item">
                                <a href="{{ route('jobs.index') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>عرض</p>
                                </a>
                            </li>
                        @endcan
                        @can('create-jobs')
                            <li class="nav-item">
                                <a href="{{ route('jobs.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>إنشاء</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['read-opinions', 'create-opinions'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-handshake"></i>
                        <p>
                            آراء العملاء
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read-opinions')
                            <li class="nav-item">
                                <a href="{{ route('opinions.index') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>عرض</p>
                                </a>
                            </li>
                        @endcan
                        @can('create-opinions')
                            <li class="nav-item">
                                <a href="{{ route('opinions.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>إنشاء</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['read-blogs', 'create-blogs'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-address-card"></i>
                        <p>
                            المدونات
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read-blogs')
                            <li class="nav-item">
                                <a href="{{ route('blogs.index') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>عرض</p>
                                </a>
                            </li>
                        @endcan
                        @can('create-blogs')
                            <li class="nav-item">
                                <a href="{{ route('blogs.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>إنشاء</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['read-social-media', 'create-social-media'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-share"></i>
                        <p>
                            مواقع التواص الجتماعي
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read-social-media')
                            <li class="nav-item">
                                <a href="{{ route('socialMedia.index') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>عرض</p>
                                </a>
                            </li>
                        @endcan
                        @can('create-social-media')
                            <li class="nav-item">
                                <a href="{{ route('socialMedia.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>إنشاء</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany


            <li class="nav-header">الصلاحيات</li>
            @canany(['read-permissions', 'create-permissions'])
                <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-list-ul"></i>
                    <p>
                        الصلاحيات
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('read-permissions')
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>عرض</p>
                            </a>
                        </li>
                    @endcan
                    @can('create-permissions')
                        <li class="nav-item">
                            <a href="{{ route('permissions.create') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>إنشاء</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            @endcanany
            @canany(['read-roles', 'create-roles'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list-ul"></i>
                        <p>
                            رول
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('read-roles')
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>عرض</p>
                                </a>
                            </li>
                        @endcan
                        @can('create-roles')
                            <li class="nav-item">
                                <a href="{{ route('roles.create') }}" class="nav-link">
                                    <i class="fas fa-plus nav-icon"></i>
                                    <p>إنشاء</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            <li class="nav-header">إعدادات</li>
            <li class="nav-item">
                <a href="{{ route('updateProfile', \Illuminate\Support\Facades\Auth::user()->id) }}" class="nav-link">
                    <i class="fas fa-user-alt"></i>
                    <p>
                        الملف الشخصي
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        تسجيل خروج
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('page-name')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">@yield('main-page')</a></li>
              <li class="breadcrumb-item active">@yield('sub-page')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
{{--<script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>--}}
<!-- Sparkline -->
{{--<script src="{{ asset('cms/plugins/sparklines/sparkline.js') }}"></script>--}}
<!-- JQVMap -->
{{--<script src="{{ asset('cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('cms/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>--}}
<!-- jQuery Knob Chart -->
<script src="{{ asset('cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('cms/plugins/moment/moment.min.js') }}"></script>
{{--<script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
{{--<script src="{{ asset('cms/plugins/summernote/summernote-bs4.min.js') }}"></script>--}}
<!-- overlayScrollbars -->
<script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('cms/dist/js/demo.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>

@yield('scripts')
</body>
</html>
