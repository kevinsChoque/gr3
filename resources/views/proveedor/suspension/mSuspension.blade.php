<div class="modal fade" id="mSuspension" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-slash"></i> Agregar suspension</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<div class="row datosProveedor">
                    <div class="col-lg-12 my-2">
                        <h4 class="text-center font-weight-bold">Datos de Proveedor</h4>
                    </div>
                    <div class="col-lg-3">
                        <p class="text-sm">Tipo persona:
                            <b class="d-block tipoPersona">-</b>
                        </p>
                    </div> 
					<div class="col-lg-3">
                        <p class="text-sm">Ruc:
                            <b class="d-block numeroDocumento">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Razon social:
                            <b class="d-block razonSocial pj">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Nombre:
                            <b class="d-block personaNatural pn">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Direccion:
                            <b class="d-block direccion">-</b>
                        </p>
                    </div> 
				</div>
                <hr>
                <form id="fvsuspension">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label class="m-0">Motivo: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <textarea name="motivo" id="motivo" cols="30" rows="5" class="form-control input"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="m-0">Observacion:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <textarea name="obs" id="obs" cols="30" rows="5" class="form-control input"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="m-0">Archivo: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="file" id="file" name="file" class="form-control input">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="m-0">Fecha de inicio: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="date" id="fechaInicio" name="fechaInicio" class="form-control input">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="m-0">Fecha de finalizacion: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="date" id="fechaFinalizacion" name="fechaFinalizacion" class="form-control input">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success guardarSuspension"><i class="fa fa-save"></i> Guardar suspension</button>
            </div>
        </div>
    </div>
</div>
<script>	
$(document).ready( function () {
    $.validator.addMethod("extensionPdf", function(value, element) {
        return this.optional(element) || value.toLowerCase().endsWith(".pdf");
    }, "Solo se permiten archivos PDF");
    $.validator.addMethod("greaterThan", function(value, element, params) {
        var startDate = new Date(value);
        var endDate = new Date($(params).val());
        return startDate > endDate;
    }, "La fecha debe ser mayor que la fecha de inicio.");
    initFv('fvsuspension',rulesSuspension());
});
function addSuspension(id)
{
    cleanFormSuspension();
    jQuery.ajax(
    { 
        url: "{{ url('proveedor/editar') }}",
        data: {id:id},
        method: 'post',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            idPro = r.data.idPro;
            $('.datosProveedor .tipoPersona').html(r.data.tipoPersona);
            $('.datosProveedor .numeroDocumento').html(r.data.numeroDocumento);
            $('.datosProveedor .razonSocial').html(r.data.razonSocial);
            $('.datosProveedor .personaNatural').html(r.data.nombre+' '+r.data.apellidoPaterno+' '+r.data.apellidoMaterno);
            $('.datosProveedor .direccion').html(r.data.direccion);
            if(r.data.tipoPersona=='PERSONA JURIDICA')
            {
                $('.datosProveedor .pn').parent().parent().css('display','none');
                $('.datosProveedor .pj').parent().parent().css('display','block');
            }
            else
            {
                $('.datosProveedor .pn').parent().parent().css('display','block');
                $('.datosProveedor .pj').parent().parent().css('display','none');
            }
            $('#mSuspension').modal('show');
        }
    });
}
$('.guardarSuspension').on('click',function(){
    guardarSuspension();
});
function rulesSuspension()
{
    return {
        motivo: {required: true,},
        file: {required: true,extensionPdf: "pdf"},
        fechaInicio: {required: true},
        fechaFinalizacion: {required: true,greaterThan: "#fechaInicio"}
    };
}
function guardarSuspension()
{
    if($('#fvsuspension').valid()==false)
    {return;}
    var formData = new FormData($("#fvsuspension")[0]);
    formData.append('idPro',idPro);
    $('.guardarSuspension').prop('disabled',true); 
    jQuery.ajax({
        url: "{{ url('suspension/guardar') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            if (r.estado) {
                $('.guardarSuspension').prop('disabled',false); 
                construirTabla();
                fillRegistros();
                $('#mSuspension').modal('hide');
                msjRee(r);
            } 
            else 
                msjRee(r);
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
function cleanFormSuspension()
{
	cleanFv('fvsuspension');
    $('#fvsuspension .input').val('');
}
</script>