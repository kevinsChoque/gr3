<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOBIERNO REGIONAL DE APURIMAC</title>
    <!-- fuente de google Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- estilos del tema -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
    <!-- estilos del spiner de la pagina -->
    <link rel="stylesheet" href="{{asset('css/spinerLogin.css')}}">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script src="{{asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <style>
        .overlayPagina {height: 110vh !important;}
    </style>
</head>
<body class="hold-transition login-page">
    <div class="overlayPagina">
        <div class="loadingio-spinner-spin-i3d1hxbhik m-auto">
            <div class="ldio-onxyanc9oyh">
                <div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div>
            </div>
        </div>
    </div>
    <div class="login-box" style="width: 600px;">
        <div class="card">
            <div class="card-header text-center">
                <h3 class="text-left">REGISTRATE AQUÍ</h3>
                <p class="m-0 text-left">Ingresa tus datos para generar una cuenta</p>
            </div>
            <div class="card-body">
                <form id="fvregpro">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tipo de persona: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <select name="tipoPersona" id="tipoPersona" class="form-control tipoPersona">
                            <option disabled value="0"> Seleccione una opcion</option>
                            <option value="PERSONA NATURAL" selected>PERSONA NATURAL</option>
                            <option value="PERSONA JURIDICA">PERSONA JURIDICA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">RUC: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="ruc" name="ruc" class="form-control soloNumeros" placeholder="RUC" maxlength="11">
                    </div>
                </div>
                <div class="form-group row" style="display: none;">
                    <label class="col-sm-4 col-form-label">Razon social: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="razonSocial" name="razonSocial" class="form-control pj" placeholder="Razon social">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nombre: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="nombre" name="nombre" class="form-control pn" placeholder="Nombre del proveedor">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Apellido Paterno: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control pn" placeholder="Apellido paterno">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Apellido Materno: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control pn" placeholder="Apellido materno">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nro de celular: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="celular" name="celular" class="form-control soloNumeros" placeholder="Celular" maxlength="9">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Correo: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="correo" name="correo" class="form-control" placeholder="Correo">
                    </div>
                </div>
                <div class="col-12">
                    <a class="btn btn-primary w-100 regPro"><i class="fa fa-user-plus"></i> REGISTRAR</a>
                </div>
                <div class="col-12">
                    <a class="btn btn-link w-100" href="{{url('loginProveedor/loginProveedor')}}">SI YA TIENES UNA CUENTA HAZ CLIC AQUÍ</a>
                </div>
                </form>
            </div>
        </div>
    </div>
<!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- jquery validate -->
<script src="{{asset('adminlte3/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/helper.js')}}"></script>
<script>
$(document).ready( function () {
    initFv('fvregpro',rules());
    $('.overlayPagina').css("display","none");
} );
$('.tipoPersona').on('change',function(){
    changeTipoPersona($(this).val());
});
// segun el tipo de persona q se elija, habilita los inputs a llenar
function changeTipoPersona()
{
    if($('.tipoPersona').val()=='PERSONA NATURAL')
    {
        $('.pj').parent().parent().css('display','none');
        $('.pn').parent().parent().css('display','flex');
        $('.pj').val('');
    }
    else
    {
        $('.pn').parent().parent().css('display','none');
        $('.pj').parent().parent().css('display','flex');
        $('.pn').val('');
    }
}
$('.regPro').on('click',function(){regPro()});
// funcion para registrar al proveedor validando el formulario fvregpro
function regPro()
{
    if($('#fvregpro').valid()==false)
    {return;}
    var formData = new FormData($("#fvregpro")[0]);
    
    $('.overlayPagina').css("display","flex");
    jQuery.ajax({
        url: "{{ url('portal/proveedor/guardar') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            // una vez registrado nos redirecciona a la pagina de login
            if (r.estado) 
                redirectUrlMsj("{{url('loginProveedor/loginProveedor')}}",r.message)
            else 
                msgRee(r); 
            $('.overlayPagina').css("display","none");
            $('.regPro').prop('disabled',false); 
        },
        error: function (xhr, status, error) {
            msjSimple(false,"Ocurrio un error porfavor contactese con el Administrador.")
        }
    });
}
function rules()
{
    return {
        tipoPersona: {required: true,},
        ruc: {required: true,},
        nombre: {required: true,},
        apellidoPaterno: {required: true,},
        apellidoMaterno: {required: true,},
        razonSocial: {required: true,},
        correo: {required: true,},
        celular: {required: true,},
    };
}
</script>
</body>
</html>
