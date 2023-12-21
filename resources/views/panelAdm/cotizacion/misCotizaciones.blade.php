@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Mis Cotizaciones</h1></div>
            <div class="col-sm-6">
                <!-- <a href="{{url('cotizacion/ver')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> Cotizaciones</a> -->
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
<div class="container-fluid mt-3">
    <div class="card card-primary card-outline" style="display: none;">
        <div class="card-body p-0">
            <h3 class="text-center font-weight-bold font-italic m-0">MIS COTIZACIONES</h3>
        </div>
    </div>
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5 class="font-weight-bold"><i class="icon fas fa-info"></i> Culminar cotizacion:</h5>
        <!-- <div class="row">
        </div> -->
        <ol class="m-0">
            <li class="font-weight-bold font-italic mb-2">Descarga los formatos asiendo click en el boton <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-download"></i></button></li>
            <li class="font-weight-bold font-italic mb-2">Subir los formatos asiendo click en el boton <button type="button" class="btn btn-sm btn-success ml-1"><i class="fa fa-paper-plane"></i> Enviar</button></li>
            <li class="font-weight-bold font-italic">Una vez enviado los archivos nos mostrara el mensaje de cotizacion enviada. <span class="badge badge-light shadow"> Cotizacion Enviada</span></li>
        </ol>
    </div>
    <div class="card card-primary card-outline">
        <div class="overlay overlayRegistros">
            <div class="spinner"></div>
        </div>
    	<div class="card-body">
            <h3 class="text-center font-weight-bold font-italic m-0">MIS COTIZACIONES</h3>
    		<!-- <h3 class="text-center font-weight-bold font-italic">MIS COTIZACIONES</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Alert!</h5>
                        Info alert preview. This alert is dismissable.
                    </div>
                </div>
            </div> -->
    		<form id="fvbuscot">
    		<div class="row mt-4 justify-content-center">
    			<div class="col-lg-2 col-sm-3">
    				<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Año:</label>
						<div class="col-sm-8">
                            <select name="anio" id="anio" class="form-control">
                                <option disabled>Selecciona una opcion</option>
                                <option value="0">Todos</option>
                                @for ($i = 2000; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-sm-3">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Mes:</label>
						<div class="col-sm-8">
                            <select name="mes" id="mes" class="form-control">
                                <option disabled selected>Selecciona una opcion</option>
                                <option value="0">Todos</option>
                                @foreach (['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'] as $indice => $mes)
                                    <option value="{{ $indice + 1 }}">{{ $mes }}</option>
                                @endforeach
                            </select>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-sm-3">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tipo:</label>
						<div class="col-sm-8">
							<!-- <input type="date" id="fechaInicial" name="fechaInicial" class="form-control"> -->
                            <select name="tipo" id="tipo" class="form-control">
                                <option disabled>Selecciona una opcion</option>
                                <option value="0" selected>Todos</option>
                                <option value="Bienes">Bienes</option>
                                <option value="Servicios">Servicios</option>
                            </select>
						</div>
					</div>
				</div>
                <div class="col-lg-2 col-sm-3">
                    <button type="button" class="btn btn-success float-right searchMisCot w-100">
                        <i class="fa fa-search"></i> Buscar Cotizacion
                    </button>
                </div>
    		</div>
            </form>
    	</div>
        <div class="card-footer py-1 border-transparent" style="display: none;">
            <button type="button" class="btn btn-light clean"><i class="fa fa-eraser"></i> Limpiar campos de busqueda</button>
            <button type="button" class="btn btn-success float-right searchMisCot"><i class="fa fa-search"></i> Buscar Cotizacion</button>
        </div>
    </div>
    <div class="card">
        <div class="overlay overlayRegistros">
            <div class="spinner"></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 contenedorRegistros table-responsive" style="display: none;">
                    <table id="registros" class="table table-hover table-bordered dt-responsive nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center text-uppercase" data-priority="1">NRO</th>
                                <th class="text-center text-uppercase" data-priority="1">tipo</th>
                                <th class="text-center text-uppercase" data-priority="1">FECHA</th>
                                <th class="text-center text-uppercase" data-priority="2">nro de cotizacion</th>
                                <th class="text-center text-uppercase" data-priority="3">concepto</th>
                                <th class="text-center text-uppercase" data-priority="4">monto</th>
                                <th class="text-center text-uppercase" data-priority="4">Estado</th>
                                <th class="text-center text-uppercase" data-priority="1">Opc.</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('panelAdm.cotizacion.finalizarCotizacion.mArchivos')
@include('panelAdm.cotizacion.finalizarCotizacion.mEnviarArchivo')
<script>
    localStorage.setItem("sba",4);
    var tablaDeRegistros;
    var flip=0;
    var idCrp = '';
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
     //    initFv('fvbuscot',rules());
    	fillRegistros();
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");

        // var fechaActual = new Date();
        // var anioActual = new Date().getFullYear();
        $('#anio').val(new Date().getFullYear());
    });
    $('.searchMisCot').on('click',function(){
        searchMisCot();
    });
    function searchMisCot()
    {
        // if($('#fvbuscot').valid()==false)
        // {return;}
        // if($('#fechaInicial').val()>$('#fechaFinal').val())
        // {msjSimple(false,"La fecha inicial debe ser menor a la fecha final."); return;}
        var formData = new FormData($("#fvbuscot")[0]);
        // $('.searchCot').prop('disabled',true); 
        $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paCotRecPro/search') }}",
            method: 'post',
            data: formData,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r)
            {
                console.log('----------------------');
                console.log(r);
                console.log('----------------------');
                var html = '';
                var opciones = '';
                construirTabla();
                for (var i = 0; i < r.data.length; i++) 
                {
                    if(r.data[i].estadoCrp=='1')
                    {
                        opciones = '<span class="badge badge-light shadow"> Cotizacion Enviada</span>';
                    }
                    else
                    {
                        opciones = '<button type="button" class="btn btn-sm btn-primary" onclick="showArchivos('+r.data[i].idCrp+');"><i class="fa fa-download" ></i></button>'+
                            '<button type="button" class="btn btn-sm btn-success ml-1" onclick="mSend('+r.data[i].idCrp+');"><i class="fa fa-paper-plane"></i> Enviar</button>';
                    }
                    html += '<tr>' +
                        '<td class="text-center font-weight-bold">' + (i+1) + '</td>' +
                        '<td class="text-center font-weight-bold">' + novDato(r.data[i].tipo) + '</td>' +
                        '<td class="text-center font-weight-bold">' + r.data[i].frCrp + '</td>' +
                        '<td class="text-center">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
                        '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                        '<td class="text-center">' + novDato('S/. '+r.data[i].total) + '</td>' +
                        '<td class="text-center">' + estadoEnviado(r.data[i].estadoCrp) + '</td>' +
                        '<td class="text-center">' + 
                            opciones + 
                            // '<button type="button" class="btn btn-sm btn-primary" onclick="showArchivos('+r.data[i].idCrp+');"><i class="fa fa-download" ></i></button>'+
                            // '<button type="button" class="btn btn-sm btn-success ml-1" onclick="mSend('+r.data[i].idCrp+');"><i class="fa fa-paper-plane"></i> Enviar</button>'+

                            // '<div class="btn-group btn-group-sm" role="group">'+
                            //     '<button type="button" class="btn btn-info" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            //     '<button type="button" class="btn btn-success" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            // '</div>'+
                        '</td></tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
                // construirTabla();
                // changeRegistros(r);


                // $('.searchCot').prop('disabled',false); 
                // msjRee(r);
            }
        });
    }
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paCotRecPro/listar') }}",
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r)
            {
                // console.log('r.data');
                // console.log(r.data);
                // console.log('r.data');
                var html = '';
                var opciones = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    if(r.data[i].estadoCrp=='1')
                    {
                        opciones = '<span class="badge badge-light shadow"> Cotizacion Enviada</span>';
                    }
                    else
                    {
                        opciones = '<button type="button" class="btn btn-sm btn-primary" onclick="showArchivos('+r.data[i].idCrp+');"><i class="fa fa-download" ></i></button>'+
                            '<button type="button" class="btn btn-sm btn-success ml-1" onclick="mSend('+r.data[i].idCrp+');"><i class="fa fa-paper-plane"></i> Enviar</button>';
                    }
                    html += '<tr>' +
                        '<td class="text-center font-weight-bold">' + (i+1) + '</td>' +
                        '<td class="text-center font-weight-bold">' + novDato(r.data[i].tipo) + '</td>' +
                        '<td class="text-center font-weight-bold">' + r.data[i].frCrp + '</td>' +
                        '<td class="text-center">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
                        '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                        '<td class="text-center">' + novDato('S/. '+r.data[i].total) + '</td>' +
                        '<td class="text-center">' + estadoEnviado(r.data[i].estadoCrp) + '</td>' +
                        '<td class="text-center">' + 
                            opciones + 
                            // '<button type="button" class="btn btn-sm btn-primary" onclick="showArchivos('+r.data[i].idCrp+');"><i class="fa fa-download" ></i></button>'+
                            // '<button type="button" class="btn btn-sm btn-success ml-1" onclick="mSend('+r.data[i].idCrp+');"><i class="fa fa-paper-plane"></i> Enviar</button>'+

                            // '<div class="btn-group btn-group-sm" role="group">'+
                            //     '<button type="button" class="btn btn-info" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            //     '<button type="button" class="btn btn-success" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            // '</div>'+
                        '</td></tr>';
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
    }
    function showArchivos(id)
    {
        idCrp = id;
        $('#mArchivos').modal('show');
        // jQuery.ajax(
        // { 
        //     url: "{{url('cotizacion/showCotizacion')}}",
        //     data: {id:id},
        //     method: 'post',
        //     headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        //     success: function(r){
        //         showDataCotizacion(r);
        //     }
        // });
    }
    function mSend(id)
    {
        idCrp = id;
        $('#mSend').modal('show');
        cleanFiles();
    }
    function estadoEnviado(estado)
    {
        let badgeEstado='';
        if(estado == '0') badgeEstado='<span class="badge badge-light">PENDIENTE</span>';
        if(estado == '1') badgeEstado='<span class="badge badge-success">ENVIADO</span>';
        return badgeEstado
    }
    function construirTabla()
    {
        $('.contenedorRegistros>div').remove();
        $('.contenedorRegistros').html(tablaDeRegistros);
    }
</script>
@endsection