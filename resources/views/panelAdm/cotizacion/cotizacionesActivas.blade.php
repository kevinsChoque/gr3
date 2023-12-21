@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones Activas</h1></div>
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
<!-- <h1>{{Session::get('proveedor')->banco}}</h1> -->
@if(is_null(Session::get('proveedor')->tipoPersona)
    || is_null(Session::get('proveedor')->numeroDocumento)
    || is_null(Session::get('proveedor')->direccion)
    || is_null(Session::get('proveedor')->correo)
    || is_null(Session::get('proveedor')->celular)
    || is_null(Session::get('proveedor')->usuario)
    || is_null(Session::get('proveedor')->banco)
    || is_null(Session::get('proveedor')->cci)
)
<script>
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        console.log("------------------------------");
        console.log("{{Session::get('proveedor')->idPro}}")
        console.log("{{Session::get('proveedor')->tipoPersona}}")
        console.log("{{Session::get('proveedor')->numeroDocumento}}")
        console.log("{{Session::get('proveedor')->tipoPersona}}")
        console.log("{{Session::get('proveedor')->tipoPersona}}")
        console.log("{{Session::get('proveedor')->banco}}")
        console.log("{{Session::get('proveedor')->cci}}")
        console.log("------------------------------");
        Swal.fire({
            title: "COTIZACION",
            text: "Es necesario que complete sus datos personales.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
            allowOutsideClick: false, 
            allowEscapeKey: false, 
            showCancelButton: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{url('panelAdm/paProveedor/datos')}}";
            }
        });
    });
</script>
@else
<div class="container-fluid mt-3">
    <div class="card card-primary card-outline">
        <div class="overlay overlayRegistros">
            <div class="spinner"></div>
        </div>
    	<div class="card-body">
    		<h3 class="text-center font-weight-bold font-italic">COTIZACIONES EN LINEA</h3>
    		<form id="fvbuscot">
    		<div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row">
            			<div class="col-lg-6 col-12">
            				<div class="form-group row">
        						<label class="col-lg-3 col-sm-4 col-12 col-form-label">Nro de cotizacion:</label>
        						<div class="col-lg-6 col-sm-8 col-12">
        							<input type="text" id="numeroCotizacion" name="numeroCotizacion" class="form-control input">
        						</div>
        					</div>
        				</div>
        				<div class="col-lg-6">
        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Descripcion:</label>
        						<div class="col-sm-6">
        							<input type="text" id="concepto" name="concepto" class="form-control input">
        						</div>
        					</div>
        				</div>
        				<div class="col-lg-6">
        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Fecha Inicial:</label>
        						<div class="col-sm-6">
        							<input type="date" id="fechaInicial" name="fechaInicial" class="form-control input">
        						</div>
        					</div>
        				</div>
        				<div class="col-lg-6">
        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Fecha Final:</label>
        						<div class="col-sm-6">
        							<input type="date" id="fechaFinal" name="fechaFinal" class="form-control input">
        						</div>
        					</div>
        				</div>
        				<div class="col-lg-6">
        					<div class="form-group row">
        						<label class="col-sm-3 col-form-label">Tipo:</label>
        						<div class="col-sm-6">
        							<select name="tipo" id="tipo" class="form-control">
        								<option disabled> Seleccione una opcion</option>
                                        <option value="0" selected>Todos</option>
        								<option value="Bienes">BIENES</option>
        								<option value="Servicios">SERVICIOS</option>
        							</select>
        						</div>
        					</div>
        				</div>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <button class="btn btn-success w-75 searchCot"><i class="fa fa-search"></i> Buscar Cotizacion</button>
                </div> -->
    		</div>
            </form>
    	</div>
        <div class="card-footer py-1 border-transparent">
            <button type="button" class="btn btn-light clean"><i class="fa fa-eraser"></i> Limpiar campos de busqueda</button>
            <button type="button" class="btn btn-success float-right searchCot"><i class="fa fa-search"></i> Buscar Cotizacion</button>
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
                                <th class="text-center text-uppercase" data-priority="1">tipo</th>
                                <th class="text-center text-uppercase" data-priority="2">nro de cotizacion</th>
                                <th class="text-center text-uppercase" data-priority="3">concepto</th>
                                <th class="text-center text-uppercase" data-priority="4">descripcion</th>
                                <th class="text-center text-uppercase" data-priority="4">fecha limite</th>
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

<script>

    localStorage.setItem("sba",5);
    var tablaDeRegistros;
    var flip=0;
    $(document).ready( function () {
        tablaDeRegistros=$('.contenedorRegistros').html();
        initFv('fvbuscot',rules());
    	fillRegistros();
        $('.overlayPagina').css("display","none");
        // $('.overlayRegistros').css("display","none");
    });
    $('.searchCot').on('click',function(){
        searchCot();
    });
    $('.clean').on('click',function(){
        clean();
    });
    
    function fillRegistros()
    {
        $('.contenedorRegistros').css('display','block');
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paCotizacion/listar') }}",
            method: 'get',
            success: function(r)
            {
                console.log('r.data');
                console.log(r.data);
                console.log('r.data');
                var html = '';
                for (var i = 0; i < r.data.length; i++) 
                {
                    console.log(r.data[i].idPro);
                    console.log({{Session::get('proveedor')->idPro}});
                    if(r.data[i].idPro!={{Session::get('proveedor')->idPro}})
                    {
                        html += '<tr>' +
                            '<td class="text-center font-weight-bold">' + novDato(r.data[i].tipo) + '</td>' +
                            '<td class="text-center">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
                            '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                            '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].descripcion) + '</p></td>' +
                            '<td class="text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
                            '<td class="text-center">' + estadoCotizacion(r.data[i].estadoCotizacion) + '</td>' +
                            '<td class="text-center">' + 
                                '<a href="{{ route('ver-archivo') }}/'+r.data[i].archivo+'" target="_blank" class="btn text-info pr-0"><i class="far fa-file-pdf" ></i></a>'+
                                '<button type="button" class="btn text-info" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                            '</td>' +
                        '</tr>';
                    }
                }
                $('#data').html(html);
                initDatatable('registros');
                $('.overlayRegistros').css('display','none');
            }
        });
        
    }
    function changeRegistros(r)
    {
        var html = '';
        for (var i = 0; i < r.data.length; i++) 
        {
            html += '<tr>' +
                '<td class="text-center font-weight-bold">' + novDato(r.data[i].tipo) + '</td>' +
                '<td class="text-center">' + novDato(r.data[i].numeroCotizacion) + '</td>' +
                '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                '<td class=""><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].descripcion) + '</p></td>' +
                '<td class="text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
                '<td class="text-center">' + estadoCotizacion(r.data[i].estadoCotizacion) + '</td>' +
                '<td class="text-center">' + 
                    '<div class="btn-group btn-group-sm" role="group">'+
                        '<button type="button" class="btn text-info" title="Editar registro" onclick="cotizar('+r.data[i].idCot+');"><i class="far fa-file-alt" ></i></button>'+
                    '</div>'+
                '</td>' +
            '</tr>';
        }
        $('#data').html(html);
        initDatatable('registros');
        $('.overlayRegistros').css('display','none');
    }
    function searchCot()
    {
        
        if($('#fvbuscot').valid()==false)
        {return;}
        if($('#fechaInicial').val()>$('#fechaFinal').val())
        {msjSimple(false,"La fecha inicial debe ser menor a la fecha final."); return;}
        // alert('enviar');
        var formData = new FormData($("#fvbuscot")[0]);
        // $('.searchCot').prop('disabled',true); 
        $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paCotizacion/search') }}",
            method: 'post',
            data: formData,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r)
            {
                console.log(r);
                construirTabla();
                changeRegistros(r);
                // $('.searchCot').prop('disabled',false); 
                // msjRee(r);
            }
        });
    }
    function cotizar(id)
    {
    	localStorage.setItem("idCot",id);
        window.location.href = "{{url('panelAdm/paCotizacion/cotizar')}}";
    }
    function rules()
    {
        return {
            numeroCotizacion: {digits: true,},
            tipo: {required: true,},
        };
    }
    function construirTabla()
    {
        $('.contenedorRegistros>div').remove();
        $('.contenedorRegistros').html(tablaDeRegistros);
    }
    function clean()
    {
        $('.input').val('');
        $('#tipo').val('Bienes');
        cleanFv('fvbuscot');
    }
</script>
@endif
@endsection