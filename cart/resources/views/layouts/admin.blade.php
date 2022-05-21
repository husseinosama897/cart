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
    <link href="{{ asset('/admin/assets/plugins/iconfonts/icons.css') }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('/admin/assets/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/treeview-prism/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/treeview-prism/prism-treeview.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/css/themes/all-themes.css') }}" rel="stylesheet"/>
    @yield('style')

</head>
<body class="theme-blush">
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
    <section>
        @include('global.sideBarAdmin')
    </section>
    <section class="content home">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    @include('global.navAdmin')
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Jquery Core Js -->
    <script src="{{asset('admin/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{asset('admin/assets/bundles/morphingsearchscripts.bundle.js')}}"></script> <!-- morphing search Js -->
    <script src="{{asset('admin/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{asset('admin/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
    <script src="{{asset('admin/assets/bundles/morphingscripts.bundle.js')}}"></script><!-- morphing search page js -->

    <!-- Internal Prism js-->
    <script src="{{asset('admin/assets/plugins/prism/prism.js')}}"></script>

    <!-- Treeview js-->
    <script src="{{asset('admin/assets/plugins/treeview-prism/prism.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/treeview-prism/prism-treeview.js')}}"></script>

    <!-- Perfectscroll js-->
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

    <!-- Custom js-->
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/menuspy.min.js.js')}}"></script>
</body>
</html>
