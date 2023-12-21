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
<style>
	.custom-file-input:lang(en)~.custom-file-label::after {
	    /*content: "\f004";*/
	    content: "PDF"; /* Código Unicode del icono de PDF */
      	/*font-family: 'Font Awesome 4 Free';*/
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
						<label class="col-sm-2 col-form-label text-right"><a href="{{ route('ver-archivo') }}" target="_blank" class="btn text-info cotFile pb-3 pr-0"><i class="fa fa-file-pdf fa-lg"></i> </a> Cotizacion: <span class="text-danger">*</span></label>
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
							<input type="text" id="timeEntrega" name="timeEntrega" class="form-control timeEntrega">
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tiempo Validez: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="timeValidez" name="timeValidez" class="form-control timeValidez">
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
				<!-- <div class="col-lg-6">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label text-right">Tiempo de garantia: <span class="text-danger">*</span></label>
						<div class="col-sm-6">
							<input type="text" id="timeGarantia" name="timeGarantia" class="form-control timeGarantia">
						</div>
					</div>
				</div> -->
    		</div>
    		<!-- <hr>
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="callout callout-info py-2 bg-teal">
						<h5 class="m-0 font-weight-bold font-italic">Formatos!</h5>
						<p class="m-0">- Los formatos se encuentran en el <strong>MENU (COLUMNA IZQUIERDA)</strong>.</p>
						<p class="m-0">- Descargar los formatos y llenar los datos que falten, una vez realizado subirlos donde corresponda.</p>
						<p class="m-0">- <strong>La COTIZACION LLENADA:</strong> Registramos todos los datos e imprimimos.</p>
					</div>
    			</div>	
    			<div class="col-lg-3">
    				<label class="m-0">Cotizacion llenada: <span class="text-danger">*</span></label>
    				<div class="custom-file">
                      	<input type="file" class="custom-file-input" onchange="changeNameFile(this)" name="pdfCll" id="pdfCll">
                      	<label class="custom-file-label" for="customFile">Cotizacion llenada</label>
                    </div>
    			</div>	
    			<div class="col-lg-3">
    				<label class="m-0">Declaracion Jurada: <span class="text-danger">*</span></label>
    				<div class="custom-file">
                      	<input type="file" class="custom-file-input" onchange="changeNameFile(this)" name="pdfDj" id="pdfDj">
                      	<label class="custom-file-label" for="customFile">Declaracion jurada</label>
                    </div>
    			</div>
    			<div class="col-lg-3">
    				<label class="m-0">CCI: <span class="text-danger">*</span></label>
    				<div class="custom-file">
                      	<input type="file" class="custom-file-input" onchange="changeNameFile(this)" name="pdfCci" id="pdfCci">
                      	<label class="custom-file-label" for="customFile">CCI</label>
                    </div>
    			</div>
    			<div class="col-lg-3">
    				<label class="m-0">Anexo 5: <span class="text-danger">*</span></label>
    				<div class="custom-file">
                      	<input type="file" class="custom-file-input" onchange="changeNameFile(this)" name="pdfAnexo5" id="pdfAnexo5">
                      	<label class="custom-file-label" for="customFile">Anexo 5</label>
                    </div>
    			</div>
    		</div>
    		<hr> -->
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
	                            <!-- <tr class="text-center">
	                                <th colspan="6">Sin items</th>
	                            </tr> -->
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
			<!-- <button type="button" class="btn btn-primary downloadCotLle"><i class="fa fa-file-pdf"></i> Descargar cotizacion llenada</button> -->


            
			<!-- <a href="{{url('panelAdm/paCotRecPro/generarCot')}}" target="_blank" class="btn btn-primary shadow downloadCotLle">
                <i class="fas fa-file-pdf"></i> Descargar Cotizacion Llenada
            </a> -->
    	</div>
    	<form id="downloadCotizacion" action="{{ url('panelAdm/paCotRecPro/generarCot') }}" method="POST" target="_blank">
		    @csrf
		    <input type="hidden" id="data" name="data">
		    <input type="hidden" id="tEntrega" name="tEntrega">
		    <input type="hidden" id="tValidez" name="tValidez">
		    <input type="hidden" id="tGarantia" name="tGarantia">
		    <input type="hidden" id="idCot" name="idCot">
		    <!-- Agrega aquí cualquier dato adicional que desees enviar -->
		    <!-- <button type="submit" class="btn btn-primary shadow">
		        <i class="fas fa-file-pdf"></i> Descargar Cotizacion Llenada
		    </button> -->
		</form>
    </div>
</div>

<script>
	var flip=0;
    var tipoCotizacion = '';
    $(document).ready( function () {
    	// fillRegistros();
    	initFv('fvcotpro',rules());
    	loadData();
    	// loadItemsCotizacion()
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
  		// bsCustomFileInput.init();
  		// $('.downloadCotLle').attr('href')
  		// var dir = $('.downloadCotLle').attr('href');
    //     $('.downloadCotLle').attr('href',dir+'/'+r.cot.archivo);
    });
    
    $('.guardarCotPro').on('click',function(){
    	guardarCotPro();
    });
	// $('.fileItem').on('change',function(){
	// 	var fileName = $(this).val().split('\\').pop();
 //    	console.log(fileName);
 //    	$(this).parent().find('label').html(fileName);
 //    	// $('.changeNameFile').html(fileName);
 //    });
 	$('.downloadCotLle').on('click',function(){
 		downloadCotLle()
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

    	// $('#fvproveedor .apellidoMaterno').rules('add', {
     //        required: true
     //    });
        $('#pdfCll').rules('remove', 'required');
        $('#pdfDj').rules('remove', 'required');
        $('#pdfCci').rules('remove', 'required');
        $('#pdfAnexo5').rules('remove', 'required');

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
                // miObjeto.push(
                //     {
                //         nombre: $(this).find('.nombreItem').html(),
                //         um: $(this).find('.umItem>span').html(),
                //         cant: $(this).find('.cantItem').html(),
                //         garantia: $(this).find('.garantia').val(),
                //         marca: $(this).find('.marca').val(),
                //         modelo: $(this).find('.modelo').val(),
                //         precio: $(this).find('.precio').val(),
                //     }
                // );
	    	});
            // po = miObjeto;
	    	$('#data').val(JSON.stringify(miObjeto));
	    	$('#tEntrega').val($('#timeEntrega').val());
	    	$('#tValidez').val($('#timeValidez').val());
	    	// $('#tGarantia').val($('#timeGarantia').val());
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
	        // timeGarantia: {required: true,},

	        // pdfCll: {required: true,},
	        // pdfDj: {required: true,},
	        // pdfCci: {required: true,},
	        // pdfAnexo5: {required: true,},
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
    	// $('.fileItem').each(function() {
     //        var archivoInput = $(this)[0];
     //        // Verifica si se seleccionó un archivo
     //        if (archivoInput.files.length > 0) {
     //            var archivo = archivoInput.files[0];
     //            archivos.push(archivo);
     //        }
     //        else
     //        {
     //        	archivos.push('null');
     //        }
     //    });
        arc=archivos;
    	
		// console.log(miObjeto);
		// $('#pdfCll').rules('add', {required: true});
		// $('#pdfDj').rules('add', {required: true});
		// $('#pdfCci').rules('add', {required: true});
		// $('#pdfAnexo5').rules('add', {required: true});

    	if($('#fvcotpro').valid()==false)
    	{return;}
    	// console.log(banMarca)
    	if(banMarca && banModelo && banPrecio)
    	{
    		var fileInputs = document.getElementsByClassName('fileItem');
    		// var archivoInput;
    		var nombreArchivo='no tiene';
    		for (var i = 0; i < $(".marca").length; i++) 
	    	{
			    if (fileInputs[i].files.length > 0) 
			    {
			        nombreArchivo = fileInputs[i].files[0].name;
			    }
                // miObjeto.push(
                //     {
                //         id: ids[i],
                //         garantia: garantia[i],
                //         marca: marca[i],
                //         modelo: modelo[i],
                //         precio: precio[i],
                //         archivo: nombreArchivo,
                //     }
                // );
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

			var formData = new FormData($("#fvcotpro")[0]);
			// -----------------------
			for (var i = 0; i < archivos.length; i++) {
	            formData.append('archivos[]', archivos[i]);
	        }
	        var j=0;
	        $('.fileItem').each(function() {
	            if ($(this)[0].files.length > 0) {
	                // var archivo = archivoInput.files[0];
	                // archivos.push(archivo);
	                console.log('guardo el archivo----> '+j);
	                formData.append('archivos[]', $(this)[0].files[0]);
	            }
	            // else
	            // {
	            // 	console.log('no hay nada');
	            // 	formData.append('archivos[]', 'no hay nada');
	            // }
	            j++;
	        });
			// -----------------------
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
	            	// console.log('entro aki esto estoy evaluando');
	             //    console.log(r.estado);
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
    		msjError("Ingrese todos los datos de los items.");
    	}
    }
    
    function loadData()
    {
    	// console.log('entro')
    	$('#mCotizacion').modal('show');
        jQuery.ajax(
        { 
            url: "{{url('panelAdm/paCotizacion/showProCot')}}",
            data: {id:localStorage.getItem('idCot')},
            method: 'post',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                console.log('-------showProCot-------');
                console.log(r.cot.tipo);
                tipoCotizacion=r.cot.tipo;
                console.log('-------showProCot-------');
                // showDataCotizacion(r);
                // console.log(r.pro.tipoPersona);
                $('.nombreRazon').val(r.pro.tipoPersona=="PERSONA NATURAL"?
                	r.pro.nombre+' '+r.pro.apellidoPaterno+' '+r.pro.apellidoMaterno:r.pro.razonSocial);
                $('.concepto').val(r.cot.concepto);
                $('.tipoPersona').val(r.pro.tipoPersona);
                $('.numeroDocumento').val(r.pro.numeroDocumento);
                $('.celular').val(r.pro.celular);
                $('.correo').val(r.pro.correo);
                var dir = $('.cotFile').attr('href');
                $('.cotFile').attr('href',dir+'/'+r.cot.archivo);	
                flexTable();	
                loadItemsCotizacion();		
            }
        });
    }
    function flexTable()
    {
        let head1 = '<th class="align-middle" width="30%">Nombre</th>'+
        '<th class="align-middle" width="5%">U.M</th>'+
        '<th class="align-middle" width="5%">Cant.</th>'+
        '<th class="align-middle" width="10%">Garantia</th>'+
        '<th class="align-middle" width="10%">marca</th>'+
        '<th class="align-middle" width="10%">modelo</th>'+
        '<th class="align-middle" width="10%">Precio</th>'+
        '<th class="align-middle" width="7%">Subtotal</th>'+
        '<th class="align-middle" width="13%">Ficha tecnica</th>';
        let head2 = '<th class="align-middle" width="40%">Nombre</th>'+
        '<th class="align-middle" width="5%">U.M</th>'+
        '<th class="align-middle" width="5%">Cant.</th>'+
        '<th class="align-middle" width="15%">Precio</th>'+
        '<th class="align-middle" width="12%">Subtotal</th>'+
        '<th class="align-middle" width="23%">Ficha tecnica</th>';
        let foot1 = '<td colspan="7" class="text-right">TOTAL:</td>'+
                    '<td colspan="1" class="text-center shadow bg-info"><span class="total font-weight-bold"></span></td>';
        let foot2 = '<td colspan="4" class="text-right">TOTAL:</td>'+
                    '<td colspan="1" class="text-center shadow bg-info"><span class="total font-weight-bold"></span></td>';
        $('.headTable').html(tipoCotizacion=='Bienes'?head1:head2);
        $('.footTable').html(tipoCotizacion=='Bienes'?foot1:foot2);
    }
    function loadItemsCotizacion()
	{
	    jQuery.ajax({
	        url: "{{ url('cotxitm/loadSegunCotizacion') }}",
	        method: 'POST', 
	        data: {idCot:localStorage.getItem('idCot')},
	        dataType: 'json',
	        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
	        success: function (r) {
	        	console.log('-------loadSegunCotizacion-------');
	            console.log(r);
	            console.log('-------loadSegunCotizacion-------');
	            let idFila = '';
	            var html = '';
                let segunTipo = '';
	            for (var i = 0; i < r.data.length; i++) 
	            {
                    if(tipoCotizacion!="Servicios")
                    {
                        segunTipo = '<td class="text-center"><input type="text" class="form-control garantia px-1"></td>' +
                        '<td class="text-center"><input type="text" class="form-control marca px-1"></td>' +
                        '<td class="text-center"><input type="text" class="form-control modelo px-1"></td>';
                    }
	                idFila = localStorage.getItem('idCot')+r.data[i].idItm;
	                html += '<tr class="itemsCotizacion fila'+idFila+'">' +
	                    '<td class="font-weight-bold idCi nombreItem" data-id="'+novDato(r.data[i].idCi)+'">' + novDato(r.data[i].nombre) +'</td>' +
	                    '<td class="text-center umItem"><span class="font-weight-bold badge badge-light um'+idFila+'">'+ novDato(r.data[i].nombreUm) + '</td>' +
	                    '<td class="text-center cantItem cant'+r.data[i].idItm+'">' + r.data[i].cantidad + '</td>' +
                        segunTipo +

	                    // '<td class="text-center">' + '<input type="text" class="form-control garantia px-1">' + '</td>' +
	                    // '<td class="text-center">' + '<input type="text" class="form-control marca px-1">' + '</td>' +
	                    // '<td class="text-center">' + '<input type="text" class="form-control modelo px-1">' + '</td>' +

	                    '<td class="text-center">' + 
							'<input type="text" class="form-control precio px-1" onblur="calcSubTotal(this,'+r.data[i].idItm+');">' +
	                    '</td>' +
	                    '<td class="text-center">' + 
	                    	'<input type="text" class="form-control text-center subtotal st'+r.data[i].idItm+'" value="0" disabled>' +
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
	        },
	        error: function (xhr, status, error) {
	            alert('salio un error');
	        }
	    });
	}
	function changeNameFile(elem)
	{
		var fileName = $(elem).val().split('\\').pop();
    	console.log(fileName);
    	$(elem).parent().find('label').html(fileName);
	}
	function calcSubTotal(ele,id)
	{
		$('.st'+id).val($(ele).val()*parseFloat($('.cant'+id).html()));
		calcTotal();
	}
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