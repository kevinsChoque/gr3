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
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
    <script src="{{asset('js/helper.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/spinersAdmin.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script src="{{asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('cdn/jquery.dataTables.min.css')}}">
    <style>
    	/*.hoverLink:hover{
    		color: #1b00ff !important;
    	}*/
    </style>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
	<div class="container-fluid my-5" style="display: none;">
		<div class="row align-middle justify-content-center">
			<div class="callout callout-info">
				<h5><a href="{{url('login/login')}}" class="btn btn-link hoverLink"><i class="fas fa-user-tie"></i> PANEL ADMINISTRATIVO DEL FUNCIONARIO:</a></h5>
					Panel de administracion de los usuarios de cotizacion y administracion, gestion de cotizaciones.
			</div>
			<div class="callout callout-info ml-2">
				<h5><a href="{{url('loginProveedor/loginProveedor')}}" class="btn btn-link hoverLink"><i class="fas fa-user"></i> PANEL ADMINISTRATIVO DEL PROVEEDOR:</a></h5>
					Panel administrativo de los proveedores, es un medio para postular a las cotizaciones
			</div>
		</div>
	</div>
    <div class="container-fluid p-0" style="background: linear-gradient(to bottom, #eff1f3, #27517c);">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/panelAdm/logoFile.png')}}" style="width: 50px;">
                <!-- <p>cascasc <br>vd</p> -->
                <span class="m-0">GOBIERNO REGIONAL </span>
                <span class="m-0 font-weight-bold font-italic"> APURIMAC</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link font-weight-bold" href="{{url('loginProveedor/loginProveedor')}}">Login Proveedor</a></li>
                    <li class="nav-item"><a class="nav-link font-weight-bold" href="{{url('login/login')}}">Login Funcionario</a></li>
                </ul>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12 mt-4">
                <h1 class="text-center px-1" style="margin: 0;font-size: 39px;font-weight: 700;line-height: 56px;color: #3e4450;">Plataforma de Cotizaciones en Línea</h1>
                <h2 class="text-center" style="color: #858ea1;margin: 10px 0 30px 0;font-size: 24px;">Gobierno Regional de Apurimac</h2>
            </div>
            <div class="col-lg-7 p-4">
                <!-- <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion">
                        <div class="input-group-append">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-search"></i></span>
                            <span class="input-group-text font-weight-bold"> BUSCAR</span>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Numero de cotizacion o concepto">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                            <span class="input-group-text font-weight-bold"> BUSCAR</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="form-group col-lg-12">
                                <label class="m-0">Rubro: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion">
                                </div>
                            </div> -->
                            <div class="form-group col-lg-6">
                                <label class="m-0">Fecha de Inicio: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion">
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="m-0">Fecha de Fin: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion">
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="m-0">Tipo de Solicitud: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion">
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="m-0">Estado de Solicitud: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1" style="background-color: #adb7bf!important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0" style="background-color: #adb7bf!important;">
                            <li class="breadcrumb-item active text-dark" aria-current="page">
                                <p class="m-0 font-weight-bold font-italic"><i class="fa fa-hause"></i>Cotizaciones disponibles</p>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <style>
        .ocultarText{
            overflow: hidden;
            white-space: nowrap;
            width: 500px;
            text-overflow: ellipsis;
        }
    </style>
    <div class="container-fluid pt-3" style="background-image: url('{{asset('img/portal/bgg.jpg')}}')">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card">
                    <div class="card-body">
                        <div class="contenedorRegistros" style="display: none;">
                            <table id="registros" class="table table-hover table-bordered dt-responsive nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="align-middle text-center text-uppercase" data-priority="2" width="10%">NRO <br> COTIZACION</th>
                                        <th class="align-middle text-center text-uppercase" data-priority="1" width="10%">TIPO</th>
                                        <th class="align-middle text-center text-uppercase" data-priority="3" width="55%">DESCRIPCION COTIZACION</th>
                                        <th class="align-middle text-center text-uppercase" data-priority="4" width="5%">FECHA DE <br> ENTREGA Y <br> ACTO PUBLICO</th>
                                        <th class="align-middle text-center text-uppercase" data-priority="1" width="20%">OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE -->
<script src="{{asset('adminlte3/dist/js/adminlte.js')}}"></script>
<script src="{{asset('cdn/jquery.dataTables.min.js')}}"></script>

<!-- jquery validate -->
<!-- transJQV -->
<script>
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        // initFv('fvbuscot',rules());
        fillRegistros();
        $('.overlayPagina').css("display","none");
        // $('.overlayRegistros').css("display","none");
    });
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paCotizacion/listar') }}",
            method: 'get',
            success: function(r)
            {
                var html = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    html += '<tr>' +
                        '<td class="text-left align-middle font-weight-bold">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
                        '<td class="text-center font-weight-bold align-middle">' + novDato(r.data[i].tipo) + '</td>' +
                        // ocultarText
                        // '<td class="align-middle"><p class="m-0 text-uppercase">' + novDato(r.data[i].concepto) + '</p></td>' +
                        // '<td class="align-middle"><p style="white-space: pre-line;margin-bottom: 0px;font-weight: 400;">SERVICIO DE ESTUDIO DE MECANICA DE SUELOS SEGUN TERMINOS DE REFERENCIA RECOTIZACION POR NO CUMPLIR CON LOS TERMINOS DE REFERENCIA</p></td>'+
                        // -----
                        '<td class="align-middle">'+
                            '<p style="white-space: pre-line;margin-bottom: 0px;font-weight: 400;" class="text-uppercase">' + novDato(r.data[i].concepto) + '</p>'+
                            '<label style="font-size: 12px;font-weight:normal;"><strong>Dependencia: </strong> Gobierno Regional de Apurímac </label>'+
                            '<label style="font-size: 12px;font-weight:normal;" class="float-right"><strong>Fecha Publicación:</strong> 20/12/2023</label>'+
                        '</td>'+
                        '<td class="align-middle text-left">' + 
                        // '<td class="text-left">INICIO:<br>' + 
                            // '<span><i class="fa fa-calendar-alt"></i> '+novDato(r.data[i].fechaCotizacion) +'<br><i class="fa fa-clock"></i> '+novDato(r.data[i].horaCotizacion) + '<span><br>FIN:<br>' +
                            '<span><i class="fa fa-calendar-alt"></i> '+novDato(r.data[i].fechaFinalizacion) +'<br><i class="fa fa-clock"></i> '+novDato(r.data[i].horaFinalizacion) + '<span><br>' +
                        '</td>' +
                        '<td class="text-center align-middle">' + 
                            '<a href="{{ route('ver-archivo') }}/'+r.data[i].archivo+'" target="_blank" class="btn btn-sm btn-primary mb-1 btn-flat w-100 mb-2"><i class="far fa-file-pdf"></i> Descargar</a><br>'+
                            '<button type="button" class="btn btn-sm btn-success btn-flat w-100" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-envelope"></i> Emviar Cotizacion</button>'+
                        '</td>' +
                    '</tr>';
                }
                $('#data').html(html);
                // initDatatable('registros');
                $('#registros').DataTable( {
                    "searching": false,
                    "autoWidth":false,
                    "responsive":true,
                    "ordering": false,
                    "lengthChange": false,
                    "lengthMenu": [[5, 10,25, -1], [5, 10,25, "Todos"]],   
                    // "order": [[ 1, 'desc' ]],
                    "language": {
                        "info": "Mostrando la pagina _PAGE_ de _PAGES_. (Total: _MAX_)",
                        "search":"",
                        "infoFiltered": "(filtrando)",
                        "infoEmpty": "No hay registros disponibles",
                        "sEmptyTable": "No tiene registros guardados.",
                        "lengthMenu":"Mostrar registros _MENU_ .",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    },
                } );
                $('.overlayRegistros').css('display','none');
            }
        });
    }

    function cotizar()
    {
        Swal.fire({
            title: "Ver Cotizacion",
            text: "Para postular a la cotizacion debe de ingresar con su usuario",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ingresar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $('.overlayPagina').css("display","flex");
                window.location.href = "{{url('loginProveedor/loginProveedor')}}";
            }
        });
    }
</script>
</body>
</html>
