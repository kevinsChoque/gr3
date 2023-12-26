@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones</h1></div>
            <div class="col-sm-6">
                <a href="{{url('cotizacion/ver')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> Cotizaciones</a>
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
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-chart-bar"></i> Registrar Cotizacion</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <form id="fvcotizacion">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <label class="m-0">Numero de Cotizacion: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion">
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0">Tipo de Cotizacion: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <!-- <input type="text" class="form-control" id="tipo" name="tipo"> -->
                                <select name="tipo" id="tipo" class="form-control">
                                    <option disabled>Seleccione opcion</option>
                                    <option value="Bienes" selected>Bienes</option>
                                    <option value="Servicios">Servicios</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0">Unidad Ejecutora: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control" id="unidadEjecutora" name="unidadEjecutora" value="GOBIERNO REGIONAL DE APURIMAC - SEDE CENTRAL" disabled>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0">Documento: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="documento" name="documento">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Fecha de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ifechaCotizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ifechaCotizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ifechaCotizacion" id="fechaCotizacion" name="fechaCotizacion">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Hora de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ihoraCotizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ihoraCotizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraCotizacion" id="horaCotizacion" name="horaCotizacion" autocomplete="off"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Fecha de la finalizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ifechaFinalizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ifechaFinalizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ifechaFinalizacion" id="fechaFinalizacion" name="fechaFinalizacion" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Hora de la finalizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ihoraFinalizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ihoraFinalizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraFinalizacion" id="horaFinalizacion" name="horaFinalizacion" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="m-0">Concepto: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <textarea name="concepto" id="concepto" cols="30" rows="3" class="form-control input"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="m-0">Descripcion:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control input"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="m-0">Archivo: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-file"></i></span>
                                </div>
                                <input type="file" class="form-control input" id="file" name="file">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="m-0">Estado: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-file"></i></span>
                                </div>
                                <select name="estadoCotizacion" id="estadoCotizacion" class="form-control" disabled>
                                    <option disabled>Seleccione opcion</option>
                                    <option value="1" selected>En proceso</option>
                                    <!-- <option value="2">Finalizada</option> -->
                                    <!-- <option value="3">Borrador</option> -->
                                </select>
                            </div>
                        </div>
                    </div> 
                    </form>
                </div>
                <div class="card-footer py-1 border-transparent">
                    <button type="button" class="btn btn-success float-right guardar ml-2"><i class="fa fa-save"></i> Guardar Cotizacion</button>
                    <!-- <button type="button" class="btn btn-light float-right" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
localStorage.setItem("sbd",1);
localStorage.setItem("sba",4);
$(document).ready( function () {
    $.validator.addMethod("extensionPdf", function(value, element) {
        return this.optional(element) || value.toLowerCase().endsWith(".pdf");
    }, "Solo se permiten archivos PDF");
    loadPage();
    initFv('fvcotizacion',rules());
    $('.overlayPagina').css("display","none");
    $('.overlayRegistros').css("display","none");
    $('#ifechaCotizacion').datetimepicker({format: 'YYYY-MM-DD',minDate: moment(),daysOfWeekDisabled: [0, 6], });
    $('#ifechaFinalizacion').datetimepicker({format: 'YYYY-MM-DD'});
    $('#ihoraCotizacion').datetimepicker({format: 'LT'});
    $('#ihoraFinalizacion').datetimepicker({format: 'LT'});
});
$('.inputDate').on('click',function(){$(this).parent().find('.input-group-prepend').click();});
$('.guardar').on('click',function(){guardar();});
function loadPage()
{
    var fechaActual = new Date();
    var fecha = fechaActual.toISOString().split('T')[0];
    $('#fechaCotizacion').val(fecha);
}
function rules()
{
    return {
        numeroCotizacion: {required: true,},
        tipo: {required: true,},
        unidadEjecutora: {required: true,},
        documento: {required: true,},
        fechaCotizacion: {required: true,},
        horaCotizacion: {required: true,},
        fechaFinalizacion: {required: true,},
        horaFinalizacion: {required: true,},
        concepto: {required: true,},
        file: {required: true,extensionPdf: "pdf"},
        estado: {required: true,},
    };
}
function guardar()
{
    if($('#fvcotizacion').valid()==false)
    {return;}
    var formData = new FormData($("#fvcotizacion")[0]);
    // formData.append('file', $('#archivo')[0].files.length>0?'true':'false');
    $('.guardar').prop('disabled',true); 
    $('.overlayRegistros').css("display","flex");
    jQuery.ajax({
        url: "{{ url('cotizacion/guardar') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            if (r.estado) 
                redirectUrlMsj("{{url('cotizacion/ver')}}",r.message);
            else 
            {
                $('.overlayRegistros').css("display","none");
                msjRee(r); 
            }
            $('.guardar').prop('disabled',false);
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
function limpiarForm()
{   $('.input').val('');}
</script>
@endsection