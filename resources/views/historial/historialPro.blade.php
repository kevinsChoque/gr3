@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Historial de Proveedor</h1></div>
            <div class="col-sm-6">
                <!-- <a href="{{url('postulaciones/ver')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> Ver lista de postulaciones</a> -->
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
<!-- ----------------------------------------------------------------- -->
<div class="container-fluid mb-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <label class="m-0">Fecha de historial:</label>
            <div class="input-group">
                <input type="date" class="form-control fechaHistorialLoad">
                <div class="input-group-append">
                    <button class="btn btn-success" onclick="buscarHistorial();">Cargar historial</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="invoice p-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h5>
                            <i class="fas fa-lg fa-building"></i> Mis datos Personales.
                        </h5>
                    </div>
                    <div class="col-12">
                        <h5>
                            <small class="float-left fechaRegistro">--</small>
                        </h5>
                    </div>
                </div>
                <hr>
                <div class="row invoice-info">
                    <div class="col-lg-12 invoice-col">
                        Datos Personales
                    </div>
                    <div class="col-lg-6">
                        <strong>Dni.</strong>
                        <br>
                        <span class="dniPersona">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Nombres</strong>
                        <br>
                        <span class="nombrePersona">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Apellido Paterno</strong>
                        <br>
                        <span class="apPersona">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Apellido Materno</strong>
                        <br>
                        <span class="amPersona">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Dirección</strong>
                        <br>
                        <span class="direccionPersona">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>SUNAT</strong>
                        <br>
                        <span class="estadoSunat">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Correo Electronico</strong>
                        <br>
                        <span class="correoPersona">--</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 contenedorHistorial">
            <div class="timeline">
            </div>
        </div>
    </div>
</div>
<!-- ----------------------------------------------------------------- -->

<a href="{{ route('cotRecPro-archivo') }}" ></a>
<script>
localStorage.setItem("sbd",0);
localStorage.setItem("sba",6);
$(document).ready( function () {
    // loadCotizacion();
    loadHistorial();
    fillProveedor();
    $('.overlayPagina').css("display","none");
} );
function buscarHistorial()
{
    if($('.fechaHistorialLoad').val()=='')
        alert('elije una fecha');
    else
        loadHistorial()
}
function loadHistorial()
{
    jQuery.ajax({
        url: "{{ url('historial/loadPro') }}",
        method: 'POST', 
        data: {idPro:localStorage.getItem("idPro"),fecha:$('.fechaHistorialLoad').val()},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            // console.log(r);
            var html = '';
            $('.contenedorHistorial>.timeline>div').remove();
            if(r.his.length==0)
            {
                // alert('es = a 0');
                html = '<div class="alert alert-info w-100">'+
                    '<p class="m-0 font-weight-bold">El Proveedor no realizo ninguna accion '+$('.fechaHistorialLoad').val()+'</p>'+
                '</div>';
            }
            else
            {
                let opciones = '';
                let nombreUsu = '';

                html = '<div class="time-label">'+
                        '<span class="bg-red dia-historial">'+formatoDateHistorial(r.his[0].fecha)+'</span>'+
                    '</div>';
                
                // for (var i = 0; i < r.his.length; i++) 
                for (i = r.his.length-1; i>=0; i--) 
                {
                    nombreUsu = r.his[i].nombre+' '+r.his[i].apellidoPaterno;
                    html += '<div>'+
                        segunAccion(r.his[i].accion) +
                        '<div class="timeline-item">'+
                            '<span class="time"><i class="fas fa-clock"></i> '+formatoHoraHistorial(r.his[i].fecha)+'</span>'+
                            '<h3 class="timeline-header no-border"><a href="#"></a> '+r.his[i].accion+'</h3>'+
                            // '<h3 class="timeline-header no-border"><a href="#">'+nombreUsu+'</a> '+r.his[i].accion+'</h3>'+
                        '</div>'+
                    '</div>';
                }
                html += '<div>'+
                        '<i class="fas fa-home bg-gray"></i>'+
                    '</div>';
            }
            $('.contenedorHistorial>.timeline').append(html);
        },
        error: function (xhr, status, error) {
            console.log('salio un error');
        }
    });
}
function formatoHoraHistorial(fecha)
{
    var fecha = new Date(fecha);
    return fecha.toLocaleTimeString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true});
}
function segunAccion(accion)
{
    let icono = '<i class="fas fa-arrow-right bg-secondary"></i>';
    if (accion.includes("cotizacion")) icono='<i class="fas fa-chart-bar bg-green"></i>';
    if (accion.includes("recotizacion")) icono='<i class="fa fa-calendar-alt bg-info"></i>';
    if (accion.includes("proveedor")) icono='<i class="fas fa-building bg-primary"></i>';
    if (accion.includes("penalizo")) icono='<i class="fa fa-user-slash bg-danger"></i>';
    return icono;
}
function formatoDateHistorial(fecha)
{
    var fechaObjeto = new Date(fecha);

    var nombresDias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    var nombreDia = nombresDias[fechaObjeto.getDay()];
    var nombreMes = nombresMeses[fechaObjeto.getMonth()];

    var dia = fechaObjeto.getDate();
    var año = fechaObjeto.getFullYear();

    return nombreDia + ', ' + dia + ' de ' + nombreMes + ' de ' + año;
}
function fillProveedor()
{
    jQuery.ajax(
    { 
        url: "{{ url('panelAdm/paProveedor/editar') }}",
        data: {id:localStorage.getItem("idPro")},
        method: 'post',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            // cleanFv('fvproveedor');
            idPro = r.data.idPro;
            $('#fvproveedor #tipoPersona').val(r.data.tipoPersona===null?'0':r.data.tipoPersona);
            $('#fvproveedor #numeroDocumento').val(r.data.numeroDocumento);
            $('#fvproveedor #direccion').val(r.data.direccion);
            $('#fvproveedor #activo').val(r.data.activo===null?'2':r.data.activo);
            $('#fvproveedor #habido').val(r.data.habido===null?'2':r.data.habido);
            $('#fvproveedor #correo').val(r.data.correo);
            $('#fvproveedor #celular').val(r.data.celular);
            $('#fvproveedor #usuario').val(r.data.usuario);
            $('#fvproveedor #banco').val(r.data.banco);
            $('#fvproveedor #cci').val(r.data.cci);
            
            $('.rucProveedor').html('RUC: '+r.data.numeroDocumento);
            $('.usuarioProveedor').html(r.data.numeroDocumento);
            
            $('.correoPersona').html(dataIncompleta(novDato(r.data.correo)));
            $('.estadoSunat').html(novDato(r.data.activo)=='--'?
                '<span class="badge badge-warning">Incompleto</span>':
                r.data.activo=='1'?'<span class="badge badge-success">Activo</span>':
                '<span class="badge badge-danger">Inactivo</span>'
            );
            $('.bancoPersona').html(dataIncompleta(novDato(r.data.banco)));
            $('.cciPersona').html(dataIncompleta(novDato(r.data.cci)));

            fecha = new Date(r.data.fr);
            fechaFormat = `${fecha.getDate()} de ${obtenerNombreMes(fecha.getMonth() + 1)} de ${fecha.getFullYear()}`;
            
            $('.fechaRegistro').html('Fecha Registro: '+fechaFormat);

            if(r.data.tipoPersona=='PERSONA JURIDICA')
            {
                $('.nombreProveedor').html(r.data.razonSocial);
                $('.dniPersona').html(dataIncompleta(novDato(r.data.dniRep)));
                $('.nombrePersona').html(dataIncompleta(novDato(r.data.nombreRep)));
                $('.direccionPersona').html(dataIncompleta(novDato(r.data.direccionRep)));
                $('.apPersona').html(dataIncompleta(novDato(r.data.apellidoPaternoRep)));
                $('.amPersona').html(dataIncompleta(novDato(r.data.apellidoMaternoRep)));
                
                $('#fvproveedor .razonSocial').rules('add', {required: true});
                $('#fvproveedor .nombre').rules('remove', 'required');
                $('#fvproveedor .apellidoPaterno').rules('remove', 'required');
                $('#fvproveedor .apellidoMaterno').rules('remove', 'required');
                $('#fvproveedor .pn').val('');
                
                $('#fvproveedor .razonSocial').val(r.data.razonSocial);
                $('#fvproveedor #dniRep').val(r.data.dniRep);
                $('#fvproveedor #nombreRep').val(r.data.nombreRep);
                $('#fvproveedor #apellidoPaternoRep').val(r.data.apellidoPaternoRep);
                $('#fvproveedor #apellidoMaternoRep').val(r.data.apellidoMaternoRep);
                $('#fvproveedor #direccionRep').val(r.data.direccionRep);
                $('#fvproveedor .pj').parent().parent().css('display','block');
                $('#fvproveedor .pn').parent().parent().css('display','none');
                $('.dataRepresentante').css('display','block');
            }
            else
            {
                $('.nombreProveedor').html(
                    r.data.nombre+' '+
                    r.data.apellidoPaterno+' '+
                    r.data.apellidoMaterno
                );
                $('.dniPersona').html(r.data.numeroDocumento.slice(2, 10));
                $('.nombrePersona').html(r.data.nombre);
                $('.direccionPersona').html(dataIncompleta(novDato(r.data.direccion)));
                $('.apPersona').html(dataIncompleta(novDato(r.data.apellidoPaterno)));
                $('.amPersona').html(dataIncompleta(novDato(r.data.apellidoMaterno)));
                
                $('#fvproveedor .nombre').rules('add', {required: true});
                $('#fvproveedor .apellidoPaterno').rules('add', {required: true});
                $('#fvproveedor .apellidoMaterno').rules('add', {required: true});
                $('#fvproveedor .razonSocial').rules('remove', 'required');
                $('#fvproveedor .pj').val('');
                
                $('#fvproveedor .nombre').val(r.data.nombre);
                $('#fvproveedor .apellidoPaterno').val(r.data.apellidoPaterno);
                $('#fvproveedor .apellidoMaterno').val(r.data.apellidoMaterno);
                $('#fvproveedor .pj').parent().parent().css('display','none');
                $('#fvproveedor .pn').parent().parent().css('display','block');
                $('.dataRepresentante').css('display','none');
            }
            $('.overlayPagina').css("display","none");
        }
    });
}
function dataIncompleta(data)
{
    return data == '--'?'<span class="badge badge-warning">Incompleto</span>':data;
}
</script>
@endsection