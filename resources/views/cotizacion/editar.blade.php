@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones</h1></div>
            <div class="col-sm-6">
                <a href="{{url('cotizacion/registrar')}}" class="btn btn-success float-right ml-2"><i class="fa fa-plus"></i> Nueva</a>
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
        <!-- <div class="col-md-12 mb-3">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar">
                <i class="fa fa-list"></i> Cotizaciones
            </button>
        </div> -->
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-car"></i> Editar Cotizacion</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <form id="efvcotizacion">
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
                                    <option value="Servicios" selected>Servicios</option>
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
                        <!-- <div class="form-group col-lg-3">
                            <label class="m-0">Fecha de la Cotizacion: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control" id="fechaCotizacion" name="fechaCotizacion">
                            </div>
                        </div> -->
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
                        <!-- <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Hora de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ihoraCotizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ihoraCotizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraCotizacion" id="horaCotizacion" name="horaCotizacion"/>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Hora de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ihoraCotizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ihoraCotizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraCotizacion" id="horaCotizacion" name="horaCotizacion"/>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group col-lg-3">
                            <label class="m-0">Fecha de la finalizacion: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="date" class="form-control input" id="fechaFinalizacion" name="fechaFinalizacion">
                            </div>
                        </div> -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Fecha de la finalizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ifechaFinalizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ifechaFinalizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ifechaFinalizacion" id="fechaFinalizacion" name="fechaFinalizacion">
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
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraFinalizacion" id="horaFinalizacion" name="horaFinalizacion">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="m-0">Concepto: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <!-- <input type="text" class="form-control" id="concepto" name="concepto"> -->
                                <textarea name="concepto" id="concepto" cols="30" rows="3" class="form-control input"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="m-0">Descripcion: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <!-- <input type="text" class="form-control" id="descripcion" name="descripcion"> -->
                                <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control input"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 alert alert-info">
                            <p class="m-0">
                                Si ingresa nuevo archivo, el archivo anterior se reemplazara
                            </p>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="m-0">Archivo: <a href="{{ route('ver-archivo') }}" target="_blank" class="text-success fileCotizacion"><i class="fa fa-file-pdf"></i> Archivo</a></label>
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
                                <select name="estadoCotizacion" id="estadoCotizacion" class="form-control">
                                    <option disabled>Seleccione opcion</option>
                                    <option value="1" selected>Activa</option>
                                    <option value="2">Finalizada</option>
                                    <option value="3">Borrador</option>
                                </select>
                            </div>
                        </div>
                    </div> 
                    </form>
                </div>
                <div class="card-footer py-1 border-transparent">
                    <button type="button" class="btn btn-success float-right guardarCambios ml-2"><i class="fa fa-save"></i> Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// localStorage.setItem("sbd",1);
// localStorage.setItem("sba",4);
    // var tablaDeRegistros;
    // var flip=0;
    
    $(document).ready( function () {
        loadCotizacion();
        initValidate();
        $('.overlayPagina').css("display","none");
        
        // var Toast = Swal.mixin({
        //     toast: true,
        //     position: 'top-end',
        //     showConfirmButton: false,
        //     timer: 3000
        // });
        // Toast.fire({
        //     icon: 'error',
        //     title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        // });
        $('#ifechaCotizacion').datetimepicker({format: 'YYYY-MM-DD'});
        $('#ifechaFinalizacion').datetimepicker({format: 'YYYY-MM-DD'});
        $('#ihoraCotizacion').datetimepicker({format: 'LT'});
        $('#ihoraFinalizacion').datetimepicker({format: 'LT'});
    });
    $('.guardarCambios').on('click',function(){
        guardarCambios();
    });
    $('.inputDate').on('click',function(){
        $(this).parent().find('.input-group-prepend').click();
    });
    function rules()
    {
        return {
            numeroCotizacion: {
                required: true,
            },
            tipo: {
                required: true,
            },
            unidadEjecutora: {
                required: true,
            },
            documento: {
                required: true,
            },
            fechaCotizacion: {
                required: true,
            },
            fechaFinalizacion: {
                required: true,
            },
            concepto: {
                required: true,
            },
            estado: {
                required: true,
            },
        };
    }
    function loadCotizacion()
    {
        jQuery.ajax({
            url: "{{ url('cotizacion/show') }}",
            method: 'POST', 
            data: {id:localStorage.getItem("idCot")},
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
                // limpiarForm();
                $('#numeroCotizacion').val(r.data.numeroCotizacion);
                $('#tipo').val(r.data.tipo);
                // $('#unidadEjecutora').val(r.data.unidadEjecutora);
                $('#documento').val(r.data.documento);
                $('#fechaCotizacion').val(r.data.fechaCotizacion);
                $('#horaCotizacion').val(r.data.horaCotizacion);
                console.log(r.data.fechaFinalizacion);
                $('#fechaFinalizacion').val(r.data.fechaFinalizacion);
                $('#horaFinalizacion').val(r.data.horaFinalizacion);
                
                $('#concepto').val(r.data.concepto);
                $('#descripcion').val(r.data.descripcion);
                $('#file').val(r.data.file);
                $('#estadoCotizacion').val(r.data.estadoCotizacion);
                var dir = $('.fileCotizacion').attr('href');
                $('.fileCotizacion').attr('href',dir+'/'+r.data.archivo);
                $('.overlayRegistros').css("display","none");
                
                
            },
            error: function (xhr, status, error) {
                alert('salio un error');
            }
        });
    }
    function initValidate()
    {
        $('#efvcotizacion').validate({
            rules: rules(),
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            }
        });
    }
    function guardarCambios()
    {
        if($('#efvcotizacion').valid()==false)
        {return;}
        var formData = new FormData($("#efvcotizacion")[0]);
        formData.append('id', localStorage.getItem("idCot")); 
        $('.guardarCambios').prop('disabled',true); 
        jQuery.ajax({
            url: "{{ url('cotizacion/guardarCambios') }}",
            method: 'POST', 
            data: formData,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
                if (r.estado) 
                {
                    // $('.guardar').prop('disabled',false); 
                    Swal.fire({
                        title: "COTIZACION",
                        text: r.message,
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                        allowOutsideClick: false, 
                        allowEscapeKey: false, 
                        showCancelButton: false,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{url('cotizacion/ver')}}";
                        }
                    });
                } 
                else 
                {
                    $('.overlayRegistros').css("display","none");
                    msjRee(r);
                }
                $('.guardarCambios').prop('disabled',false);
            },
            error: function (xhr, status, error) {
                alert('salio un error');
            }
        });
    }
</script>
@endsection