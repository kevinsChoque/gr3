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
        <!-- align-items: center;
    background-color: #e9ecef;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    height: 100vh;
    -ms-flex-pack: center;
    justify-content: center; -->
	<div class="container-fluid" style="display: flex;flex-direction: column;height: 100vh;justify-content: center;width: 63%;">
	  	<div class="card">
		    <div class="card-header text-center" style="display: none;">
		      	<a href="#" class="h1"><b>Cotizaciones </b>Apurimac</a>
		    </div>
	    	<div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- <img src="https://appcotizaciones.regioncusco.gob.pe/images/inicio.png" class="w-100"> -->
                        <img src="https://png.pngtree.com/png-vector/20210417/ourlarge/pngtree-office-desk-computer-application-development-scenario-illustration-png-image_3228766.jpg" class="w-100">
                    </div>
                    <div class="col-lg-6">
                        <div class="row justify-content-center">
                            <form id="fvlogin">
                            <h6 class="login-box-msg text-left">Instructivo para el proceso del Registro de Cotizaciones Descargar.</h6>
                            <h3 class="text-center font-weight-bold">COTIZACIONES EN LINEA</h3>
                            <p class="text-left">Bienvenido, ingrese con su cuenta.</p>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control input" id="usuario" name="usuario" maxlength="11">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold"><i class="fa fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control input" id="password" name="password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary" style="visibility: hidden;">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-primary sig-in w-100"><i class="fa fa-key"></i> Ingresar</button>
                                </div>
                            </div>
                            <!-- <p class="text-left">Si no se recuerda la clave, presione aquí</p> -->
                            <br>
                            <div class="alert alert-info py-2">
                                <p class="m-0 text-center font-weight-bold">SI NO TIENE UNA CUENTA PRESIONE <a href="{{url('portal/proveedor/registrar')}}">AQUI</a>.</p>
                            </div>
                            </form>
                        </div>
                        <!-- <p class="mb-0"><a href="#" class="text-center">Registrarse</a></p> -->
                    </div>
                </div>
	    		
	    	</div>
	  	</div>
	</div>
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
		initValidate();
        initFv('fvlogin',rules());
        $('.overlayPagina').css("display","none");
    } );
    // function ingresar()
    // {
    // 	window.location.href = "{{url('home/home')}}";
    // }
    
    // $('.entrar').on('click',function(){
    // 	alert('enviar data desde entrar')
    // });
    $('.sig-in').on('click',function(){
        if($('#fvlogin').valid()==false)
        {return;}
        // alert('paso la validacion')
        var formData = new FormData($("#fvlogin")[0]);
        $('.sig-in').prop('disabled',true); 
        $('.overlayPagina').css("display","flex");
        jQuery.ajax({
            url: "{{ url('login/siginpro') }}",
            method: 'POST', 
            data: formData,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
                if (r.estado) 
                {
                    // window.location.href = "{{url('panelAdm/home/home')}}";
                    window.location.href = "{{url('panelAdm/paCotizacion/cotizacionesActivas')}}";
                }
                else 
                {
                	$('.overlayPagina').css("display","none");
                	$('.sig-in').prop('disabled',false);
                    msjRee(r); 
                }
            },
            error: function (xhr, status, error) {
                $('.overlayPagina').css("display","none");
                $('.sig-in').prop('disabled',false);
                msjSimple(false,'Ocurrio un problema, porfavor contactese con el administrador');
            }
        });
    });
    function rules()
    {
        return {
            usuario: {
                required: true,
            },
            password: {
                required: true,
            },
            
        };
    }
    function initValidate()
    {
        $('#fvlogin').validate({
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
</script>
</body>
</html>
