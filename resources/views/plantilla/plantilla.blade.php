<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOBIERNO REGIONAL DE APURIMAC</title>
    <link rel="icon" href="{{asset('img/admin/funcionarios/icono.jpg')}}" type="image/x-icon">
    <!-- jQuery -->
    <script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
    <!-- fuente de google Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- estilos del tema -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
    <!-- estilos del espinner -->
    <link rel="stylesheet" href="{{asset('css/spinersAdmin.css')}}">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script src="{{asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- datatable -->
    <link rel="stylesheet" href="{{asset('cdn/jquery.dataTables.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('plantilla.sections.navbar')
        @include('plantilla.sections.sidebar')
        <div class="content-wrapper">
            <div class="content-header" style="display: none;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6"><h1 class="m-0">Dashboard v3</h1></div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Dashboard v3</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            @yield('pageTitle')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="overlayPagina">
                            <div class="loadingio-spinner-spin-i3d1hxbhik m-auto">
                                <div class="ldio-onxyanc9oyh">
                                    <div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
                                </div>
                            </div>
                        </div>
                        @yield('contentPanelAdmin')
                    </div>
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        @include('layout.sections.footer')
    </div>
<!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('adminlte3/dist/js/adminlte.js')}}"></script>
<!-- jquery validate -->
<script src="{{asset('adminlte3/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- transJQV -->
<script src="{{asset('js/translateValidate.js')}}"></script>
<!-- helpers -->
<script src="{{asset('js/helper.js')}}"></script>
<!-- datatable -->
<script src="{{asset('cdn/jquery.dataTables.min.js')}}"></script>
<!-- select2 -->
<link href="{{asset('cdn/select2.min.css')}}" rel="stylesheet" />
<script src="{{asset('cdn/select2.min.js')}}"></script>
<script>
$(document).ready( function () {
    sideBarCollapse();
    sideBarActivePa();
} );
</script>
</body>
</html>
