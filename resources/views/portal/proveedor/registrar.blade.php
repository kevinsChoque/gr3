<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GOBIERNO REGIONAL DE APURIMAC</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte3/dist/css/adminlte.min.css')}}">
    <!-- spiner style -->
    <link rel="stylesheet" href="{{asset('css/spinerLogin.css')}}">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="{{asset('adminlte3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <script src="{{asset('adminlte3/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- helper -->
    <script src="{{asset('js/helper.js')}}"></script>
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
                
                <!-- <div class="row"> -->
                    <!-- <div class="form-group col-lg-4">
                        <label class="m-0 text-uppercase">RUC:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" id="ruc" name="ruc" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-lg-8">
                        <label class="m-0 text-uppercase">Razon Social:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" id="razonSocial" name="razonSocial" class="form-control">
                        </div>
                    </div> -->
                <!-- </div> -->
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
                <!-- <div class="form-group col-lg-12">
                    <label class="m-0 text-uppercase">Correo:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" id="correo" name="correo" class="form-control">
                    </div>
                </div> -->
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Correo: <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" id="correo" name="correo" class="form-control" placeholder="Correo">
                    </div>
                </div>
                <!-- <div class="form-group col-lg-12">
                    <label class="m-0 text-uppercase">Confirmar correo:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" id="confirmarCorreo" name="confirmarCorreo" class="form-control">
                    </div>
                </div> -->
                <!-- <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Confirmar correo: <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" id="confirmarCorreo" name="confirmarCorreo" class="form-control" placeholder="Confirmar correo">
                    </div>
                </div> -->
                <!-- <div class="form-group col-lg-12">
                    <label class="m-0 text-uppercase">nro de celular:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                        </div>
                        <input type="text" id="celular" name="celular" class="form-control">
                    </div>
                </div> -->
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
    <!-- <button type="button" class="btn btn-default toastsDefaultAutohide">
        Launch Default Toasts with autohide
    </button> -->
<!-- jQuery -->
<script src="{{asset('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- validate -->
<script src="{{asset('adminlte3/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte3/dist/js/adminlte.min.js')}}"></script>
<script>
    
    $(document).ready( function () {
        initFv('fvregpro',rules());
        $('.overlayPagina').css("display","none");
        // $('.toastsDefaultAutohide').click(function() {
        //   $(document).Toasts('create', {
        //     title: 'Toast Title',
        //     autohide: true,
        //     delay: 750,
        //     body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        //   })
        // });
    } );
    $('.tipoPersona').on('change',function(){
        changeTipoPersona($(this).val());
    });
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
// pn
        // {
        //     $('.nombre').rules('add', {required: true});
        //     $('.apellidoPaterno').rules('add', {required: true});
        //     $('.apellidoMaterno').rules('add', {required: true});
        //     $('.razonSocial').rules('remove', 'required');
        //     $('.pj').val('');
        //     cleanFv('fvproveedor');
        //     $('.dataRepresentante').css('display','none');
        // }
        // else
        // {
        //     $('.razonSocial').rules('add', {required: true});
        //     $('.nombre').rules('remove', 'required');
        //     $('.apellidoPaterno').rules('remove', 'required');
        //     $('.apellidoMaterno').rules('remove', 'required');
        //     $('.pn').val('');
        //     cleanFv('fvproveedor');
        //     $('.dataRepresentante').css('display','block');
        // }

    }
    // function ingresar()
    // {
    //  window.location.href = "{{url('home/home')}}";
    // }
    
    // $('.entrar').on('click',function(){
    //  alert('enviar data desde entrar')
    // });
    // $('.sig-in').on('click',function(){
    //     if($('#fvlogin').valid()==false)
    //     {return;}
    //     var formData = new FormData($("#fvlogin")[0]);
    //     $('.sig-in').prop('disabled',true); 
    //     $('.overlayPagina').css("display","flex");
    //     jQuery.ajax({
    //         url: "{{ url('login/sigin') }}",
    //         method: 'POST', 
    //         data: formData,
    //         dataType: 'json',
    //         processData: false, 
    //         contentType: false, 
    //         headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
    //         success: function (r) {
    //             if (r.estado) 
    //                 window.location.href = "{{url('home/home')}}";
    //             else 
    //             {
    //              $('.overlayPagina').css("display","none");
    //              $('.sig-in').prop('disabled',false);
    //                 msjRee(r); 
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             $('.overlayPagina').css("display","none");
    //             $('.sig-in').prop('disabled',false);
    //             msjSimple(false,'Ocurrio un problema, porfavor contactese con el administrador');
    //         }
    //     });
    // });
    $('.regPro').on('click',function(){
        regPro()
    });
    function regPro()
    {
        if($('#fvregpro').valid()==false)
        {return;}
        var formData = new FormData($("#fvregpro")[0]);
        // formData.append('id', idDocumento); 
        // formData.append('file', $('#archivo')[0].files.length>0?'true':'false');
        $('.regPro').prop('disabled',true); 
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
                if (r.estado) 
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
                            $('.overlayPagina').css("display","none");
                            window.location.href = "{{url('loginProveedor/loginProveedor')}}";
                        }
                    });
                else 
                    msjRee(r); 
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
