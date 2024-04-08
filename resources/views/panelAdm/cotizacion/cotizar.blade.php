@extends('plantilla.plantilla')
@section('pageTitle')
<div class="content-header pb-0 pt-2" style="display: none;">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones Activas</h1></div>
            <div class="col-sm-6">
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
<style>
	.custom-file-input:lang(en)~.custom-file-label::after {
	    content: "PDF";
      	font-size: .9rem;
      	padding-inline: 3px;
	}
</style>
<div class="container-fluid mt-3">
    <div class="card">
    	<div class="overlay overlayRegistros">
            <div class="spinner"></div>
        </div>
    	<div class="card-body">
    		<h3 class="text-center font-weight-bold font-italic">ENVIE SU COTIZACION</h3>
    		<form id="fvcotpro">
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right contentFiles">
							<!-- <a href="{{ route('ver-archivo') }}" target="_blank" class="btn text-info cotFile pb-3 pr-0"><i class="fa fa-file-pdf fa-lg"></i> </a>  -->
							Cotizacion: <span class="text-danger">*</span>
						</label>
						<div class="col-sm-9">
							<input type="text" id="concepto" name="concepto" class="form-control concepto" disabled>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tipo de persona: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="tipoPersona" name="tipoPersona" class="form-control tipoPersona" disabled>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Nro. Documento (RUC): <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="numeroDocumento" name="numeroDocumento" class="form-control numeroDocumento" disabled>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
    				<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">Nombres: <span class="text-danger">*</span></label>
						<div class="col-sm-9">
							<input type="text" id="nombreRazon" name="nombreRazon" class="form-control nombreRazon" disabled>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Celular: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="celular" name="celular" class="form-control celular" disabled>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Correo: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="correo" name="correo" class="form-control correo" disabled>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tiempo de Entrega: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<div class="input-group mb-3">
							  	<input type="text" id="timeEntrega" name="timeEntrega" class="form-control timeEntrega soloNumeros" maxlength="6">
							  	<div class="input-group-append">
							    	<span class="input-group-text">DIAS</span>
							 	</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tiempo Validez: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<div class="input-group mb-3">
							  	<input type="text" id="timeValidez" name="timeValidez" class="form-control timeValidez soloNumeros" maxlength="6">
							  	<div class="input-group-append">
							    	<span class="input-group-text">DIAS</span>
							 	</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Se dedica al objeto de contratacion: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<select name="dedica" id="dedica" class="form-control">
								<option disabled>Seleccione una opcion</option>
								<option value="1" selected>SI</option>
								<option value="0">NO</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
    				<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">
							Observacion: <br>
							<span class="badge badge-warning">Cant. de caracteres restantes: <br><strong class="cantCaracteres">200</strong></span>
						</label>
						<div class="col-sm-9">
							<textarea id="obs" name="obs" class="form-control obs" cols="3"></textarea>
						</div>
					</div>
				</div>
    		</div>
    		<div class="col-lg-12">
    			<div class="alert alert-info alert-dismissible">
					<h5><i class="icon fas fa-info"></i> ITEMS DE LA COTIZACION</h5>
					Los datos con <strong class="text-danger">(*) </strong>asterisco, es informacion obligatoria para la cotizacion. <br>
					Los datos de <strong>GARANTIA, MARCA, MODELO Y FICHA TECNICA DE CADA ITEM</strong> son opcionales. <br>
					En caso de <strong>SERVICIO</strong> es necesario ingresar el precio.
				</div>
    		</div>
    		<div class="row">
                <div class="col-lg-12">
                	<div class="table-responsive">
	                    <table class="w-100 table table-hover table-striped table-bordered">
	                        <thead>
	                            <tr class="text-center headTable">
	                                <th class="align-middle" width="30%">Nombre</th>
	                                <th class="align-middle" width="5%">U.M</th>
	                                <th class="align-middle" width="5%">Cant.</th>
	                                <th class="align-middle" width="10%">Garantia</th>
	                                <th class="align-middle" width="10%">marca</th>
	                                <th class="align-middle" width="10%">modelo</th>
	                                <th class="align-middle" width="10%">Precio</th>
	                                <th class="align-middle" width="7%">Subtotal</th>
	                                <th class="align-middle" width="13%">Ficha tecnica</th>
	                            </tr>
	                        </thead>
	                        <tbody id="listItems">
	                        </tbody>
	                        <tfoot>
	                        	<tr class="footTable">
	                        		<td colspan="7" class="text-right">TOTAL:</td>
	                        		<td colspan="1" class="text-center shadow bg-info"><span class="total font-weight-bold"></span></td>
	                        	</tr>
	                        </tfoot>
	                    </table>
                    </div>
                </div>
            </div>
    		</form>
    	</div>
    	<div class="card-footer text-center">
    		<button type="button" class="btn btn-success guardarCotPro ml-2"><i class="fa fa-save"></i> Guardar Cotizacion</button>
    	</div>
    	<form id="downloadCotizacion" action="{{ url('panelAdm/paCotRecPro/generarCot') }}" method="POST" target="_blank">
		    @csrf
		    <input type="hidden" id="data" name="data">
		    <input type="hidden" id="tEntrega" name="tEntrega">
		    <input type="hidden" id="tValidez" name="tValidez">
		    <input type="hidden" id="tGarantia" name="tGarantia">
		    <input type="hidden" id="idCot" name="idCot">
		</form>
    </div>
</div>

<script>
	var flip=0;
    var tipoCotizacion = '';
    $(document).ready( function () {
    	// se inicializa el formulario fvcotpro con sus respectivas reglas
    	initFv('fvcotpro',rules());
    	loadData();
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
    });
    $('.guardarCotPro').on('click',function(){
    	guardarCotPro();
    });
 	$('.downloadCotLle').on('click',function(){
 		downloadCotLle();
 	});
 	$('#obs').on('input', function() {
    	var maxCaracteres = 200;
    	$(this).val($(this).val().replace(/\s+/g, ' '));
      	var caracteresRestantes = maxCaracteres - $(this).val().length;
      	if (caracteresRestantes >= 0) 
	        $('.cantCaracteres').text(caracteresRestantes);
	    else 
	        $(this).val($(this).val().substring(0, maxCaracteres));
    });
	var po='';
 	function downloadCotLle()
    {
    	let banGarantia = true;
    	let banMarca = true;
    	let banModelo = true;
    	let banPrecio = true;
    	let ids = [];
    	let garantia = [];
    	let marca = [];
    	let modelo = [];
    	let precio = [];
    	var archivos = [];
    	var miObjeto = {};

    	let eMarca = '';
    	let eModelo = '';
    	let ePrecio = '';
    	// se agrega en un array
    	// cada uno de los elementos para posteriormente contruir un objeto
    	$(".idCi").each(function(){
    	    ids.push($(this).attr('data-id'))
    	});
    	$(".garantia").each(function(){
    	    if($(this).val()=='')
    	    	banGarantia = false
    	    garantia.push($(this).val())
    	});
    	$(".marca").each(function(){
    	    if($(this).val()=='')
    	    {
				eMarca='Ingrese las Marcas';
    	    	banMarca = false
    	    }
    	    marca.push($(this).val())
    	});
    	$(".modelo").each(function(){
    	    if($(this).val()=='')
    	    {
    	    	eModelo='Ingrese las Modelos';
    	    	banModelo = false
    	    }
    	   	modelo.push($(this).val())
    	});
    	$(".precio").each(function(){
    	    if($(this).val()=='')
    	    {
    	    	ePrecio='Ingrese los precios';
    	    	banPrecio = false
    	    }
    	    precio.push($(this).val())
    	});

        $('#pdfCll').rules('remove', 'required');
        $('#pdfDj').rules('remove', 'required');
        $('#pdfCci').rules('remove', 'required');
        $('#pdfAnexo5').rules('remove', 'required');

        // se realiza la validacion, del formulario
    	if($('#fvcotpro').valid()==false)
    	{return;}
    	if(banMarca && banModelo && banPrecio)
    	{
    		var miObjeto = {};
	    	$('.itemsCotizacion').each(function(index, el) {
	    		miObjeto[index] = {
			  		nombre: $(this).find('.nombreItem').html(),
				    um: $(this).find('.umItem>span').html(),
				    cant: $(this).find('.cantItem').html(),
				    garantia: $(this).find('.garantia').val(),
				    marca: $(this).find('.marca').val(),
				    modelo: $(this).find('.modelo').val(),
				    precio: $(this).find('.precio').val(),
			  	};
	    	});
            
	    	$('#data').val(JSON.stringify(miObjeto));
	    	$('#tEntrega').val($('#timeEntrega').val());
	    	$('#tValidez').val($('#timeValidez').val());
	    	
	    	$('#idCot').val(localStorage.getItem('idCot'));
	    	$('#downloadCotizacion').submit();
    	}
    	else
    	{
    		error = eMarca+(eMarca==''?'':', ')+
				eModelo+(eModelo==''?'':', ')+
				ePrecio+'.';
			msjError(error);
    	}
    }
    function rules()
	{
	    return {
	        timeEntrega: {required: true,},
	        timeValidez: {required: true,},
	        dedica: {required: true,},
	    };
	}
	var obj;
	var estado;
	var arc;
    function guardarCotPro()
    {
    	let banGarantia = true;
    	let banMarca = true;
    	let banModelo = true;
    	let banPrecio = true;
    	let ids = [];
    	let garantia = [];
    	let marca = [];
    	let modelo = [];
    	let precio = [];
    	var archivos = [];
    	var miObjeto = {};
    	// se agrega cada uno de los elementos a un array segun corresponda
    	// para posteriormente crear un objeto, esto para crear los registro
    	$(".idCi").each(function(){
    	    ids.push($(this).attr('data-id'))
    	});
    	$(".garantia").each(function(){
    	    if($(this).val()=='')
    	    	banGarantia = false
    	    garantia.push($(this).val())
    	});
    	$(".marca").each(function(){
    	    if($(this).val()=='')
    	    	banMarca = false
    	    marca.push($(this).val())
    	});
    	$(".modelo").each(function(){
    	    if($(this).val()=='')
    	    	banModelo = false
    	   	modelo.push($(this).val())
    	});
    	$(".precio").each(function(){
    	    if($(this).val()=='')
    	    	banPrecio = false
    	    precio.push($(this).val())
    	});
    	
        arc=archivos;
    	
    	if($('#fvcotpro').valid()==false)
    	{return;}
    	// se verifica si se ingreso las marcas, modelos y precios de cada item
    	if(banPrecio)
    	{
    		var fileInputs = document.getElementsByClassName('fileItem');
    		
    		var nombreArchivo='no tiene';
    		// se crea el objeto con los arrays anteiormente mencionado
    		for (var i = 0; i < $(".marca").length; i++) 
	    	{
			    if (fileInputs[i].files.length > 0) 
			    {	nombreArchivo = fileInputs[i].files[0].name;}
                
			  	miObjeto["item" + i] = {
			  		id: ids[i],
				    garantia: garantia[i],
				    marca: marca[i],
				    modelo: modelo[i],
				    precio: precio[i],
				    archivo: nombreArchivo,
			  	};
			  	nombreArchivo='no tiene';
			}
			obj=miObjeto;
			// en caso tengan archivos los items se guarda en un array dentro del objeto formdata
			var formData = new FormData($("#fvcotpro")[0]);
			
			for (var i = 0; i < archivos.length; i++) {
	            formData.append('archivos[]', archivos[i]);
	        }
	        var j=0;

	        $('.fileItem').each(function() {
	            if ($(this)[0].files.length > 0) {
	                formData.append('archivos[]', $(this)[0].files[0]);
	            }
	            j++;
	        });
			// se serializa los valores de los items q se encuentran en el array de miObjeto
			// como tambien se agrega mas datos al objeto del formulario
			formData.append('items',JSON.stringify(miObjeto));
			formData.append('idCot',localStorage.getItem('idCot'));
			formData.append('total',$('.total').html());

			$('.guardarCotPro').prop('disabled',true);
    		
    		$( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
    		jQuery.ajax(
	        { 
	            url: "{{url('panelAdm/paCotRecPro/guardar')}}",
	            data: formData,
	            method: 'post',
	            dataType: 'json',
		        processData: false, 
		        contentType: false, 
	            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
	            success: function(r){
	                estado=r.estado;
	                if (r.estado)
		            {
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
		                        window.location.href = "{{url('panelAdm/paCotizacion/misCotizaciones')}}";
		                    }
		                });
		            }
		            else
		            {
		            	$( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
		            	$('.guardarCotPro').prop('disabled',false);
		            	msjRee(r);
		            }
	            },
		        error: function (xhr, status, error) {
		            msjError("Ocurrio un problema, porfavor contactese con el Administrador del sistema.");
		        }
	        });
    	}
    	else
    	{
    		msjError("Ingrese los precios de cada Items.");
    	}
    }
	// carga los datos del proveedor y algunos datos de la cotizacion, 
	// al cual el proveedor eligio para postular
    function loadData()
    {
    	$('#mCotizacion').modal('show');
        jQuery.ajax(
        { 
            url: "{{url('panelAdm/paCotizacion/showProCot')}}",
            data: {id:localStorage.getItem('idCot')},
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                tipoCotizacion=r.cot.tipo;

                $('.nombreRazon').val(r.pro.tipoPersona=="PERSONA NATURAL"?
                	r.pro.nombre+' '+r.pro.apellidoPaterno+' '+r.pro.apellidoMaterno:r.pro.razonSocial);
                $('.concepto').val(r.cot.concepto);
                $('.tipoPersona').val(r.pro.tipoPersona);
                $('.numeroDocumento').val(r.pro.numeroDocumento);
                $('.celular').val(r.pro.celular);
                $('.correo').val(r.pro.correo);
                var dir = $('.cotFile').attr('href');
                $('.cotFile').attr('href',dir+'/'+r.cot.archivo);	
                let iconosFiles = ''+
                	'<a href="javascript:void(0)" class="btn text-info pb-3 pr-0" onclick="showFile(\''+r.cot.idCot+'\');" title="Ver cotizacion"><i class="fa fa-file-pdf fa-lg"></i> </a> ';
                	

                if(r.cot.anexoPdf!==null)
                {
                	iconosFiles += '<a href="javascript:void(0)" class="btn text-info pb-3 pr-0" onclick="showFileAnexos(\''+r.cot.idCot+'\');" title="Ver anexos de la cotizacion"><i class="fa fa-file fa-lg"></i></a>';
                }
                $('.contentFiles').prepend(iconosFiles);
                // <a href="{{ route('ver-archivo') }}" target="_blank" class="btn text-info cotFile pb-3 pr-0"><i class="fa fa-file-pdf fa-lg"></i> </a>
                flexTable();	
                loadItemsCotizacion();		
            }
        });
    }
    function showFile(idCot)
	{
	    jQuery.ajax({
	        url: "{{ url('cotizacion/verFile') }}",
	        method: 'post', 
	        data: {idCot:idCot},
	        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
	        success: function (r) {
	            // console.log(r);
	            abrirArchivoBase64EnNuevaPestana(r.file,"application/pdf");
	        },
	        error: function (xhr, status, error) {
	            msjError("Algo salio mal, porfavor contactese con el Administrador.");
	        }
	    });
	}
	function showFileAnexos(idCot)
	{
	    jQuery.ajax({
	        url: "{{ url('cotizacion/verFileAnexo') }}",
	        method: 'post', 
	        data: {idCot:idCot},
	        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
	        success: function (r) {
	            // console.log(r);
	            abrirArchivoBase64EnNuevaPestana(r.file,"application/pdf");
	        },
	        error: function (xhr, status, error) {
	            msjError("Algo salio mal, porfavor contactese con el Administrador.");
	        }
	    });
	}
    // esta funcion nos ayuda a habilitar la tabla de los items para los casos que la cotizacion sea de bienes o servicios
    function flexTable()
    {
        let head1 = '<th class="align-middle" width="27%">Nombre</th>'+
        '<th class="align-middle" width="5%">U.M</th>'+
        '<th class="align-middle" width="5%">Cant.</th>'+
        '<th class="align-middle" width="13%">Garantia</th>'+
        '<th class="align-middle" width="10%">marca</th>'+
        '<th class="align-middle" width="10%">modelo</th>'+
        '<th class="align-middle" width="10%">Precio <strong class="text-danger">*</strong></th>'+
        '<th class="align-middle" width="7%">Subtotal</th>'+
        '<th class="align-middle" width="13%">Ficha tecnica</th>';
        let head2 = '<th class="align-middle" width="35%">Nombre</th>'+
        '<th class="align-middle" width="5%">U.M</th>'+
        '<th class="align-middle" width="5%">Cant.</th>'+
        '<th class="align-middle" width="13%">Garantia</th>'+
        '<th class="align-middle" width="15%">Precio <strong class="text-danger">*</strong></th>'+
        '<th class="align-middle" width="12%">Subtotal</th>'+
        '<th class="align-middle" width="15%">Ficha tecnica</th>';
        let foot1 = '<td colspan="7" class="text-right">TOTAL:</td>'+
                    '<td colspan="1" class="text-center shadow bg-info"><span class="total font-weight-bold"></span></td>';
        let foot2 = '<td colspan="5" class="text-right">TOTAL:</td>'+
                    '<td colspan="1" class="text-center shadow bg-info"><span class="total font-weight-bold"></span></td>';
        $('.headTable').html(tipoCotizacion=='Bienes'?head1:head2);
        $('.footTable').html(tipoCotizacion=='Bienes'?foot1:foot2);
    }
    // carga los items de la cotizacion, crea cada fila de la tabla con los 
    // inputs para registrar ya sea la garantia, marca, modelo y precios, 
    // como tambien los archivos de cada uno, estos archivos son opcionales
    function loadItemsCotizacion()
	{
	    jQuery.ajax({
	        url: "{{ url('cotxitm/loadSegunCotizacion') }}",
	        method: 'POST', 
	        data: {idCot:localStorage.getItem('idCot')},
	        dataType: 'json',
	        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
	        success: function (r) {
	        	console.log(r)
	            let idFila = '';
	            var html = '';
                let segunTipo = '';
	            for (var i = 0; i < r.data.length; i++) 
	            {
                    if(tipoCotizacion!="Servicios")
                    {
                        segunTipo = '<td class="text-center"><input type="text" class="form-control marca px-1" onkeyup="marcaOnly(this)"></td>' +
                        '<td class="text-center"><input type="text" class="form-control modelo px-1"></td>';
                    }
	                // idFila = localStorage.getItem('idCot')+r.data[i].idItm;
	                idFila = localStorage.getItem('idCot')+i;
	                html += '<tr class="itemsCotizacion fila'+idFila+'">' +
	                    '<td class="font-weight-bold align-middle idCi nombreItem" data-id="'+novDato(r.data[i].idCi)+'">' + novDato(r.data[i].nombre) +'</td>' +
	                    '<td class="text-center align-middle umItem"><span class="font-weight-bold badge badge-light um'+idFila+'">'+ novDato(r.data[i].um) + '</td>' +
	                    '<td class="text-center align-middle cantItem cant'+i+'">' + novDato(r.data[i].cantidad) + '</td>' +
	                    '<td class="text-center">'+
	                    	'<div class="input-group mb-3">'+
							  	'<input type="text" class="form-control garantia soloNumeros" maxlength="2">'+
							  	'<div class="input-group-append">'+
							    	'<span class="input-group-text">MESES</span>'+
							 	'</div>'+
							'</div>'+
	                    '</td>'+
                        segunTipo +
	                    '<td class="text-center">' + 
							'<input type="text" class="form-control precio px-1" onblur="calcSubTotal(this,'+i+');">' +
	                    '</td>' +
	                    '<td class="text-center">' + 
	                    	'<input type="text" class="form-control text-center subtotal st'+i+'" value="0" disabled>' +
	                    '</td>' +
	                    '<td>' + 
		                    '<div class="custom-file">'+
		                      	'<input type="file" class="custom-file-input fileItem" onchange="changeNameFile(this)">'+
		                      	'<label class="custom-file-label changeNameFile" for="customFile">Archivo</label>'+
		                    '</div>'+
	                    '</td>' +
	                '</tr>';
	            }
	            calcTotal();
	            $('#listItems').html(html);
	            $('.marca').each(function(){
		            var valor = $(this).val();
		            console.log(valor);
		        });
	        },
	        error: function (xhr, status, error) {
	            msgError("Algo salio mal, porfavor contactese con el Administrador.");
	        }
	    });
	}
	function marcaOnly(ele)
	{	$(ele).val($(ele).val().replace(/\s/g, ''));}
	function changeNameFile(elem)
	{
		var fileName = $(elem).val().split('\\').pop();
    	$(elem).parent().find('label').html(fileName);
	}
	// calculammos el subtotal de cada item
	// para el caso de bienes se multiplica la cantidad por el precio unitario
	// y para el caso de servicio vendria a ser el mmismo
	// este subtotal sera util para el calculo del total
	function calcSubTotal(ele,id)
	{
        if(tipoCotizacion=='Bienes')
		    $('.st'+id).val($(ele).val()*parseFloat($('.cant'+id).html()));
        else
            $('.st'+id).val($(ele).val());
		calcTotal();
	}
	// con esta funcion sumamos los subtotal de cada item y esto vendria a ser
	// el total de la cotizacion
	function calcTotal()
	{
		let total = 0;
		$(".subtotal").each(function(){
    	    total = total + parseFloat($(this).val());
    	});
    	$('.total').html(total);
	}
</script>
@endsection