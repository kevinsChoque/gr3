@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Configuracion de numero de cotizacion</h1></div>
            <div class="col-sm-6">
                <a href="{{url('cotizacion/ver')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> Cotizaciones</a>
                <ol class="breadcrumb float-sm-right" style="display: none;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v3</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-hashtag"></i> Numero</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <!-- <form id="fvcotizacion"> -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="callout callout-warning">
                                <h5>Numero de <strong>Cotizacion</strong> para <strong class="text-warning">iniciar</strong> la autogeneracion.</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="m-0"><strong>Cotizacion</strong> inicio desde: <strong class="nc">-</strong></p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p>Numero actual: <strong class="nac">-</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group col-lg-6">
                            <label for="" class="m-0">Numero de inicio:</label>
                            <!-- <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="numero" name="numero">
                            </div> -->
                            <div class="input-group mb-3">
                                <input type="text" id="numero" name="numero" class="form-control soloNumeros" maxlength="6">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success saveNumero"><i class="fa fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
localStorage.setItem("sbd",0);
localStorage.setItem("sba",8);
$(document).ready( function () {
    $('.overlayPagina').css("display","none");
    fillNumero();
    // fillNumeroActual();
});
$('.saveNumero').on('click',function(){
    saveNumero();
});
function saveNumero()
{
    if($('#numero').val()=='')
    {   msjError("Ingrese el numero.");return;}
    $('.saveNumero').prop('disabled',true);
    jQuery.ajax(
    { 
        url: "{{url('numero/registrar')}}",
        method: 'post',
        data: {numero:$('#numero').val()},
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            console.log(r);
            if (r.estado) 
            {
                $('.nc').html($('#numero').val());
                $('.nac').html('-');
            }
            msjRee(r); 
            $('.saveNumero').prop('disabled',false);
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
            $('.saveNumero').prop('disabled',false);
        }
    });
}
function fillNumero()
{
    jQuery.ajax(
    { 
        url: "{{url('numero/listar')}}",
        method: 'get',
        success: function(r){
            console.log(r.data.length);
            if(r.data.length==0)
            {
                $('.nc').html(0);
                $('.nac').html(0);
            }
            else
            {
                $('.nc').html(r.data[0].numero);
                if(r.numeroActual!==null)
                    $('.nac').html(r.data[0].numero>r.numeroActual ? '-' : r.numeroActual); 
            }
            $('.overlayRegistros').css("display","none");
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
// function fillNumeroActual()
// {
//     jQuery.ajax(
//     { 
//         url: "{{url('numero/actual')}}",
//         method: 'get',
//         success: function(r){
//             $('.nac').html(r.numero===null ? '-' : r.numero); 
//             $('.overlayRegistros').css("display","none");
//         },
//         error: function (xhr, status, error) {
//             msjError("Algo salio mal, porfavor contactese con el Administrador.");
//         }
//     });
// }
</script>

@endsection