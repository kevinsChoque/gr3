<div class="modal fade" id="modalActualizarDatos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-building"></i> Actualizar Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form id="fvproveedor">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-info">
                                <div class="card-header py-1"><h3 class="card-title font-weight-bold font-italic"><i class="fa fa-user-tie"></i> Datos de proveedor</h3></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label class="m-0">Tipo de persona: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <select name="tipoPersona" id="tipoPersona" class="form-control tipoPersona" disabled>
                                                    <option disabled value="0"> Seleccione una opcion</option>
                                                    <option value="PERSONA NATURAL">PERSONA NATURAL</option>
                                                    <option value="PERSONA JURIDICA" selected>PERSONA JURIDICA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="m-0">Numero de documento: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control input numeroDocumento soloNumeros" id="numeroDocumento" name="numeroDocumento" maxlength="11">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="m-0">Razon social: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pj razonSocial input" id="razonSocial" name="razonSocial">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3" style="display: none;">
                                            <label class="m-0">Nombre: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pn nombre input" id="nombre" name="nombre">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3" style="display: none;">
                                            <label class="m-0">Apellido paterno: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pn apellidoPaterno input" id="apellidoPaterno" name="apellidoPaterno">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4" style="display: none;">
                                            <label class="m-0">Apellido materno: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pn apellidoMaterno input" id="apellidoMaterno" name="apellidoMaterno">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label class="m-0">Direccion: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control input" id="direccion" name="direccion">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="m-0">Activo (SUNAT): <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <select name="activo" id="activo" class="form-control activo">
                                                    <option disabled selected value="2">Seleccione opcion</option>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label class="m-0">Habido (SUNAT): <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <select name="habido" id="habido" class="form-control habido">
                                                    <option disabled selected value="2">Seleccione opcion</option>
                                                    <option value="1">Habido</option>
                                                    <option value="0">No habido</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group col-lg-4">
                                            <label class="m-0">Usuario: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control input" id="usuario" name="usuario" disabled>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 dataRepresentante" style="display: none;">
                            <div class="card card-info">
                                <div class="card-header py-1"><h3 class="card-title font-weight-bold font-italic"><i class="fa fa-id-card"></i> Datos del representante</h3></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-3">
                                            <label class="m-0">DNI: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pj soloNumeros input" id="dniRep" name="dniRep" maxlength="8">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="m-0">Nombre: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pj input" id="nombreRep" name="nombreRep">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="m-0">Apellido paterno: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pj input" id="apellidoPaternoRep" name="apellidoPaternoRep">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="m-0">Apellido materno: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pj input" id="apellidoMaternoRep" name="apellidoMaternoRep">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label class="m-0">Direccion: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control pj input" id="direccionRep" name="direccionRep">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-info">
                                <div class="card-header py-1"><h3 class="card-title font-weight-bold font-italic"><i class="fa fa-university"></i> Datos del banco</h3></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="m-0">Banco: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <!-- <input type="text" class="form-control input" id="banco" name="banco"> -->
                                                <select class="form-control input" id="banco" name="banco">
                                                    <option disabled selected>Seleccione el banco</option>
                                                    <option value="BCP">Banco de Crédito del Perú (BCP)</option>
                                                    <option value="banco de la nacion">Banco de la Nacion</option>
                                                    <option value="INTERBAK">Interbank</option>
                                                    <option value="SCOTIABANK">Scotiabank Perú</option>
                                                    <option value="BBVA">BBVA Continental</option>
                                                    <option value="BANCO PICHINCHA">Banco Pichincha</option>
                                                    <option value="Banco Financiero">Banco Financiero</option>
                                                    <option value="Banco Falabella">Banco Falabella</option>
                                                    <option value="Citibank Peru">Citibank Perú</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="m-0">CCI: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control input soloNumeros" id="cci" name="cci" maxlength="20">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-info">
                                <div class="card-header py-1"><h3 class="card-title font-weight-bold font-italic"><i class="fa fa-address-book"></i> Datos de contacto</h3></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label class="m-0">Correo: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control input" id="correo" name="correo">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="m-0">Celular: <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                                </div>
                                                <input type="text" class="form-control soloNumeros input" id="celular" name="celular" maxlength="9">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <button type="button" class="btn btn-success float-right save"><i class="fa fa-save"></i> Guardar datos</button>
                        </div> -->
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <!-- <button type="button" class="btn btn-success float-right saveChangePassword"><i class="fa fa-lock"></i> Cambiar contraseña</button> -->
                <button type="button" class="btn btn-success float-right save"><i class="fa fa-save"></i> Guardar datos</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready( function () {
    $.validator.addMethod("lettersOnly", function(value, element) {
        return this.optional(element) || /^[A-Za-z]+$/.test(value);
    }, "Este campo debe contener solo letras.");
    $('.containerDelete').remove(); //esto se eliminara despues que limpie todo
    // fillProveedor();
    initFv('fvproveedor',rules());
    // $('.overlayPagina').css("display","none");
    // $('.overlayRegistros').css("display","none");
});
function rules()
{
    return {
        tipoPersona: {required: true,},
        numeroDocumento: {required: true,digits: true,minlength: 11},
        razonSocial: {required: true,},
        direccion: {required: true,},
        activo: {required: true,},
        habido: {required: true,},
        dniRep: {digits: true,minlength: 8},
        nombreRep: {lettersOnly: true},
        apellidoPaternoRep: {lettersOnly: true},
        apellidoMaternoRep: {lettersOnly: true},
        banco: {required: true,},
        cci: {required: true,minlength: 20},
        correo: {required: true,},
        celular: {required: true,minlength: 9}
    };
}
$('.save').on('click',function(){
    save();
});
$('.tipoPersona').on('change',function(){
    changeTipoPersona($(this).val());
});
function save()
{
    if($('#fvproveedor').valid()==false)
    {return;}
    var formData = new FormData($("#fvproveedor")[0]);
    // alert('paso la val')
    $('.save').prop('disabled',true);
    $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
    $('.overlayPagina').css("display","none");
    jQuery.ajax(
    { 
        url: "{{ url('panelAdm/paProveedor/guardar') }}",
        data: formData,
        method: 'post',
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            console.log(r);
            // $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
            $('#modalActualizarDatos').modal('hide');
            // limpiarForm();
            $('.save').prop('disabled',false);
            // msjRee(r);
            // $('.overlayPagina').css("display","flex");
            msgRee(r);
            fillProveedor();
            
        }
    });
}
function changeTipoPersona()
{
    if($('.tipoPersona').val()=='PERSONA NATURAL')
    {
        $('.nombre').rules('add', {required: true});
        $('.apellidoPaterno').rules('add', {required: true});
        $('.apellidoMaterno').rules('add', {required: true});
        $('.razonSocial').rules('remove', 'required');
        $('.pj').val('');
        cleanFv('fvproveedor');
        $('.pj').parent().parent().css('display','none');
        $('.pn').parent().parent().css('display','block');
        $('.dataRepresentante').css('display','none');
    }
    else
    {
        $('.razonSocial').rules('add', {required: true});
        $('.nombre').rules('remove', 'required');
        $('.apellidoPaterno').rules('remove', 'required');
        $('.apellidoMaterno').rules('remove', 'required');
        $('.pn').val('');
        cleanFv('fvproveedor');
        $('.pn').parent().parent().css('display','none');
        $('.pj').parent().parent().css('display','block');
        $('.dataRepresentante').css('display','block');
    }

}
</script>