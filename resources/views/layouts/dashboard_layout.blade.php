<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Blogify')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_assets/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('admin_assets/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">

    <style>
        form {
            color: #2a2a2a;
        }

        a.return_btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
    </style>

</head>

<body>





    @yield('content')


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin_assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('admin_assets/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('admin_assets/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('admin_assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('admin_assets/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('admin_assets/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('admin_assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('admin_assets/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('admin_assets/js/dashboard/dashboard-1.js') }}"></script>

</body>

</html>
