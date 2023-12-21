@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones</h1></div>
            <div class="col-sm-6">
                <a href="{{url('cotizacion/registrar')}}" class="btn btn-success float-right"><i class="fa fa-plus"></i> Nueva</a>
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
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-list"></i> Lista de Cotizaciones</h3>
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
                                        <th class="text-center" data-priority="1">Numero</th>
                                        <th class="text-center" data-priority="2">Concepto</th>
                                        <th class="text-center" data-priority="3">Tipo</th>
                                        <th class="text-center" data-priority="4">F.Finalizacion</th>
                                        <th class="text-center" data-priority="4">Estado</th>
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
                                        <th class="text-center" data-priority="1">Numero</th>
                                        <th class="text-center" data-priority="2">Concepto</th>
                                        <th class="text-center" data-priority="3">Tipo</th>
                                        <th class="text-center" data-priority="4">F.Finalizacion</th>
                                        <th class="text-center" data-priority="4">Estado</th>
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
@include('cotizacion.mCotizacion')
@include('cotizacion.recotizar.mRecotizar')
@include('cotizacion.mEditar')
@include('cotizacion.mAddItems')
<script>
localStorage.setItem("sbd",1);
localStorage.setItem("sba",5);

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
            url: "{{ url('cotizacion/listar') }}",
            method: 'get',
            success: function(r)
            {
                console.log(r.data);
                var html = '';
                let opciones = '';
                let opcRec = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    console.log(r.data[i].idCot);
                    if(r.data[i].estadoCotizacion=='1')
                    {
                        opciones = '<button type="button" class="btn text-info" title="Agregar items" onclick="addItems('+r.data[i].idCot+');"><i class="fa fa-plus"></i></button>'+
                            // '<button type="button" class="btn text-success"><i class="fa fa-plus" onclick="addItems_b('+r.data[i].idCot+');"></i></button>'+
                            '<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+r.data[i].idCot+');"><i class="fa fa-edit"></i></button>'+
                            // '<button type="button" class="btn text-success" title="Editar registro" onclick="editar_b('+r.data[i].idCot+');"><i class="fa fa-edit" ></i></button>'+
                            '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+r.data[i].idCot+');"><i class="fa fa-trash"></i></button>';
                    }
                    if(r.data[i].estadoCotizacion == '3')
                    {
                        opcRec = '<button type="button" class="btn text-info" onclick="showRecotizar(\''+r.data[i].idCot+'\')" title="Recotizar"><i class="fa fa-calendar-alt"></i></button>';
                    }
                    html += '<tr>' +
                        @if(session()->get('usuario')->tipo=="administrador")
                        '<td class="text-left text-uppercase font-weight-bold">' + novDato(r.data[i].nameUser) + '</td>' +
                        @endif
                        '<td class="text-center font-weight-bold">' + r.data[i].numeroCotizacion + '</td>' +
                        '<td class="text-left"><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                        '<td class="text-center">' + badgeTipoCot(r.data[i].tipo) +'</td>' +
                        '<td class="text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
                        // '<td class="text-center">' + estadoCotizacion(r.data[i].estadoCotizacion) + '<button class="btn text-info" onclick="changeEstadoCot('+r.data[i].idCot+','+r.data[i].numeroCotizacion+')"><i class="fa fa-edit"></i></button></td>' +
                        '<td class="text-center">' + estadoCotizacion(r.data[i].estadoCotizacion) + '</td>' +
                        '<td class="text-center">' + 
                            '<div class="btn-group btn-group-sm" role="group">'+
                                '<button type="button" class="btn text-info" title="Ver cotizacion" onclick="showCotizacion('+r.data[i].idCot+')"><i class="fa fa-eye"></i></button>'+
                                '<button type="button" class="btn text-info" title="Ver archivo" onclick="showFile(\''+r.data[i].archivo+'\')"><i class="fa fa-file-pdf"></i></button>'+
                                opcRec +
                                opciones +
                                // '<button type="button" class="btn text-info"><i class="fa fa-plus" onclick="addItems('+r.data[i].idCot+');"></i></button>'+
                                // '<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+r.data[i].idCot+');"><i class="fa fa-edit" ></i></button>'+
                                // '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+r.data[i].idCot+');"><i class="fa fa-trash"></i></button>'+
                            '</div>'+
                        '</td></tr>';
                    opciones='';
                    opcRec='';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
        
    }
    function segunEstadoCotizacion(cot)
    {
        let opcion = cot.estadoCotizacion == '5' || cot.estadoCotizacion == '2' ? '':'<button class="btn text-info" onclick="changeEstadoCot('+cot.idCot+','+cot.numeroCotizacion+')"><i class="fa fa-edit"></i></button>';
        return estadoCotizacion(cot.estadoCotizacion) + opcion;
    }
    function showFile(archivo)
    {
        // window.location.href = "{{ route('ver-archivo') }}"+'/'+archivo;
        window.open("{{ route('ver-archivo') }}/" + archivo, "_blank");
    }
    function showCotizacion(id)
    {
        $('#mCotizacion').modal('show');
        jQuery.ajax(
        { 
            url: "{{url('cotizacion/showCotizacion')}}",
            data: {id:id},
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                showDataCotizacion(r);
            }
        });
    }
    function showRecotizar(id)
    {
        
        jQuery.ajax(
        { 
            url: "{{url('cotizacion/showCotizacion')}}",
            data: {id:id},
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                showDataRecotizar(r);
            }
        });
    }
    function editar(id)
    {
        loadCotizacion(id);
        // $('#mEditar').modal('show');




        // localStorage.setItem("idCot",id);
        // window.location.href = "{{url('cotizacion/editar')}}";
    }
    function editar_b(id)
    {
        localStorage.setItem("idCot",id);
        window.location.href = "{{url('cotizacion/editar')}}";

    }
    function addItems(id)
    {
        idCot = id;
        $('#mAddItems').modal('show');
        loadCotizacionMai(id);
        loadItemsCotizacion(id);
    }
    function addItems_b(id)
    {
        localStorage.setItem("idCot",id);
        window.location.href = "{{url('cotizacion/addItems')}}";
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
                    url: "{{url('cotizacion/eliminar')}}",
                    data: {id:id},
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(result){
                        construirTabla();
                        fillRegistros();
                        msjRee(result);
                    }
                });
            }
        });
    }
    function changeEstadoCot(id,num)
    {
        let numeroCotizacion = '<strong>'+num+'</strong>';
        Swal.fire({
            title: 'Esta seguro de publicar la COTIZACION?',
            icon: 'info',
            html: 
                `Una vez realize la publicacion de la cotizacion con <b>Numero `+numeroCotizacion+`</b>, ya no sera posible eliminar ni modificar ya sea la cotizacion o items`,
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Si, Publicar Cotizacion'
        }).then((result) => {
            if(result.isConfirmed)
            {
                $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                jQuery.ajax(
                { 
                    url: "{{url('cotizacion/changeEstadoCotizacion')}}",
                    data: {id:id},
                    method: 'post',
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    success: function(r){
                        if(r.estado)
                        {
                            construirTabla();
                            fillRegistros();
                        }
                        else
                        {
                            $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                            
                        }
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
</script>

@endsection