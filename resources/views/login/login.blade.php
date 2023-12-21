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
	<div class="login-box">
	  	<div class="card card-outline card-primary">
		    <div class="card-header text-center">
		      	<a href="#" class="h1"><b>Cotizaciones </b>Apurimac</a>
		    </div>
	    	<div class="card-body">
	    		<!-- <input type="text" id="d1"> -->
	    		<form id="fvlogin">
	    		<p class="login-box-msg">Bienvenido, ingrese con su cuenta.</p>
	    		<div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="usuario" name="usuario">
                    </div>
                </div>
	    		<!-- <input type="text" id="d2"> -->
	    		<div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control input" id="password" name="password">
                    </div>
                </div>
	    		<!-- <button class="btn btn-success entrar"><i class="fa fa-user"></i> ingresar</button> -->
	    		<div class="row">
		          	<div class="col-8">
			            <div class="icheck-primary" style="visibility: hidden;">
			              	<input type="checkbox" id="remember">
			              	<label for="remember">
			                	Remember Me
			              	</label>
			            </div>
		          	</div>
		          	<button class="btn btn-primary sig-in"><i class="fa fa-user"></i> ingresar</button>
		        </div>
		        </form>
		        <!-- <p class="mb-0"><a href="#" class="text-center">Registrarse</a></p> -->
	    		<!-- <hr> -->
	      		<!-- <p class="login-box-msg">Bienvenido, ingrese con su cuenta.</p> -->
	      		<!-- <form id="fvlogin">
			        <div class="input-group mb-3">
			          	<input type="text" class="form-control" placeholder="usuario">
			         	<div class="input-group-append">
				            <div class="input-group-text"><span class="fas fa-user"></span></div>
			          	</div>
			        </div>
			        <div class="input-group mb-3">
			          	<input type="password" class="form-control" placeholder="Password">
			          	<div class="input-group-append">
				            <div class="input-group-text"><span class="fas fa-lock"></span></div>
			          	</div>
			        </div>
			        <div class="row">
			          	<div class="col-8">
				            <div class="icheck-primary">
				              	<input type="checkbox" id="remember">
				              	<label for="remember">
				                	Remember Me
				              	</label>
				            </div>
			          	</div>
			          	<div class="col-4"><button class="btn btn-primary btn-block sig-in">Ingresar</button></div>
			        </div>
	      		</form> -->
	      		<!-- <p class="mb-0"><a href="#" class="text-center">Registrarse</a></p> -->
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
        var formData = new FormData($("#fvlogin")[0]);
        $('.sig-in').prop('disabled',true); 
        $('.overlayPagina').css("display","flex");
        jQuery.ajax({
            url: "{{ url('login/sigin') }}",
            method: 'POST', 
            data: formData,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
                if (r.estado) 
                    window.location.href = "{{url('home/home')}}";
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
