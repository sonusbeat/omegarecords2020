<!DOCTYPE html>
<html dir="ltr" lang="es-MX">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon icon -->
        <title>@yield('page-title', "Administración de Omega Records")</title>
        <meta name="description" content="Administraci&oacute;n de Omega Records">
        <meta name="robots" content="noindex, nofollow">
        <!-- Custom CSS -->
        <link href="{{ asset('admin/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">

            @include('admin.partials._topbar')

            @include('admin.partials._left-sidebar')

            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center">
                    Omega Records &copy {{ date('Y') }}
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
        <script src="{{ asset('admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
        <!--Wave Effects -->
        <script src="{{ asset('admin/dist/js/waves.js') }}"></script>
        <!--Menu sidebar -->
        <script src="{{ asset('admin/dist/js/sidebarmenu.js') }}"></script>
        <!--Custom JavaScript -->
        <script src="{{ asset('admin/dist/js/custom.min.js') }}"></script>
        <!--This page JavaScript -->
        <!-- <script src="{{ asset('admin/dist/js/pages/dashboards/dashboard1.js') }}"></script> -->
        <!-- Charts js Files -->
        <script src="{{ asset('admin/assets/libs/flot/excanvas.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/flot/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
        <script src="{{ asset('admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('admin/dist/js/pages/chart/chart-page-init.js') }}"></script>

        @yield('custom-scripts')
    </body>
</html>
