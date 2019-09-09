<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Mojito') }}</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/css/skins/_all-skins.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="/css/main.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Favicons -->
    @mojitoFavicons

    @yield('head')
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper" style="height: auto; min-height: 100%;">
        @include('admin.shared.main-header')

        @include('admin.shared.sidemenu')

        <div class="content-wrapper">
            <div class="row">
                <div class="col-xs-6">
                    <section class="content-header">
                      <h1>
                        @yield('title')
                        <small>@yield('title.description')</small>
                      </h1>
                    </section>
                </div>
                <div class="col-xs-6">
                    @yield('buttons')
                </div>
            </div>
            <section class="content">
                @include('admin.shared.validations')
                @yield('content')
            </section>
        </div>

    </div>

    <!-- jQuery 3 -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- Cookie -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.min.js"></script>
    <!-- Admin App -->
    <script src="/js/admin.js"></script>

    @yield('footer')
</body>
</html>
