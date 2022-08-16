<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>IMS | Dashboard</title>
    <link href="{{ URL::asset('dist/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('dist/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('dist/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        @if(auth()->user()->is_admin)
            @include('Component.sidebar')
        @else
            @include('Component.sidebar-user')
        @endif
        <!-- Sidebar -->
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                @include('Component.topbar')
                <!-- Topbar -->

                <!-- Alert -->
                @include('Component.alert')
                <!-- Alert -->

                <!-- Container Fluid-->
                    @yield('container')
                <!---Container Fluid-->
            </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ URL::asset('dist/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('dist/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('dist/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ URL::asset('dist/js/ruang-admin.min.js') }}"></script>
        <script src="{{ URL::asset('dist/vendor/chart.js/Chart.min.js') }}"></script>
        <script src="{{ URL::asset('dist/js/demo/chart-area-demo.js') }}"></script>
        <!-- Page level plugins -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="{{ URL::asset('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js') }}"></script>

        <!-- Page level custom scripts -->
        <script>
            $(document).ready(function () {
            $('#dataTable').DataTable({
                responsive: true
            }); // ID From dataTable 
            });
        </script>
</body>

</html>
