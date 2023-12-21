@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0"></h1></div>
            <div class="col-sm-6">
                <a href="{{url('panelAdm/paProveedor/datos')}}" class="btn btn-success float-right"><i class="fa fa-cogs"></i> Mis datos</a>
                <ol class="breadcrumb float-sm-right" style="display: none;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v3</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('contentPanelAdmin')
@if(is_null(Session::get('proveedor')->tipoPersona)
    || is_null(Session::get('proveedor')->numeroDocumento)
    || is_null(Session::get('proveedor')->direccion)
    || is_null(Session::get('proveedor')->correo)
    || is_null(Session::get('proveedor')->celular)
    || is_null(Session::get('proveedor')->usuario)
    || is_null(Session::get('proveedor')->banco)
    || is_null(Session::get('proveedor')->cci)
)
<script>
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        console.log("{{Session::get('proveedor')->idPro}}")
        console.log("{{Session::get('proveedor')->tipoPersona}}")
        console.log("{{Session::get('proveedor')->numeroDocumento}}")
        console.log("{{Session::get('proveedor')->tipoPersona}}")
        console.log("{{Session::get('proveedor')->tipoPersona}}")
        Swal.fire({
            title: "COTIZACION",
            text: "Es necesario que complete sus datos personales.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
            allowOutsideClick: false, 
            allowEscapeKey: false, 
            showCancelButton: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{url('panelAdm/paProveedor/datos')}}";
            }
        });
    });
</script>
@else
<div class="container-fluid mt-3">
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h3 class="text-center font-weight-bold font-italic">MIS FORMATOS</h3>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Descargar Declaración
                                        Jurada</span>
                                    <a href="{{route('declaracion-jurada')}}" target="_blank" class="btn btn-primary float-right">
                                        <i class="fas fa-download"></i> Generar PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">CCI</span>
                                    <a href="{{route('cci')}}" target="_blank" class="btn btn-primary float-right">
                                        <i class="fas fa-download"></i> Generar PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Anexo 5</span>
                                    <a href="{{route('anexo5')}}" target="_blank" class="btn btn-primary float-right">
                                        <i class="fas fa-download"></i> Generar PDF
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Nuestros Formatos</h4><br>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="https://cdn-icons-png.flaticon.com/512/2875/2875411.png"
                                        alt="user image">
                                    <span class="username">
                                        <a href="#">Declaración Jurada</a>
                                    </span>
                                    <span class="description">Generado en base a tus datos.</span>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <p>
                                            La siguiente información esta generada en base a los datos que ingresaste, en caso de tener algun error en sus datos, dirijase a la sección "Mis Datos" para corregir los errores.
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-sm btn-primary float-right" onclick="showDj()">
                                            <i class="far fa-fw fa-file-pdf"></i> Previsualizar PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="https://cdn-icons-png.flaticon.com/512/2875/2875411.png"
                                        alt="User Image">
                                    <span class="username">
                                        <a href="#">Codigo de Cuenta Interbancaria</a>
                                    </span>
                                    <span class="description">Generado en base a tus datos</span>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <p>
                                            La siguiente información esta generada en base a los datos que ingresaste, en caso de tener algun error en sus datos, dirijase a la sección "Mis Datos" para corregir los errores.
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-sm btn-primary float-right" onclick="showCci()">
                                            <i class="far fa-fw fa-file-pdf"></i> Previsualizar PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="https://cdn-icons-png.flaticon.com/512/2875/2875411.png"
                                        alt="user image">
                                    <span class="username">
                                        <a href="#">Anexo 5</a>
                                    </span>
                                    <span class="description">Generado en base a tus datos</span>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <p>
                                            La siguiente información esta generada en base a los datos que ingresaste, en caso de tener algun error en sus datos, dirijase a la sección "Mis Datos" para corregir los errores.
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-sm btn-primary float-right" onclick="showAnexo5()">
                                            <i class="far fa-fw fa-file-pdf"></i> Previsualizar PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="col-lg-12 contentPdf">
                        <div class="card bg-secondary">
                            <div class="overlay overlayRegistros">
                                <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                            </div>
                            <div class="card-body p-1">
                                <div class="row banerPdf justify-content-center">
                                    <img src="{{asset('img/panelAdm/formatos.png')}}" class="w-50">
                                </div>
                                <div class="contentPreview" style="display: none;">
                                    <embed src="" id="pdfViewer" class="w-100" style="height: 100vh;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    localStorage.setItem("sba",6);
    var flip=0;
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        showDj();
        // $('.overlayRegistros').css("display","none");
    });
    function showCci()
    {
        $('.banerPdf').css('display','flex');
        $('.contentPreview').css('display','none');
        $('.overlayRegistros').css("display","flex");
        $.ajax({
            url: "{{route('saveCciDel')}}",
            method: 'get',
            success: function(r) {
                console.log(r);
                var dir = "{{route('formatos-file')}}/"+r.pdf;
                $('#pdfViewer').attr('src',dir);
                // $('.banerPdf').remove();
                $('.banerPdf').css('display','none');
                $('.contentPreview').css('display','block');
                $('.overlayRegistros').css("display","none");
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el PDF:', status, error);
            }
        });
    }
    function showDj()
    {
        $('.banerPdf').css('display','flex');
        $('.contentPreview').css('display','none');
        $('.overlayRegistros').css("display","flex");
        $.ajax({
            url: "{{route('saveDjDel')}}",
            method: 'get',
            success: function(r) {
                console.log(r);
                var dir = "{{route('formatos-file')}}/"+r.pdf;
                $('#pdfViewer').attr('src',dir);
                // $('.banerPdf').remove();
                $('.banerPdf').css('display','none');
                $('.contentPreview').css('display','block');
                $('.overlayRegistros').css("display","none");
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el PDF:', status, error);
            }
        });
    }
    function showAnexo5()
    {
        $('.banerPdf').css('display','flex');
        $('.contentPreview').css('display','none');
        $('.overlayRegistros').css("display","flex");
        $.ajax({
            url: "{{route('saveAnexo5Del')}}",
            method: 'get',
            success: function(r) {
                console.log(r);
                var dir = "{{route('formatos-file')}}/"+r.pdf;
                $('#pdfViewer').attr('src',dir);
                // $('.banerPdf').remove();
                $('.banerPdf').css('display','none');
                $('.contentPreview').css('display','block');
                $('.overlayRegistros').css("display","none");
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el PDF:', status, error);
            }
        });
    }
</script>
@endif
@endsection