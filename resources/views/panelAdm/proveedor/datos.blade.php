@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0"></h1></div>
            <div class="col-sm-6">
                <!-- <a href="{{url('panelAdm/paProveedor/changePassword')}}" class="btn btn-success float-right"><i class="fa fa-lock"></i> Cambiar contraseña</a> -->
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalChangePassword">
                    <i class="fa fa-lock"></i> Cambiar contraseña
                </button>
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
<div class="col-lg-12 mt-3">
    <div class="card">
        <div class="card-body p-0">
            <h3 class="text-center font-weight-bold font-italic m-0">MIS DATOS</h3>
        </div>
    </div>
</div>
@if(is_null(Session::get('proveedor')->tipoPersona)
    || is_null(Session::get('proveedor')->numeroDocumento)
    || is_null(Session::get('proveedor')->direccion)
    || is_null(Session::get('proveedor')->correo)
    || is_null(Session::get('proveedor')->celular)
    || is_null(Session::get('proveedor')->usuario)
    || is_null(Session::get('proveedor')->banco)
    || is_null(Session::get('proveedor')->cci)
)
<div class="col-lg-12">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
        Tienes que completar todos tus datos para poder realizar tus cotizaciones.!
    </div>
</div>
@endif
<!-- <section class="content"> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <!-- <img class="profile-user-img img-fluid img-circle" src="https://adminlte.io/themes/v3/dist/img/user4-128x128.jpg" alt="User profile picture"> -->
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/panelAdm/iconoProveedor.jpg')}}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center nombreProveedor">--</h3>
                    <p class="text-muted text-center rucProveedor">RUC: --</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Usuario.</b> <a class="float-right usuarioProveedor">--</a>
                        </li>
                        <li class="list-group-item">
                            <b>Password.</b> <a class="float-right">***************</a>
                        </li>
                        <li class="list-group-item">
                            <p class="text-muted text-center">Cabe señalar que su usuario sera su RUC</p>
                        </li>
                    </ul>
                    <!-- <a href="#" class="btn btn-primary btn-block"><b>Cambiar Contraseña</b></a> -->
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalChangePassword">
                        <i class="fa fa-lock"></i> Cambiar Contraseña
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
                <!-- <div class="overlay overlayRegistros">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                </div> -->
            <div class="invoice p-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-lg fa-building"></i> Mis datos Personales.
                            <small class="float-right fechaRegistro">--</small>
                        </h4>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-3 invoice-col">
                        Datos Personales
                        <address>
                            <strong>Dni.</strong>
                            <br>
                            <span class="dniPersona">--</span>
                            <br>
                            <b>Nombres</b> 
                            <br>
                            <span class="nombrePersona">--</span>
                            <br>
                        </address>
                    </div>
                    <div class="col-sm-3 invoice-col">
                        <br>
                        <address>
                            <strong>Dirección.</strong>
                            <br>
                            <span class="direccionPersona">--</span>
                            <br>
                            <b>Apellido Paterno</b><br>
                            <span class="apPersona">--</span>
                            <br>
                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                    <br>
                        <address>
                            <strong>Correo Electronico.</strong>
                            <br>
                            <span class="correoPersona">--</span>
                            <br>
                            <b>Apellido Materno</b>
                            <br>
                            <span class="amPersona">--</span>
                            <br>
                        </address>
                    </div>
                    <div class="col-sm-2 invoice-col">
                    <br>
                        <address>
                            <strong>SUNAT.</strong>
                            <br>
                            <span class="estadoSunat">--</span> 
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="lead">Metodo de Pago:</p>
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                            En esta sección se mostrara la cuenta bancaria relacionada a su persona y/o empresa, 
                            para lo cual se sugiere siempre tenerlo actualizado en caso de cambios.
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="lead">Datos Bancarios</p>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:50%">Banco</th>
                                        <td><span class="bancoPersona">--</span></td>
                                    </tr>
                                    <tr>
                                        <th>CCI</th>
                                        <td><span class="cciPersona">--</span></td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Mensaje text -->
                <div class="col-12">
                    <hr>
                </div>
                <div class="row no-print">
                    <div class="col-12">
                        <!-- <button href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default">
                            <i class="fas fa-print"></i> Imprimir
                        </button> -->
                        <button class="btn btn-success float-right actualizarDatos">
                            <i class="fa fa-edit"></i> Actualizar Datos
                        </button>
                        <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Generate PDF
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </section> -->
<!-- ---------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------- -->
<!-- ---------------------------------------------------------------- -->

@include('panelAdm.proveedor.mChangePassword')
@include('panelAdm.proveedor.mActualizarDatos')
<script>

    localStorage.setItem("sba",3);
    var flip=0;
    $(document).ready( function () {
        $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[A-Za-z]+$/.test(value);
        }, "Este campo debe contener solo letras.");
        $('.containerDelete').remove(); //esto se eliminara despues que limpie todo
        fillProveedor();
        // initFv('fvproveedor',rules());



        
        // $('.overlayRegistros').css("display","none");
    });
    $('.tipoPersona').on('change',function(){
        changeTipoPersona($(this).val());
    });
    
    $('.actualizarDatos').on('click',function(){
        actualizarDatos();
    });
    function actualizarDatos()
    {
        fillProveedor();
        $('#modalActualizarDatos').modal('show');
    }
    function fillProveedor()
    {
        // {{Session::get('proveedor')->idPro}}
        jQuery.ajax(
        { 
            url: "{{ url('proveedor/editar') }}",
            data: {id:{{Session::get('proveedor')->idPro}}},
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                console.log(r);
                cleanFv('fvproveedor');
                idPro = r.data.idPro;
                $('#fvproveedor #tipoPersona').val(r.data.tipoPersona===null?'0':r.data.tipoPersona);
                $('#fvproveedor #numeroDocumento').val(r.data.numeroDocumento);
                $('#fvproveedor #direccion').val(r.data.direccion);
                $('#fvproveedor #activo').val(r.data.activo===null?'2':r.data.activo);
                console.log('-----habido------------------------');
                console.log(r.data.habido);
                console.log('-----habido------------------------');
                $('#fvproveedor #habido').val(r.data.habido===null?'2':r.data.habido);
                $('#fvproveedor #correo').val(r.data.correo);
                $('#fvproveedor #celular').val(r.data.celular);
                $('#fvproveedor #usuario').val(r.data.usuario);
                $('#fvproveedor #banco').val(r.data.banco);
                $('#fvproveedor #cci').val(r.data.cci);
                // --------------------

                
                $('.rucProveedor').html('RUC: '+r.data.numeroDocumento);
                $('.usuarioProveedor').html(r.data.numeroDocumento);
                
                $('.correoPersona').html(dataIncompleta(novDato(r.data.correo)));
                $('.estadoSunat').html(novDato(r.data.activo)=='--'?
                    '<span class="badge badge-warning">Incompleto</span>':
                    r.data.activo=='1'?'<span class="badge badge-success">Activo</span>':
                    '<span class="badge badge-danger">Inactivo</span>'
                );
                $('.bancoPersona').html(dataIncompleta(novDato(r.data.banco)));
                $('.cciPersona').html(dataIncompleta(novDato(r.data.cci)));

                fecha = new Date(r.data.fr);
                fechaFormat = `${fecha.getDate()} de ${obtenerNombreMes(fecha.getMonth() + 1)} de ${fecha.getFullYear()}`;
                console.log(fechaFormat);
                // <i class="fa fa-calendar-alt"></i> 
                $('.fechaRegistro').html('Fecha Registro: '+fechaFormat);
                // amPersona
                // estadoSunat
                // --------------------

                if(r.data.tipoPersona=='PERSONA JURIDICA')
                {
                    // --------------
                    
                    $('.nombreProveedor').html(r.data.razonSocial);
                    $('.dniPersona').html(dataIncompleta(novDato(r.data.dniRep)));
                    $('.nombrePersona').html(dataIncompleta(novDato(r.data.nombreRep)));
                    $('.direccionPersona').html(dataIncompleta(novDato(r.data.direccionRep)));
                    $('.apPersona').html(dataIncompleta(novDato(r.data.apellidoPaternoRep)));
                    $('.amPersona').html(dataIncompleta(novDato(r.data.apellidoMaternoRep)));
                    
                    // --------------
                    $('#fvproveedor .razonSocial').rules('add', {required: true});
                    $('#fvproveedor .nombre').rules('remove', 'required');
                    $('#fvproveedor .apellidoPaterno').rules('remove', 'required');
                    $('#fvproveedor .apellidoMaterno').rules('remove', 'required');
                    $('#fvproveedor .pn').val('');
                    // --
                    $('#fvproveedor .razonSocial').val(r.data.razonSocial);
                    $('#fvproveedor #dniRep').val(r.data.dniRep);
                    $('#fvproveedor #nombreRep').val(r.data.nombreRep);
                    $('#fvproveedor #apellidoPaternoRep').val(r.data.apellidoPaternoRep);
                    $('#fvproveedor #apellidoMaternoRep').val(r.data.apellidoMaternoRep);
                    $('#fvproveedor #direccionRep').val(r.data.direccionRep);
                    $('#fvproveedor .pj').parent().parent().css('display','block');
                    $('#fvproveedor .pn').parent().parent().css('display','none');
                    $('.dataRepresentante').css('display','block');
                }
                else
                {
                    // --------------
                    
                    $('.nombreProveedor').html(
                        r.data.nombre+' '+
                        r.data.apellidoPaterno+' '+
                        r.data.apellidoMaterno
                    );
                    $('.dniPersona').html(r.data.numeroDocumento.slice(2, 10));
                    $('.nombrePersona').html(r.data.nombre);
                    $('.direccionPersona').html(dataIncompleta(novDato(r.data.direccion)));
                    $('.apPersona').html(dataIncompleta(novDato(r.data.apellidoPaterno)));
                    $('.amPersona').html(dataIncompleta(novDato(r.data.apellidoMaterno)));
                    // -------------
                    $('#fvproveedor .nombre').rules('add', {required: true});
                    $('#fvproveedor .apellidoPaterno').rules('add', {required: true});
                    $('#fvproveedor .apellidoMaterno').rules('add', {required: true});
                    $('#fvproveedor .razonSocial').rules('remove', 'required');
                    $('#fvproveedor .pj').val('');
                    // --
                    $('#fvproveedor .nombre').val(r.data.nombre);
                    $('#fvproveedor .apellidoPaterno').val(r.data.apellidoPaterno);
                    $('#fvproveedor .apellidoMaterno').val(r.data.apellidoMaterno);
                    $('#fvproveedor .pj').parent().parent().css('display','none');
                    $('#fvproveedor .pn').parent().parent().css('display','block');
                    $('.dataRepresentante').css('display','none');
                }
                $('.overlayPagina').css("display","none");
                // $('.overlayRegistros').css("display","none");
            }
        });
    }
    function dataIncompleta(data)
    {
        return data == '--'?'<span class="badge badge-warning">Incompleto</span>':data;
    }
    
    
    
</script>
@endsection