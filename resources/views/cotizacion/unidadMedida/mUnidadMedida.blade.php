<!-- modal mUnidadMedida -->
<div class="modal fade" id="mUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-doctor"></i> Unidad de medida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form id="fvitem">
    				<div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <!-- <label class="m-0">Unidad de medida:</label> -->
                                <select name="unidadMedida" id="unidadMedida" class="form-control select2" style="width: 100%;">
                                    <option disabled selected value="0">Seleccionar unidad de medida</option>
                                </select>
                            </div>
                        </div> 
    				</div>
            	</form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sm btn-success seleccionar"><i class="fa fa-save"></i> Seleccionar</button>
            </div>
        </div>
    </div>
</div>
<script>	
$(document).ready( function () {
    fillUnidadMedida();
});
$('.seleccionar').on('click',function(){
    seleccionar();
});
function fillUnidadMedida()
{
    jQuery.ajax(
    { 
        url: "{{ url('unidadMedida/listar') }}",
        method: 'get',
        success: function(r){
            $.each(r.data,function(indice,fila){
                $('#unidadMedida').append("<option value='"+fila.idUm+"'>"+fila.nombre+' | ' + fila.descripcion+"</option>");
            });
            $('#unidadMedida').select2({
                placeholder:"Seleccione las rutas.",
                width:"resolve",
            });
        }
    });
}

</script>