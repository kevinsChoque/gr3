@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0"></h1></div>
            <div class="col-sm-6">
                <a href="{{url('panelAdm/paProveedor/datos')}}" class="btn btn-success float-right"><i class="fa fa-cogs"></i> Mis datos</a>
                <ol class="breadcrumb float-sm-right" style="display: none;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v3</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('contentPanelAdmin')
<div class="container-fluid">
    <div class="card">
        <div class="overlay overlayRegistros">
            <!-- <div class="spinner"></div> -->
            <i class="fas fa-3x fa-sync-alt fa-spin"></i>
        </div>
    	<div class="card-body">
    		<h3 class="text-center font-weight-bold font-italic">Cambiar Contraseña</h3>
    		<form id="fvproveedor">
    		<div class="row">
                <div class="form-group col-lg-6">
                    <label class="m-0">Contraseña: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="password" name="password">
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label class="m-0">Confirmar contraseña: <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text font-weight-bold"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="text" class="form-control input" id="repassword" name="repassword">
                    </div>
                </div>
    		</div>
            <!-- <div class="col-lg-12">
                <div class="callout callout-info">
                    <h5>Debe de tomar en cuenta!</h5>
                    <p>La .</p>
                </div>
            </div>  --> 
            </form>
    	</div>
        <div class="card-footer py-1 border-transparent">
            <button type="button" class="btn btn-success float-right save"><i class="fa fa-lock"></i> Cambiar contraseña</button>
        </div>
    </div>
</div>
<script>
    localStorage.setItem("sba",3);
    var flip=0;
    $(document).ready( function () {
        $.validator.addMethod("equalToPassword", function (value, element) {
            return value === $("#password").val();
        }, "Las contraseñas no coinciden");
        initFv('fvproveedor',rules());
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
    });
    $('.save').on('click',function(){
        save();
    });
    function rules()
    {
        return {
            password: {required: true,minlength: 8},
            repassword: {required: true,minlength: 8,equalToPassword: true},
            // dniRep: {digits: true,minlength: 8},
            // nombreRep: {lettersOnly: true},
            // apellidoPaternoRep: {lettersOnly: true},
            // apellidoMaternoRep: {lettersOnly: true},
            // cci: {required: true,minlength: 20},
            // celular: {required: true,minlength: 9}
        };
    }
    function save()
    {
        // alert('cascs')
        if($('#fvproveedor').valid()==false)
        {return;}
        var formData = new FormData($("#fvproveedor")[0]);
        // alert('paso la val')
        $('.save').prop('disabled',true);
        $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paProveedor/savePassword') }}",
            data: formData,
            method: 'post',
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                console.log(r);
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                $('.save').prop('disabled',false);
                msjRee(r);
            }
        });
    }
</script>
@endsection