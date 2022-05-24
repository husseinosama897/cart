<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ asset('/admin/assets/images/favicon.ico')}}" type="image/x-icon">
    <link href="{{ asset('/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Custom Css -->
    <link href="{{ asset('/admin/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/css/dark-style.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/css/skin-modes.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/iconfonts/icons.css') }}" rel="stylesheet" />

    
    @yield('style')

</head>
<body class="app sidebar-mini light-mode rtl">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blush">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Page Loader -->
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Sidebarover lay -->
    <div class="sidebar-overlay" data-toggle="sidebar"></div>
    
    <!-- #Top Bar -->
        <!-- PAGE -->
        <div class="page">
            <div class="page-main">
                @include('global.navAdmin')
                @include('global.sideBarAdmin')
                <!--app-content open-->
                <div class="main-content app-content mt-0">
                    <div class="side-app">

                        <!-- CONTAINER -->
                        <div class="main-container container-fluid">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Jquery Core Js -->
    <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script> 
    <script src="{{asset('admin/assets/plugins/bootstrap/js/popper.min.js')}}"></script> 
    <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script> 
    <script src="{{asset('admin/assets/js/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/circle-progress.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/charts-c3/d3.v5.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/charts-c3/c3-chart.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/sidemenu/sidemenu.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/sidebar/sidebar.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/p-scroll/pscroll.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/p-scroll/pscroll-1.js')}}"></script>

    <script src="{{asset('admin/assets/js/themeColors.js')}}"></script>

    <script src="{{asset('admin/assets/js/sticky.js')}}"></script>

    <script src="{{asset('admin/assets/js/custom.js')}}"></script>

    @yield('script')
</body>
</html>
