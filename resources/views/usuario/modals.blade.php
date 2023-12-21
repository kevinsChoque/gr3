<!-- modal modalRegistrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user"></i> Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fvusuario">
                <div class="row contenedorFormularioRegistrar">
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">DNI: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control soloNumeros input" id="dni" name="dni" maxlength="8">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="nombre" name="nombre">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Apellido paterno: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="apellidoPaterno" name="apellidoPaterno">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Apellido materno: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="apellidoMaterno" name="apellidoMaterno">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Usuario: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="usuario" name="usuario">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Contraseña: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="password" class="form-control input" id="password" name="password">
                        </div>
                    </div>
                    <!-- <div class="form-group col-lg-6">
                        <label for="" class="m-0">Estado: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control" id="estado" name="estado">
                        </div>
                    </div> -->
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Tipo de usuario: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <select name="tipo" id="tipo" class="form-control">
                                <option disabled>Seleccione tipo de usuario</option>
                                <option value="administrador">Administrador</option>
                                <option value="cotizador" selected>Cotizador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Celular: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control soloNumeros input" id="celular" name="celular" maxlength="9">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" class="m-0">Correo:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="correo" name="correo">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success guardar"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- modal modalEditar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user"></i> Editar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="efvusuario">
                    <div class="row contenedorFormularioEditar">
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">DNI: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control soloNumeros input" id="dni" name="dni" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Nombre: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="nombre" name="nombre">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Apellido paterno: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="apellidoPaterno" name="apellidoPaterno">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Apellido materno: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="apellidoMaterno" name="apellidoMaterno">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Usuario: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="usuario" name="usuario">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Nueva contraseña:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="password" class="form-control input" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Celular: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control soloNumeros input" id="celular" name="celular" maxlength="9">
                                <!-- <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;999-999-9999&quot;" data-mask="" inputmode="text"> -->
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Correo:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control input" id="correo" name="correo">
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Tipo de usuario: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option disabled>Seleccione tipo de usuario</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="cotizador" selected>Cotizador</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Estado: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <select name="estado" id="estado" class="form-control">
                                    <option disabled>Seleccione una opcion</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                <button type="button" class="btn btn-success guardarCambios"><i class="fa fa-save"></i> Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
<script>  
var idUsu = '';
$(document).ready( function () {
    $.validator.addMethod("lettersOnly", function(value, element) {
      return this.optional(element) || /^[A-Za-z]+$/.test(value);
    }, "Este campo debe contener solo letras.");
    initValidate();
});
$('.guardar').on('click',function(){
    guardar();
});
$('.guardarCambios').on('click',function(){
    guardarCambios();
});
// function data(tipo)
// {
//     // segun la accion enviara datos de editar o registrar
//     let segunAccion=tipo?'':'e';
//     return {
//         nombre:$('#'+segunAccion+'nombre').val(),
//         observacion:$('#'+segunAccion+'observacion').val(),
//     }
// }
function guardar()
{
    if($('#fvusuario').valid()==false)
    {return;}
    var formData = new FormData($("#fvusuario")[0]);
    // formData.append('tipo', 'cotizador'); 
    $('.guardar').prop('disabled',true); 
    // $('.overlayRegistros').css("display","flex");
    jQuery.ajax(
    { 
        url: "{{ url('usuario/guardar') }}",
        method: 'post',
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            if (r.estado)
            {
                limpiarForm();
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                construirTabla();
                fillRegistros();
            }
            cleanFv('fvusuario');
            console.log(r);
            
            $('.guardar').prop('disabled',false);
            $('#modalRegistrar').modal('hide');
            msjRee(r);
        }
    });
}
function limpiarForm()
{
    cleanFv('fvusuario');
    $('#fvusuario .input').val('');
}

function rules()
{
    return {
        dni: {
            required: true,
            digits: true,
            minlength: 8
        },
        nombre: {
            required: true,
            lettersOnly: true
        },
        apellidoPaterno: {
            required: true,
            lettersOnly: true
        },
        apellidoMaterno: {
            required: true,
            lettersOnly: true
        },
        usuario: {
            required: true,
        },
        password: {
            required: true,
        },
        tipo: {
            required: true,
        },
        celular: {
            required: true,
            minlength: 9
        }
    };
}
function initValidate()
{
    $('#fvusuario').validate({
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
function editar(id)
{
    jQuery.ajax(
    { 
        url: "{{ url('usuario/editar') }}",
        data: {id:id},
        method: 'post',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            console.log(r)
            $('#efvusuario #dni').val(r.data.dni);
            $('#efvusuario #nombre').val(r.data.nombre);
            $('#efvusuario #apellidoPaterno').val(r.data.apellidoPaterno);
            $('#efvusuario #apellidoMaterno').val(r.data.apellidoMaterno);
            $('#efvusuario #usuario').val(r.data.usuario);
            $('#efvusuario #celular').val(r.data.celular);
            $('#efvusuario #correo').val(r.data.correo);
            $('#efvusuario #tipo').val(r.data.tipo);
            $('#efvusuario #estado').val(r.data.estado);
            idUsu = r.data.idUsu;
            $('#modalEditar').modal('show');
        }
    });
}
function guardarCambios()
{
    if($('#efvusuario').valid()==false)
    {return;}
    var formData = new FormData($("#efvusuario")[0]);
    formData.append('idUsu', idUsu); 
    $('.guardarCambios').prop('disabled',true);
    // -
    jQuery.ajax(
    { 
        url: "{{ url('usuario/guardarCambios') }}",
        data: formData,
        method: 'post',
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            if (r.estado)
            {
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                construirTabla();
                fillRegistros();
                $('#modalEditar').modal('hide');
            }
            $('.guardarCambios').prop('disabled',false);
            msjRee(r);
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