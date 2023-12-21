<!-- modal mItems -->
<div class="modal fade" id="mItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-doctor"></i> Nuevo item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form id="fvitem">
    				<div class="row">
    					<div class="form-group col-lg-4">
	                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
	                        <div class="input-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text font-weight-bold"><i class="fa fa-eye"></i></span>
	                            </div>
	                            <input type="text" class="form-control inpItem" id="nombre" name="nombre">
	                        </div>
	                    </div>
	                    <div class="form-group col-lg-4">
	                        <label for="" class="m-0">Clasificador: <span class="text-danger">*</span></label>
	                        <div class="input-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text font-weight-bold"><i class="fa fa-eye"></i></span>
	                            </div>
	                            <input type="text" class="form-control inpItem" id="clasificador" name="clasificador">
	                        </div>
	                    </div>
	                    <div class="form-group col-lg-4">
	                        <label for="" class="m-0">Descripcion: <span class="text-danger">*</span></label>
	                        <div class="input-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text font-weight-bold"><i class="fa fa-eye"></i></span>
	                            </div>
	                            <input type="text" class="form-control inpItem" id="descripcion" name="descripcion">
	                        </div>
	                    </div>
	                    <!-- <div class="form-group col-lg-6">
	                        <label for="" class="m-0">Estado: <span class="text-danger">*</span></label>
	                        <div class="input-group">
	                            <div class="input-group-prepend">
	                                <span class="input-group-text font-weight-bold"><i class="fa fa-eye"></i></span>
	                            </div>
	                            <select name="estado" id="estado" class="form-control">
	                            	<option disabled>Seleccione una opcion</option>
	                            	<option value="1" selected>Activo</option>
	                            	<option value="0">Inactivo</option>
	                            </select>
	                        </div>
	                    </div> -->
    				</div>
            	</form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success guardarItem"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>	
$(document).ready( function () {
    initValidateItem();
});
$('.guardarItem').on('click',function(){
    guardarItem();
});
function rulesItem()
{
    return {
        nombre: {
            required: true,
        },
        clasificador: {
            required: true,
        },
        descripcion: {
            required: true,
        },
        // estado: {
        //     required: true,
        // },
    };
}
function initValidateItem()
{
    $('#fvitem').validate({
        rules: rulesItem(),
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
function guardarItem()
{
    if($('#fvitem').valid()==false)
    {return;}
    var formData = new FormData($("#fvitem")[0]);
    // formData.append('id', idDocumento); 
    // formData.append('file', $('#archivo')[0].files.length>0?'true':'false');
    $('.guardarItem').prop('disabled',true); 
    jQuery.ajax({
        url: "{{ url('item/guardar') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            if (r.estado) {
                limpiarFormItem();
                procedure(r);
                $('.guardarItem').prop('disabled',false); 
                $('#mItems').modal('hide');
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
function limpiarFormItem()
{
	cleanFv('fvitem');
    $('.inpItem').val('');
    // $('#estado').val('1');
}
</script>