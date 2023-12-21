@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Proveedores</h1></div>
            <div class="col-sm-6">
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#modalRegistrar">
                    <i class="fa fa-plus"></i> 
                    Nuevo Proveedor
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
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-building"></i> Lista de Proveedores</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 contenedorRegistros table-responsive" style="display: none;">
                            <table id="registros" class="table table-hover table-striped table-bordered dt-responsive nowrap">
                                <thead class="thead-dark">
                                    <tr>
                                        @if(session()->get('usuario')->tipo=="administrador")
                                        <th class="text-center" data-priority="1" width="10%">Personal</th>
                                        @endif
                                        <th class="text-center" data-priority="1">Tipo</th>
                                        <th class="text-center" data-priority="3">Proveedor</th>
                                        <th class="text-center" data-priority="4">Contacto proveedor</th>
                                        <th class="text-center" data-priority="4">Estado proveedor</th>
                                        <th class="text-center" data-priority="4">Representante</th>
                                        <th class="text-center" data-priority="4">Estado</th>
                                        <th class="text-center" data-priority="4">F.Registro</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        @if(session()->get('usuario')->tipo=="administrador")
                                        <th class="text-center" data-priority="1" width="10%">Personal</th>
                                        @endif
                                        <th class="text-center" data-priority="1">Tipo</th>
                                        <th class="text-center" data-priority="3">Proveedor</th>
                                        <th class="text-center" data-priority="4">Contacto proveedor</th>
                                        <th class="text-center" data-priority="4">Estado proveedor</th>
                                        <th class="text-center" data-priority="4">Representante</th>
                                        <th class="text-center" data-priority="4">Estado</th>
                                        <th class="text-center" data-priority="4">F.Registro</th>
                                        <th class="text-center" data-priority="1">Opc.</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('proveedor.modals')
@include('proveedor.suspension.mSuspension')
<script>
localStorage.setItem("sbd",0);
localStorage.setItem("sba",6);
    var tablaDeRegistros;
    var flip=0;

    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        fillRegistros();
        $('.overlayPagina').css("display","none");
    } );
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('proveedor/listar') }}",
            method: 'get',
            success: function(r)
            {
                // console.log(r.data);
                var html = '';
                let opciones = '';
                let sunatPro = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    opciones = r.data[i].idSus!==null?'':
                        '<button type="button" class="btn text-info" title="Suspender" onclick="addSuspension('+r.data[i].idPro+');"><i class="fa fa-user-slash"></i></button>';
                    sunatPro = 'Activo: '+(r.data[i].activo=='1'?'ACTIVO':'INACTIVO')+'<br>Habido:'+(r.data[i].habido=='1'?'HABIDO':'NO HABIDO');
                    html += '<tr>' +
                        @if(session()->get('usuario')->tipo=="administrador")
                        '<td class="align-middle text-left text-uppercase font-weight-bold">' + novDato(r.data[i].nameUser) + '</td>' +
                        @endif
                        '<td class="align-middle text-center font-weight-bold">' + novDato(r.data[i].tipoPersona) + '</td>' +
                        '<td class="align-middle">' + namePro(r.data[i]) + '</td>' +
                        '<td class="align-middle">' + direccionPro(r.data[i]) + '</td>' +
                        '<td class="align-middle">' + novDato(sunatPro) + '</td>' +
                        '<td class="align-middle">' + novDato(r.data[i].nombreRep) +'</td>' +
                        '<td class="align-middle text-center">' + opcSuspension(r.data[i]) + '<br>' + stateRecord(r.data[i].estado) +'</td>' +
                        '<td class="align-middle text-center">' + novDato(r.data[i].fr) +'</td>' +
                        '<td class="align-middle text-center">' + 
                            '<div class="btn-group btn-group-sm" role="group">'+
                                opciones+
                                '<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+r.data[i].idPro+');"><i class="fa fa-edit" ></i></button>'+
                                '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+r.data[i].idPro+');"><i class="fa fa-trash"></i></button>'+
                            '</div>'+
                        '</td></tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
        
    }
    function opcSuspension(pro)
    {
        return pro.idSus===null?'<span class="badge badge-success shadow">Sin suspension</span>':'<span class="badge badge-danger shadow">Con suspension</span>';
    }
    function namePro(pro)
    {
        nameProveedor = 'Razon Social: '+pro.razonSocial+'<br>RUC: '+pro.numeroDocumento;
        if(pro.tipoPersona=='PERSONA NATURAL')
        {
            nameProveedor = 'Nombre: '+novDato(pro.nombre) + ' ' + novDato(pro.apellidoPaterno) + ' ' + novDato(pro.apellidoMaterno)+'<br>RUC: '+pro.numeroDocumento;
        }
        return nameProveedor;
    }
    function direccionPro(reg)
    {
        return 'Direccion: '+reg.direccion+'<br>'+
            'Correo: '+reg.correo+'<br>'+
            'Celular: '+reg.celular;
    }
    function eliminar(id)
    {
        Swal.fire({
            title: 'Esta seguro de eliminar el registro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Si, eliminar!'
        }).then((result) => {
            if(result.isConfirmed)
            {
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                jQuery.ajax(
                { 
                    url: "{{url('proveedor/eliminar')}}",
                    data: {id:id},
                    method: 'post',
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    success: function(r){
                        construirTabla();
                        fillRegistros();
                        msjRee(r);
                    }
                });
            }
        });
    }
    function construirTabla()
    {
        $('.contenedorRegistros>div').remove();
        $('.contenedorRegistros').html(tablaDeRegistros);
    }
    function limpiarForm()
    {
        $('#fvproveedor .tipoPersona').val('PERSONA JURIDICA');
        $('#fvproveedor .activo').val('1');
        $('#fvproveedor .habido').val('1');
        $('#fvproveedor .input').val('');
        $('.pn').parent().parent().css('display','none');
        $('.pj').parent().parent().css('display','block');
        cleanFv('fvproveedor');
    }
</script>

@endsection