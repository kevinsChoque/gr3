@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">--</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar" style="display: none;">
                <i class="fa fa-plus"></i> 
                Nuevo registro
            </button>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css">

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script> -->






<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-bar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cant. cotizaciones</span>
                    <span class="info-box-number cantCot">-</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cant. proveedores</span>
                    <span class="info-box-number cantPro">-</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cant. cotizadores</span>
                    <span class="info-box-number cantCoti">-</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cot. de tipo bienes</span>
                    <span class="info-box-number cantBie">-</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cot. de tipo servicios</span>
                    <span class="info-box-number cantSer">-</span>
                </div>
            </div>
        </div>
        <div class="col-lg-12"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="overlay overlayMontoCotSegunTipoMes" style="display: flex;">
                    <div class="spinner"></div>
                </div>
                <div class="card-header py-0">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool updateMontoCotSegunTipoMes">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>      
                <div class="card-body">
                    <div style="width: 100%;">
                        <canvas id="montoCotSegunTipoMes"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header py-0">
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div style="width: 100%;">
                        <canvas id="cantCotEstadoMes"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <!-- <div class="overlay overlayFilterMeta" style="display: flex;">
                    <div class="spinner"></div>
                </div> -->
                <div class="card-header pt-2 pb-1">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-chart-bar"></i> Cotizaciones</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>      
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label class="m-0">META:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control soloNumeros" id="meta" name="meta" maxlength="6">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0">Tipo de Cotizacion:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option disabled>Seleccione opcion</option>
                                    <option value="0" selected>TODOS</option>
                                    <option value="Bienes">Bienes</option>
                                    <option value="Servicios">Servicios</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0">Estado de la Cotizacion:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select name="estado" id="estado" class="form-control">
                                    <option disabled>Seleccione opcion</option>
                                    <option value="0" selected>TODOS LOS ESTADOS</option>
                                    <option value="1">EN PROCESO</option>
                                    <option value="2">PUBLICADO</option>
                                    <option value="3">FINALIZADO</option>
                                    <option value="5">RECOTIZANDO</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0" style="visibility: hidden;">META:</label>
                            <div class="input-group">
                                <button class="btn btn-success w-100 filtrarCotizaciones"><i class="fa fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contenedorRegistros table-responsive" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        @if(session()->get('usuario')->tipo=="administrador")
                                        <th class="text-center" data-priority="1" width="10%">Personal</th>
                                        @endif
                                        <th class="text-center" data-priority="1">Meta</th>
                                        <th class="text-center" data-priority="1">Numero</th>
                                        <th class="text-center" data-priority="2">Concepto</th>
                                        <th class="text-center" data-priority="3">Tipo</th>
                                        <th class="text-center" data-priority="4">F.Finalizacion</th>
                                        <th class="text-center" data-priority="4">Estado</th>
                                        <!-- <th class="text-center" data-priority="1">Opc.</th> -->
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
</div>
<script>
    localStorage.setItem("sbd",0);
    localStorage.setItem("sba",2);
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
        loadMontoCotSegunTipoMes();
        cantCotEstadoMes();
        fillRegistros();
    });
    jQuery.ajax(
    { 
        url: "{{ url('homeAdmin/datos') }}",
        method: 'get',
        dataType: 'json',
        success: function(r){
            console.log(r);
            $('.cantCot').html(r.cCot);
            $('.cantPro').html(r.cPro);
            $('.cantCoti').html(r.cCoti);
            $('.cantBie').html(r.cBie);
            $('.cantSer').html(r.cSer);
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
</script>
@include('home.admin.montoCotSegunTipoMes')
@include('home.admin.cantCotEstadoMes')
@include('home.admin.cotizacionesFiltradas')
@endsection