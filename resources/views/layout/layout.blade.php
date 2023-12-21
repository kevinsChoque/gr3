<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOBIERNO REGIONAL DE APURIMAC</title>
    <link rel="icon" href="{{asset('img/admin/funcionarios/icono.jpg')}}" type="image/x-icon">
    <!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
    <!-- spiner style -->
    <link rel="stylesheet" href="{{asset('css/spinersAdmin.css')}}">
    <!-- summernote -->
    <!-- <link rel="stylesheet" href="{{asset('adminlte3/plugins/summernote/summernote-bs4.min.css')}}"> -->
    <!-- dropzone -->
    <!-- <link rel="stylesheet" href="{{asset('adminlte3/plugins/dropzone/min/dropzone.min.css')}}">
    <script src="{{asset('adminlte3/plugins/dropzone/min/dropzone.min.js')}}"></script> -->
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script src="{{asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- datatable -->
    
    
    <!-- https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css -->
    <link rel="stylesheet" href="{{asset('cdn/jquery.dataTables.min.css')}}">
    <!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->




    <!-- ---------------------- -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('adminlte3/plugins/daterangepicker/daterangepicker.css')}}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layout.sections.navbar')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layout.sections.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                		<!-- content admin -->
                        <div class="overlayPagina">
                            <div class="loadingio-spinner-spin-i3d1hxbhik m-auto">
                                <div class="ldio-onxyanc9oyh">
                                    <div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        @include('layout.sections.footer')
    </div>
    <!-- REQUIRED SCRIPTS -->

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
<!-- <script src="{{asset('adminlte3/plugins/jquery-validation/additional-methods.min.js')}}"></script> -->
<!-- OPTIONAL SCRIPTS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->

<!-- AdminLTE for demo purposes -->
<!-- <script src="{{asset('adminlte3/dist/js/demo.js')}}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('adminlte3/dist/js/pages/dashboard3.js')}}"></script> -->
<!-- summernote -->
<!-- <script src="{{asset('adminlte3/plugins/summernote/summernote-bs4.min.js')}}"></script> -->
<!-- helpers -->
<script src="{{asset('js/helper.js')}}"></script>
<!-- https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js -->
<script src="{{asset('cdn/jquery.dataTables.min.js')}}"></script>
<!-- https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js -->
    <!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> -->

<!-- https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css -->
<link href="{{asset('cdn/select2.min.css')}}" rel="stylesheet" />
<!-- <link rel="stylesheet" href="{{asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}"> -->
<!-- https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js -->
<script src="{{asset('cdn/select2.min.js')}}"></script>
<!-- --------------------------------datepicker-------------------- -->
<script src="{{asset('adminlte3/plugins/moment/moment.min.js')}}"></script>

<script src="{{asset('adminlte3/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- sweetalert2 -->
<!-- <script src="{{asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script> -->
<script>
    // var __PUBLIC__ = "{{ route('ver-archivo') }}";
$(document).ready( function () {
    sideBarCollapse();
    sideBarActive();
} );
</script>
</body>
</html>
