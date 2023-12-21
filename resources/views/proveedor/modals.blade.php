<!-- modal modalRegistrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <!-- <div class="overlay overlayRegistros">
                <div class="spinner"></div>
            </div> -->
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-building"></i> Nuevo Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fvproveedor">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Tipo de persona: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <select name="tipoPersona" id="tipoPersona" class="form-control tipoPersona">
                                <option disabled> Seleccione una opcion</option>
                                <option value="PERSONA NATURAL">PERSONA NATURAL</option>
                                <option value="PERSONA JURIDICA" selected>PERSONA JURIDICA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">RUC: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control numeroDocumento soloNumeros input" id="numeroDocumento" name="numeroDocumento" maxlength="11">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Razon Social: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj razonSocial input" id="razonSocial" name="razonSocial">
                        </div>
                    </div>
                    <div class="form-group col-lg-4" style="display: none;">
                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pn nombre input" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-4" style="display: none;">
                        <label for="" class="m-0">Apellido paterno: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pn apellidoPaterno input" id="apellidoPaterno" name="apellidoPaterno">
                        </div>
                    </div>
                    <div class="form-group col-lg-4" style="display: none;">
                        <label for="" class="m-0">Apellido materno: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pn apellidoMaterno input" id="apellidoMaterno" name="apellidoMaterno">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Direccion: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="direccion" name="direccion">
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Activo (SUNAT): <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <select name="activo" id="activo" class="form-control activo">
                                <option disabled>Seleccione opcion</option>
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Habido (SUNAT): <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <select name="habido" id="habido" class="form-control habido">
                                <option disabled>Seleccione opcion</option>
                                <option value="1" selected>Habido</option>
                                <option value="0">No habido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">DNI del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj soloNumeros input" id="dniRep" name="dniRep" maxlength="8">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Nombre del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="nombreRep" name="nombreRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Apellido paterno del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="apellidoPaternoRep" name="apellidoPaternoRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Apellido materno del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="apellidoMaternoRep" name="apellidoMaternoRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Direccion del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="direccionRep" name="direccionRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Correo: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="correo" name="correo">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Celular: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control soloNumeros input" id="celular" name="celular" maxlength="9">
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Observacion:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <textarea name="obs" id="obs" cols="30" rows="3" class="form-control input"></textarea>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success guardar"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal modalEditar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-building"></i> Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="efvproveedor">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Tipo de persona: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <select name="tipoPersona" id="tipoPersona" class="form-control tipoPersona">
                                <option disabled> Seleccione una opcion</option>
                                <option value="PERSONA NATURAL">PERSONA NATURAL</option>
                                <option value="PERSONA JURIDICA" selected>PERSONA JURIDICA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">RUC: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control numeroDocumento soloNumeros input" id="numeroDocumento" name="numeroDocumento" maxlength="11">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Razon Social: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj razonSocial input" id="razonSocial" name="razonSocial">
                        </div>
                    </div>
                    <div class="form-group col-lg-4" style="display: none;">
                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pn nombre input" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-4" style="display: none;">
                        <label for="" class="m-0">Apellido paterno: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pn apellidoPaterno input" id="apellidoPaterno" name="apellidoPaterno">
                        </div>
                    </div>
                    <div class="form-group col-lg-4" style="display: none;">
                        <label for="" class="m-0">Apellido materno: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pn apellidoMaterno input" id="apellidoMaterno" name="apellidoMaterno">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Direccion: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="direccion" name="direccion">
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Activo (SUNAT): <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <select name="activo" id="activo" class="form-control activo">
                                <option disabled>Seleccione opcion</option>
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="" class="m-0">Habido (SUNAT): <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <select name="habido" id="habido" class="form-control habido">
                                <option disabled>Seleccione opcion</option>
                                <option value="1" selected>Habido</option>
                                <option value="0">No habido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">DNI del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj soloNumeros input" id="dniRep" name="dniRep" maxlength="8">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Nombre del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="nombreRep" name="nombreRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Apellido paterno del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="apellidoPaternoRep" name="apellidoPaternoRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Apellido materno del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="apellidoMaternoRep" name="apellidoMaternoRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Direccion del representante:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control pj input" id="direccionRep" name="direccionRep">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Correo: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="correo" name="correo">
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="" class="m-0">Celular: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control soloNumeros input" id="celular" name="celular" maxlength="9">
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="" class="m-0">Observacion:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <textarea name="obs" id="obs" cols="30" rows="3" class="form-control input"></textarea>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success guardarCambios"><i class="fa fa-save"></i> Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="{{asset('js/modificacionJqueryValidate.js')}}"></script> -->
<script>    
var idPro = '';
$(document).ready( function () {
    $.validator.addMethod("lettersOnly", function(value, element) {
        return this.optional(element) || /^[A-Za-z]+$/.test(value);
    }, "Este campo debe contener solo letras.");
    // initValidate();
    initFv('fvproveedor',rules());
    einitValidate();
});
$('.guardar').on('click',function(){
    guardar();
});
$('#fvproveedor .tipoPersona').on('change',function(){
    changeTipoPersona($(this).val());
});
$('#efvproveedor .tipoPersona').on('change',function(){
    echangeTipoPersona($(this).val());
});
$('.guardarCambios').on('click',function(){
    guardarCambios();
});

function changeTipoPersona()
{
    if($('#fvproveedor .tipoPersona').val()=='PERSONA NATURAL')
    {
        $('#fvproveedor .nombre').rules('add', {
            required: true
        });
        $('#fvproveedor .apellidoPaterno').rules('add', {
            required: true
        });
        $('#fvproveedor .apellidoMaterno').rules('add', {
            required: true
        });
        $('#fvproveedor .razonSocial').rules('remove', 'required');
        // $('.razonSocial').rules('remove', ['required', 'otraRegla']);
        $('#fvproveedor .pj').val('');
        cleanFv('fvproveedor');
        $('#fvproveedor .pj').parent().parent().css('display','none');
        $('#fvproveedor .pn').parent().parent().css('display','block');
    }
    else
    {
        $('#fvproveedor .razonSocial').rules('add', {
            required: true
        });
        $('#fvproveedor .nombre').rules('remove', 'required');
        $('#fvproveedor .apellidoPaterno').rules('remove', 'required');
        $('#fvproveedor .apellidoMaterno').rules('remove', 'required');
        $('#fvproveedor .pn').val('');
        cleanFv('fvproveedor');
        $('#fvproveedor .pn').parent().parent().css('display','none');
        $('#fvproveedor .pj').parent().parent().css('display','block');
    }

}
function echangeTipoPersona()
{
    if($('#efvproveedor .tipoPersona').val()=='PERSONA NATURAL')
    {
        $('#efvproveedor .nombre').rules('add', {required: true});
        $('#efvproveedor .apellidoPaterno').rules('add', {required: true});
        $('#efvproveedor .apellidoMaterno').rules('add', {required: true});
        $('#efvproveedor .razonSocial').rules('remove', 'required');
        // $('#efvproveedor .pj').val('');
        cleanFv('efvproveedor');
        $('#efvproveedor .pj').parent().parent().css('display','none');
        $('#efvproveedor .pn').parent().parent().css('display','block');
    }
    else
    {
        $('#efvproveedor .razonSocial').rules('add', {required: true});
        $('#efvproveedor .nombre').rules('remove', 'required');
        $('#efvproveedor .apellidoPaterno').rules('remove', 'required');
        $('#efvproveedor .apellidoMaterno').rules('remove', 'required');
        // $('#efvproveedor .pn').val('');
        cleanFv('efvproveedor');
        $('#efvproveedor .pn').parent().parent().css('display','none');
        $('#efvproveedor .pj').parent().parent().css('display','block');
    }

}
function guardar()
{
    if($('#fvproveedor').valid()==false)
    {   return;}
    var formData = new FormData($("#fvproveedor")[0]);
    // $('.guardar').prop('disabled',true);
    jQuery.ajax(
    { 
        url: "{{ url('proveedor/guardar') }}",
        data: formData,
        method: 'post',
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            console.log(r);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            limpiarForm();
            $('#modalRegistrar').modal('hide');
            msjRee(r);
        }
    });
}
function editar(id)
{
    // $('#modalEditar').modal('show');
    jQuery.ajax(
    { 
        url: "{{ url('proveedor/editar') }}",
        data: {id:id},
        method: 'post',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            console.log(r);
            cleanFv('efvproveedor');
            idPro = r.data.idPro;
            $('#efvproveedor .tipoPersona').val(r.data.tipoPersona);
            $('#efvproveedor .numeroDocumento').val(r.data.numeroDocumento);
            $('#efvproveedor #direccion').val(r.data.direccion);
            $('#efvproveedor .activo').val(r.data.activo);
            $('#efvproveedor .habido').val(r.data.habido);
            $('#efvproveedor #correo').val(r.data.correo);
            $('#efvproveedor #celular').val(r.data.celular);
            $('#efvproveedor #obs').val(r.data.obs);
            if(r.data.tipoPersona=='PERSONA JURIDICA')
            {
                $('#efvproveedor .razonSocial').rules('add', {required: true});
                $('#efvproveedor .nombre').rules('remove', 'required');
                $('#efvproveedor .apellidoPaterno').rules('remove', 'required');
                $('#efvproveedor .apellidoMaterno').rules('remove', 'required');
                $('#efvproveedor .pn').val('');
                // --
                $('#efvproveedor .razonSocial').val(r.data.razonSocial);
                $('#efvproveedor #dniRep').val(r.data.dniRep);
                $('#efvproveedor #nombreRep').val(r.data.nombreRep);
                $('#efvproveedor #apellidoPaternoRep').val(r.data.apellidoPaternoRep);
                $('#efvproveedor #apellidoMaternoRep').val(r.data.apellidoMaternoRep);
                $('#efvproveedor #direccionRep').val(r.data.direccionRep);
                $('#efvproveedor .pj').parent().parent().css('display','block');
                $('#efvproveedor .pn').parent().parent().css('display','none');
            }
            else
            {
                $('#efvproveedor .nombre').rules('add', {required: true});
                $('#efvproveedor .apellidoPaterno').rules('add', {required: true});
                $('#efvproveedor .apellidoMaterno').rules('add', {required: true});
                $('#efvproveedor .razonSocial').rules('remove', 'required');
                $('#efvproveedor .pj').val('');
                // --
                $('#efvproveedor .nombre').val(r.data.nombre);
                $('#efvproveedor .apellidoPaterno').val(r.data.apellidoPaterno);
                $('#efvproveedor .apellidoMaterno').val(r.data.apellidoMaterno);
                $('#efvproveedor .pj').parent().parent().css('display','none');
                $('#efvproveedor .pn').parent().parent().css('display','block');
            }
            $('#modalEditar').modal('show');
        }
    });
}
function guardarCambios()
{
    if($('#efvproveedor').valid()==false)
    {return;}
    if($('#efvproveedor .tipoPersona').val()=='PERSONA NATURAL')
        $('#efvproveedor .pj').val('');
    else
        $('#efvproveedor .pn').val('');
    var formData = new FormData($("#efvproveedor")[0]);
    formData.append('idPro',idPro);
    // var idRuta = {idRuta: $('#idRuta').val(),};
    // var datos = data(false);
    // Object.assign(datos,idRuta);
    jQuery.ajax(
    { 
        url: "{{ url('proveedor/guardarCambios') }}",
        data: formData,
        method: 'post',
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            console.log(r);
            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            construirTabla();
            fillRegistros();
            $('#modalEditar').modal('hide');
            msjRee(r);
        }
    });
}

function rules()
{
    return {
        tipoPersona: {
            required: true,
        },
        numeroDocumento: {
            required: true,
            digits: true,
            minlength: 11
        },
        razonSocial: {
            required: true,
        },
        direccion: {
            required: true,
        },
        activo: {
            required: true,
        },
        habido: {
            required: true,
        },
        dniRep: {
            digits: true,
            minlength: 8
        },
        nombreRep: {
            lettersOnly: true
        },
        apellidoPaternoRep: {
            lettersOnly: true
        },
        apellidoMaternoRep: {
            lettersOnly: true
        },
        correo: {
            required: true,
        },
        celular: {
            required: true,
            minlength: 9
        }
    };
}
function erules()
{
    return {
        tipoPersona: {
            required: true,
        },
        numeroDocumento: {
            required: true,
            digits: true,
            minlength: 11
        },
        razonSocial: {
            required: true,
        },
        direccion: {
            required: true,
        },
        activo: {
            required: true,
        },
        habido: {
            required: true,
        },
        dniRep: {
            digits: true,
            minlength: 8
        },
        nombreRep: {
            lettersOnly: true
        },
        apellidoPaternoRep: {
            lettersOnly: true
        },
        apellidoMaternoRep: {
            lettersOnly: true
        },
        correo: {
            required: true,
        },
        celular: {
            required: true,
            minlength: 9
        }
    };
}
function einitValidate()
{
    $('#efvproveedor').validate({
        rules: erules(),
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
// $("#formValidateEdit").validate({
//     errorClass: "text-danger font-italic font-weight-normal",
//     ignore: ".ignore",
//     rules: {
//         enombre: "required",
//     },
// });
</script>