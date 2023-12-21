@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Postulaciones</h1></div>
            <div class="col-sm-6">
                <!-- <a href="{{url('cotizacion/registrar')}}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Nueva</a> -->
                <ol class="breadcrumb float-sm-right" style="display: none;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v3</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-handshake"></i> Lista de Postulaciones</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contenedorRegistros table-responsive" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" data-priority="1">Numero</th>
                                        <th class="text-center" data-priority="2">Concepto</th>
                                        <th class="text-center" data-priority="3">Tipo</th>
                                        <th class="text-center" data-priority="4">F.Finalizacion</th>
                                        <th class="text-center" data-priority="4">Postulantes</th>
                                        <th class="text-center" data-priority="4">Estado</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th class="text-center" data-priority="1">Numero</th>
                                        <th class="text-center" data-priority="2">Concepto</th>
                                        <th class="text-center" data-priority="3">Tipo</th>
                                        <th class="text-center" data-priority="4">F.Finalizacion</th>
                                        <th class="text-center" data-priority="4">Postulantes</th>
                                        <th class="text-center" data-priority="4">Estado</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </tfoot>
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
localStorage.setItem("sba",7);
    var tablaDeRegistros;
    var flip=0;
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        fillRegistros();
        $('.overlayPagina').css("display","none");
    } );
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('postulaciones/listar') }}",
            method: 'get',
            success: function(r)
            {
                console.log(r.data);
                var html = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    html += '<tr>' +
                        '<td class="align-middle text-center font-weight-bold">' + r.data[i].numeroCotizacion + '</td>' +
                        '<td class="align-middle text-left"><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                        '<td class="align-middle text-center">' + badgeTipoCot(r.data[i].tipo) +'</td>' +
                        '<td class="align-middle text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
                        '<td class="align-middle text-center font-weight-bold">' + novDato(r.data[i].cantidad) + ' <i class="fa fa-user"></i></td>' +
                        // una cotizacion cuando finaliza no puede ser cambiado, 
                        // '<td class="text-center">' + segunEstadoCotizacion(r.data[i]) + '</td>' +
                        '<td class="align-middle text-center">' + estadoCotizacion(r.data[i].estadoCotizacion) + '</td>' +
                        '<td class="align-middle text-center">' + 
                            '<button type="button" class="btn text-info" onclick="showPostulaciones(\''+r.data[i].idCot+'\')"><i class="fa fa-list-ol fa-lg"></i></button>'+
                        '</td></tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
        
    }
    // una cotizacion cuando finaliza no puede ser cambiado, y esta funcion le agrega un boton de modificacion
    function segunEstadoCotizacion(cot)
    {
        let opcion = cot.estadoCotizacion == '5' || cot.estadoCotizacion == '2' ? '':'<button class="btn text-info" onclick="changeEstadoCot('+cot.idCot+','+cot.numeroCotizacion+')"><i class="fa fa-edit"></i></button>';
        return estadoCotizacion(cot.estadoCotizacion) + opcion;
    }
    function showPostulaciones(id)
    {
        localStorage.setItem("idCot",id);
        window.location.href = "{{ url('postulacion/postulaciones') }}";
        // window.open("{{ route('ver-archivo') }}/" + archivo, "_blank");
    }
    function construirTabla()
    {
        $('.contenedorRegistros>div').remove();
        $('.contenedorRegistros').html(tablaDeRegistros);
    }
</script>

@endsection