<style>
    .modal-custom-size {max-width: 90%; }
</style>
<div class="modal fade" id="mRecotizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-custom-size" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-calendar"></i> Recotizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 pr-3" style="border-right: 4px solid #505048;">
                        <div class="row">
                            <div class="col-lg-12 my-2">
                                <h4 class="text-center font-weight-bold">Datos de cotizacion</h4>
                            </div>
                            <div class="col-lg-3">
                                <p class="text-sm">Numero de cotizacion:
                                    <b class="d-block rnumeroCotizacion">-</b>
                                </p>
                            </div> 
                            <div class="col-lg-3">
                                <p class="text-sm">Tipo de cotizacion:
                                    <b class="d-block rtipo">-</b>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <p class="text-sm">Archivo:
                                    <!-- <a href="{{ route('ver-archivo') }}" class="d-block rfileCotizacion font-weight-bold" target="_blank" style="word-wrap: break-word;">-</a> -->
                                    <span class="fa fa-file-pdf fa-lg showDeepFileRec text-primary d-block" style="cursor: pointer;"></span>
                                </p>
                            </div> 
                            <div class="col-lg-3">
                                <p class="text-sm">Numero de CCMN:
                                    <b class="d-block rdocumento">-</b>
                                </p>
                            </div> 
                            <div class="col-lg-4">
                                <p class="text-sm">Fecha de la cotizacion:
                                    <b class="d-block rfechaCotizacion2" style="display: none !important;">-</b>
                                    <b class="d-block rfechaCotizacion">-</b>
                                    <b class="d-block rhoraCotizacion">-</b>
                                </p>
                            </div> 
                            <div class="col-lg-4">
                                <p class="text-sm">Fecha de la finalizacion:
                                    <b class="d-block rfechaFinalizacion2" style="display: none !important;">-</b>
                                    <b class="d-block rfechaFinalizacion">-</b>
                                    <b class="d-block rhoraFinalizacion">-</b>
                                </p>
                            </div> 
                            
                            <div class="col-lg-4">
                                <p class="text-sm">Estado:
                                    <b class="d-block"><span class="badge badge-light restadoCotizacion" style="font-size: 1rem;"></span></b>
                                </p>
                            </div> 
                            <div class="col-lg-4">
                                <p class="text-sm">Concepto:
                                    <b class="d-block text-justify rconcepto">-</b>
                                </p>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12 m-auto p-3 shadow contenedorRegistrosEditar">
                                <table id="registrosItemsRec" class="w-100 table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="35%">Nombre</th>
                                            <th width="15%">U.Medida</th>
                                            <th width="20%">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listItemsRec">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pl-3">
                        <form id="fvRecotizar">
                        <div class="row">
                            <div class="col-lg-12 my-2">
                                <h4 class="text-center font-weight-bold">Datos de la RECOTIZACION</h4>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="m-0">Motivo: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <!-- <textarea name="motivo" id="motivo" cols="30" rows="3" class="form-control inpRec"></textarea> -->
                                    <select name="motivo" id="motivo" class="form-control inpRec">
                                        <option disabled selected>Seleccione una opcion</option>
                                        <option value="motivo1">motivo1</option>
                                        <option value="motivo2">motivo2</option>
                                        <option value="motivo3">motivo3</option>
                                        <option value="motivo4">motivo4</option>
                                        <option value="motivo5">motivo5</option>
                                        <option value="motivo6">motivo6</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group col-lg-6">
                                <label class="m-0">Nueva fecha de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="date" class="form-control inpRec" id="newFechaCotizacion" name="newFechaCotizacion">
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="m-0">Nueva fecha de la Cotizacion: <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="inewFechaCotizacion" data-target-input="nearest">
                                        <div class="input-group-prepend" data-target="#inewFechaCotizacion" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input inputDate" data-target="#inewFechaCotizacion" id="newFechaCotizacion" name="newFechaCotizacion">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="m-0">Hora de la finalizacion: <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="inewHoraCotizacion" data-target-input="nearest">
                                        <div class="input-group-prepend" data-target="#inewHoraCotizacion" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input inputDate" data-target="#inewHoraCotizacion" id="newHoraCotizacion" name="newHoraCotizacion" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group col-lg-6">
                                <label class="m-0">Nueva fecha de la finalizacion: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="date" class="form-control inpRec" id="newFechaFinalizacion" name="newFechaFinalizacion">
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="m-0">Nueva fecha de la finalizacion: <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="inewFechaFinalizacion" data-target-input="nearest">
                                        <div class="input-group-prepend" data-target="#inewFechaFinalizacion" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input inputDate" data-target="#inewFechaFinalizacion" id="newFechaFinalizacion" name="newFechaFinalizacion" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="m-0">Hora de la finalizacion: <span class="text-danger">*</span></label>
                                    <div class="input-group date" id="inewHoraFinalizacion" data-target-input="nearest">
                                        <div class="input-group-prepend" data-target="#inewHoraFinalizacion" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                        </div>
                                        <input type="text" class="form-control datetimepicker-input inputDate" data-target="#inewHoraFinalizacion" id="newHoraFinalizacion" name="newHoraFinalizacion" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group col-lg-12">
                                <label class="m-0">Archivo: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-file"></i></span>
                                    </div>
                                    <input type="file" class="form-control inpRec" id="file" name="file">
                                </div>
                            </div> -->
                            <div class="col-lg-12">
                                <!-- <div class="alert alert-info py-1">
                                    <p class="m-0">El archivo de la <strong>RE-COTIZACION</strong> es opcional.</p>
                                </div> -->
                                <div class="callout callout-info">
                                    <h6 class="m-0">El archivo de la <strong>RE-COTIZACION</strong> es opcional.</h6>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="alert text-center boxFileRec h-100 d-flex flex-column justify-content-center" style="border: 4px dashed #000;background: #ebeff5;">
                                    <h5 class="font-italic font-weight-bold m-auto nameFile">ARCHIVO DE RE-COTIZACION</h5>
                                    <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                    <p class="m-auto"><i class="fa fa-upload fa-2x"></i></p>
                                </div>
                                <input type="file" id="fileCotizacion" name="file" class="pdfFile" style="display: none;" data-name="ARCHIVO DE RE-COTIZACION">
                            </div>
                              
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success float-right ml-2 guardarRecotizacion"><i class="fa fa-save"></i> Registrar recotizacion</button>
            </div>
        </div>
    </div>
</div>

<script>    
var idM = '';
$(document).ready( function () {
    // validacion personalizada para verificar la extension del archivo
    $.validator.addMethod("extensionPdf", function(value, element) {
        return this.optional(element) || value.toLowerCase().endsWith(".pdf");
    }, "Solo se permiten archivos PDF");
    // inicializamosel formulario con las reglas de validacion rulesRecotizacion
    initFv('fvRecotizar',rulesRecotizacion());
    $('#inewFechaCotizacion').datetimepicker({format: 'YYYY-MM-DD',minDate: moment(),daysOfWeekDisabled: [0, 6], });
    $('#inewHoraCotizacion').datetimepicker({format: 'LT'});
    $('#inewFechaFinalizacion').datetimepicker({format: 'YYYY-MM-DD',minDate: moment()});
    $('#inewHoraFinalizacion').datetimepicker({format: 'LT'});

});
// $('#inewFechaFinalizacion').on('dp.change', function(e) 
// {
    // alert('esta en el change');
    // var fechaCotizacion = $('#inewFechaCotizacion').data("DateTimePicker").date();
    // var fechaFinalizacion = $('#inewFechaFinalizacion').data("DateTimePicker").date();

    // if (fechaCotizacion && fechaFinalizacion && fechaFinalizacion.isBefore(fechaCotizacion)) {
    //     alert('La fecha de finalización debe ser posterior a la fecha de cotización.');
    //     // Puedes revertir la selección a la fecha de cotización o tomar otra acción según tus necesidades.
    //     $('#inewFechaFinalizacion').data("DateTimePicker").date(fechaCotizacion);
    // }
// });
// $('#inewFechaFinalizacion').on('dp.change', function(e){ console.log(e.date); })
$('.showDeepFileRec').on('click',function(){
    showFile(idM);
})
$('.guardarRecotizacion').on('click',function(){guardarRecotizacion();});
function rulesRecotizacion()
{
    return {
        motivo: {required: true,},
        file: {extensionPdf: "pdf"},
        newFechaCotizacion: {required: true,},
        newFechaFinalizacion: {required: true,},
        newHoraCotizacion: {required: true,},
        newHoraFinalizacion: {required: true,}
    };
}

function guardarRecotizacion()
{
    if($('#fvRecotizar').valid()==false)
    {return;}
    // if($('#fileCotizacion')[0].files.length==0)
    // {msjSimple(false,"No se subio el documento de la RE-COTIZACION.");return;}
    var formData = new FormData($("#fvRecotizar")[0]);
    formData.append('idCot', idM); 
    
    $('.guardarRecotizacion').prop('disabled',true); 
    jQuery.ajax({
        url: "{{ url('recotizacion/guardar') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            if (r.estado) 
            {
                cleanFormRecotizacion();
                construirTabla();
                fillRegistros();
                $('#mRecotizar').modal('hide');
                msjRee(r);
            } 
            else 
                msjRee(r);
            $('.guardarRecotizacion').prop('disabled',false); 
        },
        error: function (xhr, status, error) {
            $('.guardarRecotizacion').prop('disabled',false); 
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
function cleanFormRecotizacion()
{
    cleanFv('fvRecotizar');
    $('.inpRec').val('');
}
// nos muestra los datos de la cotizacion el cual ya esta finalizada,
// como tambien nos muestra los items
function showDataRecotizar(r)
{
    idM = r.cot.idCot;
    let estateCotizacion = estadoCotizacion(r.cot.estadoCotizacion);
    $('.rnumeroCotizacion').html(r.cot.numeroCotizacion);
    $('.rtipo').html(r.cot.tipo);
    // $('.runidadEjecutora').html(novDato(r.cot.unidadEjecutora));
    $('.rdocumento').html(r.cot.documento);
    $('.rfechaCotizacion2').html(r.cot.fechaCotizacion);
    $('.rfechaCotizacion').html(formatoFecha(r.cot.fechaCotizacion));
    $('.rhoraCotizacion').html(r.cot.horaCotizacion);
    $('.rfechaFinalizacion2').html(r.cot.fechaFinalizacion);
    $('.rfechaFinalizacion').html(formatoFecha(r.cot.fechaFinalizacion));
    $('.rhoraFinalizacion').html(r.cot.horaFinalizacion);
    $('.rconcepto').html(r.cot.concepto);
    // $('.rdescripcion').html(r.cot.descripcion);
    $('.restadoCotizacion').html(estateCotizacion);
    var dir = $('.rfileCotizacion').attr('href');
    
    $('.rfileCotizacion').html('<i class="fa fa-file-pdf fa-lg"></i>');
    $('.rfileCotizacion').attr('href',dir+'/'+r.cot.archivo);
    // var html = '';
    // for (var i = 0; i < r.items.length; i++) 
    // {
    //     html += '<tr>' +
    //         '<td class="font-weight-bold">' + novDato(r.items[i].nombre) +'</td>' +
    //         '<td class="text-center">' + novDato(r.items[i].clasificador) + '</td>' +
    //         '<td class="text-center">' + novDato(r.items[i].descripcion) + '</td>' +
    //         '<td class="text-center"><span class="font-weight-bold badge badge-light shadow">'+ novDato(r.items[i].nombreUm) +'</span>' +
    //         '</td>' +
    //         '<td class="text-center">' + novDato(r.items[i].cantidad) + '</td>' +
    //     '</tr>';
    // }
    // $('#rlistItems').html(html);
    $('#mRecotizar').modal('show');
    showItemsRec()
}
function showItemsRec()
{
    jQuery.ajax({
        url: "{{ url('itemSiga/showItems') }}",
        method: 'post', 
        data: {idCot:idM},
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            // console.log(r);
            if (r.estado)
            {
                construirTablaEditar()
                var html = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    html += '<tr>' +
                        '<td class="font-weight-bold nombreItem">' + novDato(r.data[i].nombre) + '</td>' +
                        '<td class="text-center font-weight-bold umItem">' + novDato(r.data[i].um) + '</td>' +
                        '<td class="text-center font-weight-bold cantItem">' + novDato(r.data[i].cantidad) + '</td>'+
                    '</tr>';
                }
                $('#listItemsRec').html(html);
                initDatatable('registrosItemsRec');
            }
            else
            {
                msjError("Algo salio mal, porfavor contactese con el Administrador.");
            }
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
</script>
<script>
$('.boxFileRec').on('click',function(){
    $(this).parent().find('input.pdfFile').click();
});
$('.pdfFile').on('change',function(){
    let nameFile = $(this).val().split('\\').pop();
    if (/\.(pdf)$/i.test(nameFile))
    {
        $(this).parent().find('.nameFile').html($(this).attr('data-name')+': '+nameFile);
        $(this).parent().find('.msgClick').remove();
        $(this).parent().find('i').removeClass('fa fa-upload fa-lg');
        $(this).parent().find('i').addClass('fa fa-file-pdf fa-lg');
        $(this).parent().find('.boxFileRec').css('border','4px solid #000');
    }
    else
    {
        $(this).val('');
        alert('Selecciona un archivo PDF válido.');
    }
});
</script>