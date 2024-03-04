<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('backend-title') - HNW </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    
   <!-- Others -->
    <link rel="stylesheet" href="{{ asset('backend/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/jquery.toast.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap-toggle.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/css/AdminLTE.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skins/skin-green.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">

    {{-- if required --}}
    @yield('backend-page-specific-css')

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow&display=swap" rel="stylesheet">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        @include('backend.layouts.header')
        @include('backend.layouts.sidebar')
        @yield('backend-content')
        @include('backend.layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/js/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('backend/js/toastr.min.js') }}"></script>

    <script src="{{ asset('backend/js/bootstrap-toggle.min.js') }}"></script>


    <script>
        var base_url = '{{ url('/') }}';
        //active menu
        $(function() {
            /** add active class and stay opened when selected */
            var url = window.location;

            // for sidebar menu entirely but not cover treeview
            $('ul.sidebar-menu a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');

            // for treeview
            $('ul.treeview-menu a').filter(function() {
                return this.href == url;
            }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

        });
    </script>
    {{-- @include('backend.partials.toastr') --}}

    {{-- if required --}}
    @yield('backend-page-specific-js')
</body>

</html>
