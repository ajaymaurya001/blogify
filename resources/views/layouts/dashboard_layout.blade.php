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
    <link href="{{ asset('admin_assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            color: #585858;
        }

        form {
            color: #2a2a2a;
        }

        a.return_btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .rounded-circle {
            background: #fff;
            padding: 4px;
        }
    </style>

</head>

<body>

    @auth
        @if (auth()->user()->is_admin)
            {{-- preloader code  --}}
            <div id="preloader">
                <div class="sk-three-bounce">
                    <div class="sk-child sk-bounce1"></div>
                    <div class="sk-child sk-bounce2"></div>
                    <div class="sk-child sk-bounce3"></div>
                </div>
            </div>

            <div id="main-wrapper">

                {{-- navbar code  --}}
                <div class="nav-header">
                    <a href="{{ route('home') }}" class="brand-logo p-0">
                        <img class="brand-title m-0 mx-auto" src="{{ asset('assets/img/blogify-logo.webp') }}"
                            alt="" style="max-width:150px;">
                    </a>

                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="line"></span><span class="line"></span><span class="line"></span>
                        </div>
                    </div>
                </div>



                {{-- header code  --}}
                <div class="header">
                    <div class="header-content">
                        <nav class="navbar navbar-expand">
                            <div class="collapse navbar-collapse justify-content-between">
                                <div class="header-left">
                                    {{-- <div class="search_bar dropdown">
                                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                            <i class="mdi mdi-magnify"></i>
                                        </span>
                                        <div class="dropdown-menu p-0 m-0">
                                            <form>
                                                <input class="form-control" type="search" placeholder="Search"
                                                    aria-label="Search">
                                            </form>
                                        </div>
                                    </div> --}}
                                </div>

                                <ul class="navbar-nav header-right">

                                    <li class="nav-item dropdown header-profile">
                                        <a href="{{ route('home') }}" class="dropdown-item border">
                                            <i class="fa fa-home"></i>
                                            <span class="ml-2">Return Home</span>
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown notification_dropdown">
                                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                            <i class="mdi mdi-bell"></i>
                                            <div class="pulse-css"></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="list-unstyled">
                                                <li class="media dropdown-item">
                                                    <span class="success"><i class="ti-user"></i></span>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                                Successfully
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <span class="notify-time">3:20 am</span>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <span class="primary"><i class="ti-shopping-cart"></i></span>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                        </a>
                                                    </div>
                                                    <span class="notify-time">3:20 am</span>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <span class="danger"><i class="ti-bookmark"></i></span>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                                unsolved.
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <span class="notify-time">3:20 am</span>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <span class="primary"><i class="ti-heart"></i></span>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                        </a>
                                                    </div>
                                                    <span class="notify-time">3:20 am</span>
                                                </li>
                                                <li class="media dropdown-item">
                                                    <span class="success"><i class="ti-image"></i></span>
                                                    <div class="media-body">
                                                        <a href="#">
                                                            <p><strong> James.</strong> has added a<strong>customer</strong>
                                                                Successfully
                                                            </p>
                                                        </a>
                                                    </div>
                                                    <span class="notify-time">3:20 am</span>
                                                </li>
                                            </ul>
                                            <a class="all-notification" href="#">See all notifications <i
                                                    class="ti-arrow-right"></i></a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown header-profile">
                                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                            <i class="mdi mdi-account"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="./app-profile.html" class="dropdown-item">
                                                <i class="icon-user"></i>
                                                <span class="ml-2">Profile </span>
                                            </a>
                                            <a href="./email-inbox.html" class="dropdown-item">
                                                <i class="icon-envelope-open"></i>
                                                <span class="ml-2">Inbox </span>
                                            </a>
                                            <x-logout_btn />
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>


                {{-- sidebar code  --}}
                <div class="quixnav">
                    <div class="quixnav-scroll">
                        <ul class="metismenu" id="menu">
                            <li class="nav-label first">Main Menu</li>

                            <li class=""><a href="{{ route('admin_dashboard') }}" aria-expanded="false"><i
                                        class="icon icon-world-2"></i><span class="nav-text">Dashboard</span></a>
                            </li>

                            <li><a class="has-arrow" href="#" aria-expanded="false"><i
                                        class="fa fa-user"></i><span class="nav-text">Users</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{ route('admin.all_user') }}">All User</a></li>
                                    <li><a href="{{ route('admin.add_user') }}">Add User</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="#" aria-expanded="false"><i
                                        class="fa fa-book"></i><span class="nav-text">Blogs</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="./app-profile.html">All Blog</a></li>
                                    <li><a href="./app-calender.html">Add Blog</a></li>
                                </ul>
                            </li>

                            <li><a class="has-arrow" href="#" aria-expanded="false"><i
                                        class="fa fa-book"></i><span class="nav-text">Catagory</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="./app-profile.html">All Catagory</a></li>
                                    <li><a href="./app-calender.html">Add New Catagory</a></li>
                                </ul>
                            </li>

                            <li><a class="" href="#" aria-expanded="false"><i
                                        class="fa fa-user-circle"></i><span class="nav-text">My Profile</span></a>
                            </li>
                        </ul>
                    </div>


                </div>



                <div class="content-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
        @endif
    @endauth



    @yield('content')



    @auth
        @if (auth()->user()->is_admin)
            </div>
            </div>
            </div>
            </div>
            {{-- footer code  --}}
            <div class="footer">
                <div class="copyright">
                    <p>Copyright © Designed &amp; Developed by <a href="{{ route('home') }}">Blogify</a> 2025</p>
                </div>
            </div>

            </div>
        @endif
    @endauth



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
    <script src="{{ asset('admin_assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/plugins-init/datatables.init.js') }}"></script>

</body>

</html>
