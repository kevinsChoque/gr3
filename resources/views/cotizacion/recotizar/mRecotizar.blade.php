<style>
    .modal-custom-size {
    max-width: 90%; /* Puedes ajustar el porcentaje según tus necesidades */
}
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
                    <!-- <div class="col-lg-6" style="background: linear-gradient(to right, #c1d4e2, #8db7be);"> -->
                    <div class="col-lg-6 pr-3" style="border-right: 4px solid #505048;">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                                <button class="btn btn-success float-right ml-2" onclick="addItemsM()"><i class="fa fa-plus"></i> Agregar items</button>
                                <button class="btn btn-success float-right" onclick="editarM()"><i class="fa fa-edit"></i> Modificar Cotizacion</button>
                            </div> -->
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
                                <p class="text-sm">Unidad ejecutora:
                                    <b class="d-block runidadEjecutora">-</b>
                                </p>
                            </div> 
                            <div class="col-lg-3">
                                <p class="text-sm">Documento:
                                    <b class="d-block rdocumento">-</b>
                                </p>
                            </div> 
                            <div class="col-lg-4">
                                <p class="text-sm">Fecha de la cotizacion:
                                    <b class="d-block rfechaCotizacion">-</b>
                                </p>
                            </div> 
                            <div class="col-lg-4">
                                <p class="text-sm">Fecha de la finalizacion:
                                    <b class="d-block rfechaFinalizacion">-</b>
                                </p>
                            </div> 
                            <div class="col-lg-4">
                                <p class="text-sm">Archivo:
                                    <a href="{{ route('ver-archivo') }}" class="d-block rfileCotizacion font-weight-bold" target="_blank" style="word-wrap: break-word;">-</a>
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
                            <div class="col-lg-4">
                                <p class="text-sm">Descripcion:
                                    <b class="d-block text-justify rdescripcion">-</b>
                                </p>
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="w-100 table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="35%">Nombre</th>
                                            <th width="10%">Clasificador</th>
                                            <th width="20%">Descripcion</th>
                                            <th width="15%">U.Medida</th>
                                            <th width="20%">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rlistItems">
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
                                    <textarea name="motivo" id="motivo" cols="30" rows="3" class="form-control inpRec"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="m-0">Archivo: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-file"></i></span>
                                    </div>
                                    <input type="file" class="form-control inpRec" id="file" name="file">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="m-0">Nueva fecha de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="date" class="form-control inpRec" id="newFechaCotizacion" name="newFechaCotizacion">
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="m-0">Nueva fecha de la finalizacion: <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-angle-right"></i></span>
                                    </div>
                                    <input type="date" class="form-control inpRec" id="newFechaFinalizacion" name="newFechaFinalizacion">
                                </div>
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
    // initFv('fvRecotizar',);
    $.validator.addMethod("extensionPdf", function(value, element) {
        return this.optional(element) || value.toLowerCase().endsWith(".pdf");
    }, "Solo se permiten archivos PDF");
    initFv('fvRecotizar',rulesRecotizacion());
});
$('.guardarRecotizacion').on('click',function(){
    guardarRecotizacion();
});
function rulesRecotizacion()
{
    return {
        motivo: {required: true,},
        file: {required: true,extensionPdf: "pdf"},
        newFechaCotizacion: {required: true,},
        newFechaFinalizacion: {required: true,}
    };
}
function guardarRecotizacion()
{
    if($('#fvRecotizar').valid()==false)
    {return;}
    var formData = new FormData($("#fvRecotizar")[0]);
    // alert('paso la validacion');

    formData.append('idCot', idM); 
    // formData.append('file', $('#archivo')[0].files.length>0?'true':'false');
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
            console.log(r);
            if (r.estado) 
            {
                cleanFormRecotizacion();
                // procedure(r);
                construirTabla();
                fillRegistros();
                $('.guardarRecotizacion').prop('disabled',false); 
                $('#mRecotizar').modal('hide');
                msjRee(r);
            } 
            else 
                msjRee(r);
        },
        error: function (xhr, status, error) {
            alert('salio un error');
        }
    });
}
function cleanFormRecotizacion()
{
    cleanFv('fvRecotizar');
    $('.inpRec').val('');
    // $('#estado').val('1');
}
function showDataRecotizar(r)
{
    idM = r.cot.idCot;
    let estateCotizacion = estadoCotizacion(r.cot.estadoCotizacion);
    $('.rnumeroCotizacion').html(r.cot.numeroCotizacion);
    $('.rtipo').html(r.cot.tipo);
    $('.runidadEjecutora').html(novDato(r.cot.unidadEjecutora));
    $('.rdocumento').html(r.cot.documento);
    $('.rfechaCotizacion').html(r.cot.fechaCotizacion);
    $('.rfechaFinalizacion').html(r.cot.fechaFinalizacion);
    $('.rconcepto').html(r.cot.concepto);
    $('.rdescripcion').html(r.cot.descripcion);
    $('.restadoCotizacion').html(estateCotizacion);
    var dir = $('.rfileCotizacion').attr('href');
    $('.rfileCotizacion').html(r.cot.archivo);
    $('.rfileCotizacion').attr('href',dir+'/'+r.cot.archivo);
    var html = '';
    for (var i = 0; i < r.items.length; i++) 
    {
        html += '<tr>' +
            '<td class="font-weight-bold">' + novDato(r.items[i].nombre) +'</td>' +
            '<td class="text-center">' + novDato(r.items[i].clasificador) + '</td>' +
            '<td class="text-center">' + novDato(r.items[i].descripcion) + '</td>' +
            '<td class="text-center"><span class="font-weight-bold badge badge-light shadow">'+ novDato(r.items[i].nombreUm) +'</span>' +
            '</td>' +
            '<td class="text-center">' + novDato(r.items[i].cantidad) + '</td>' +
        '</tr>';
    }
    $('#rlistItems').html(html);
    $('#mRecotizar').modal('show');
}
</script>