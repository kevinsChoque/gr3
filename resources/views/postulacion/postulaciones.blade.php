@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Postulaciones</h1></div>
            <div class="col-sm-6">
                <a href="{{url('postulaciones/ver')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> Ver lista de postulaciones</a>
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
<div class="col-12" id="accordion" style="display: none;">
	<div class="card card-primary card-outline">
		<a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
			<div class="card-header">
				<div class="row">
					<div class="col-lg-9">
						<div class="user-block w-100">
	                        <img class="img-circle img-bordered-sm" src="{{asset('img/admin/funcionarios/icono.jpg')}}" alt="user image">
	                        <span class="username">
	                          	<a href="#">PERSONA NATURAL: edi gutierres Ticona</a>
	                          	<!-- <a href="#" class="float-right btn-tool"><i class="fas fa-user"></i> Mas informacion</a> -->
	                        </span>
	                        <span class="description"><span class="shadow badge badge-warning">Postulando</span> - 28 de Noviembre de 2023 10:03:12 PM</span>
	                  	</div>
					</div>
					<div class="col-lg-3">
						<span class="shadow bg-info text-center font-weight-bold float-right p-2">total S/. 666</span>
					</div>
				</div>
			</div>
		</a>
		<div id="collapseOne" class="collapse" data-parent="#accordion" style="">
			<div class="card-body">
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-9 contentPost">
			<div class="card" style="display: none;">
              	<div class="card-header p-2"><h6 class="m-0">Postulacion de proveedores</h6></div>
              	<div class="card-body contentPost_old">
              		<!-- Post -->
                    <div class="post" style="display: none;">
                      	<div class="user-block">
	                        <img class="img-circle img-bordered-sm" src="{{asset('img/admin/funcionarios/icono.jpg')}}" alt="user image">
	                        <span class="username">
	                          	<a href="#">Jonathan Burke Jr.</a>
	                          	<a href="#" class="float-right btn-tool"><i class="fas fa-user"></i> Mas informacion</a>
	                        </span>
	                        <span class="description">Enviado - 7:30 PM today</span>
                      	</div>
                      	<div class="row">
                      		<div class="col-lg-12">
                      		 	<strong><i class="fas fa-info mr-1"></i> Datos de postulacion</strong>
                      		</div>
                      		<div class="col-lg-3">
                                <p class="text-sm">Tiempo de entrega:
                                    <b class="d-block">666</b>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <p class="text-sm">Tiempo de validez:
                                    <b class="d-block">666</b>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <p class="text-sm">Se dedica:
                                    <b class="d-block">666</b>
                                </p>
                            </div>
                            <div class="col-lg-3">
                                <p class="text-sm">Tiempo de garantia:
                                    <b class="d-block">666</b>
                                </p>
                            </div>
                            <div class="col-lg-12">
                      		 	<strong><i class="fas fa-file mr-1"></i> Archivos de postulacion</strong>
                      		</div>
                      		<div class="col-lg-3">
                                <p class="text-sm">Archivo:
                                    <b>666</b>
                                </p>
                            </div>
                            <div class="col-lg-12">
                      		 	<strong><i class="fas fa-list mr-1"></i> Items</strong>
                      		</div>
                      		<div class="col-lg-12">
                      			<table class="table table-sm">
					                <thead>
					                    <tr>
					                      <th style="width: 10px">#</th>
					                      <th>Nombre</th>
					                      <th>U/M</th>
					                      <th style="width: 40px">Cant</th>
					                      <th>Marca</th>
					                      <th>Modelo</th>
					                      <th>Precio</th>
					                    </tr>
					                </thead>
				                  	<tbody>
					                    <tr>
					                      	<td>1.</td>
					                      	<td>Update software</td>
					                      	<td>csa</td>
					                      	<td>cs</td>
					                      	<td>Update software</td>
					                      	<td>csa</td>
					                      	<td>cs</td>
					                    </tr>
				                  	</tbody>
                				</table>
                      		</div>
                      	</div>
                    </div>
                    <!-- /.post -->
              	</div>
            </div>
		</div>
		<div class="col-md-3">
            <div class="card card-primary card-outline shadow">
            	<div class="overlay ovCot">
                    <div class="spinner"></div>
                </div>
            	<div class="ribbon-wrapper ribbon-lg">
                    <div class="ribbon bg-primary">Finalizado</div>
              	</div>
               	<div class="card-body box-profile p-0">
               		<!-- <a href="{{ route('ver-archivo') }}" class="d-block fileCotizacion font-weight-bold" target="_blank">-</a> -->
               		<a href="{{ route('ver-archivo') }}" class="fileCotizacion" target="_blank">
	                	<h3 class="profile-username text-center cotizacion btn btn-link mb-0 text-center w-100">--</h3>
               		</a>
	                <p class="text-muted text-center m-0 items">Items: --</p>
              	</div>
              	<div class="card-body py-0">
	              	<hr>
	              	<strong><i class="fas fa-book mr-1"></i> Concepto</strong>
	                <p class="text-muted concepto">--</p>
	                <hr>
	            	<strong><i class="fas fa-info mr-1"></i> Descripcion</strong>
	                <p class="text-muted descripcion">--</p>
	                <hr>
	                <strong><i class="far fa-calendar-alt mr-1"></i> Fechas</strong>
	                <p class="text-muted fechas">--</p>
              	</div>
            </div>
        </div>
	</div>
    <!-- <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-list"></i> Lista de Postulaciones</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <div class="row">
                        <h1>post</h1>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<a href="{{ route('cotRecPro-archivo') }}" ></a>
<script>
localStorage.setItem("sbd",0);
localStorage.setItem("sba",7);
    // var tablaDeRegistros;
    // var flip=0;
    $(document).ready( function () {
        // tablaDeRegistros=$('.contenedorRegistros').html();
        // fillRegistros();
        loadCotizacion();
        loadPostulaciones();
        $('.overlayPagina').css("display","none");
        // ------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------
		    // Valor de fecha en formato string
		var fechaString = "2023-11-27 13:47:30";

		// Crear un objeto Date a partir del string
		var fecha = new Date(fechaString);

		// Obtener los componentes de la fecha
		// var año = fecha.getFullYear();
		// var mes = obtenerNombreMes(fecha.getMonth() + 1); // Función para obtener el nombre del mes
		// var dia = fecha.getDate();
		// var horas = obtenerFormato12Horas(fecha.getHours()); // Función para obtener formato de 12 horas
		// var minutos = agregarCeroInicial(fecha.getMinutes());
		// var segundos = agregarCeroInicial(fecha.getSeconds());
		// var ampm = obtenerAMPM(fecha.getHours()); // Función para obtener AM o PM

		// Formatear la fecha en un string más explícito
		var fechaFormateada = `${fecha.getDate()} de ${obtenerNombreMes(fecha.getMonth() + 1)} de ${fecha.getFullYear()} ${obtenerFormato12Horas(fecha.getHours())}:${agregarCeroInicial(fecha.getMinutes())}:${agregarCeroInicial(fecha.getSeconds())} ${obtenerAMPM(fecha.getHours())}`;

		console.log(fechaFormateada);


		// ------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------
    } );
    function loadPostulaciones()
    {
    	// showPostulantes
    	jQuery.ajax({
            url: "{{ url('postulaciones/showPostulantes') }}",
            method: 'POST', 
            data: {id:localStorage.getItem("idCot")},
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
            	console.log(r);
            	let html='';
            	let idBan=0;
            	let name='';
            	let dir = '';
            	let enlace = '';
            	let fecha = '';
            	let fechaFormat = '';

            	for (var i = 0; i < r.data.length; i++) 
                {
					if(r.data[i].idPro!=idBan)
					{
						fecha = new Date(r.data[i].fr);
						fechaFormat = `${fecha.getDate()} de ${obtenerNombreMes(fecha.getMonth() + 1)} de ${fecha.getFullYear()} ${obtenerFormato12Horas(fecha.getHours())}:${agregarCeroInicial(fecha.getMinutes())}:${agregarCeroInicial(fecha.getSeconds())} ${obtenerAMPM(fecha.getHours())}`;
						// -----
						dir = "{{ route('cotRecPro-archivo') }}"+'/'+r.data[i].idPro+'/'+r.data[i].idCrp+'/'+r.data[i].archivo;
						enlace = r.data[i].archivo===null?
							'<b>--</b>':
							'<a href="'+dir+'" target="_blank">'+r.data[i].archivo+'</a>';
						// ----------------
						name = r.data[i].tipoPersona=="PERSONA NATURAL"?
							r.data[i].nombrePro+' '+r.data[i].apellidoPaterno+' '+r.data[i].apellidoMaterno:
							r.data[i].razonSocial; 
						html += '<div class="col-12" id="accordion'+i+'">'+
									'<div class="card">'+
										'<a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne'+r.data[i].idPro+'" aria-expanded="false">'+
											'<div class="card-header">'+
											// --
												'<div class="row">'+
													'<div class="col-lg-9">'+
														'<div class="user-block w-100">'+
									                        '<img class="img-circle img-bordered-sm shadow mr-3" src="{{asset('img/admin/funcionarios/icono.jpg')}}" alt="user image">'+
									                        '<span class="username">'+
									                          	'<a href="#">'+novDato(r.data[i].tipoPersona+': '+name)+'</a>'+
									                        '</span>'+
									                        '<span class="description">'+statePostulacion(r.data[i].estadoCrp)+' - '+fechaFormat+'</span>'+
									                  	'</div>'+
													'</div>'+
													'<div class="col-lg-3">'+
														'<span class="shadow bg-info text-center font-weight-bold float-right p-2">Total S/. '+r.data[i].total+'</span>'+
													'</div>'+
												'</div>'+
											// --
												// '<h4 class="card-title w-100">'+ 
												// 	'<div class="user-block">'+
								    //                     '<img class="img-circle img-bordered-sm" src="{{asset('img/admin/funcionarios/icono.jpg')}}" alt="user image">'+
								    //                     '<span class="username">'+
								    //                       	'<a href="#">'+novDato(r.data[i].tipoPersona+': '+name)+'</a>'+
								    //                       	'<a href="#" class="float-right btn-tool"><i class="fas fa-user"></i> Mas informacion</a>'+
								    //                     '</span>'+
								    //                     '<span class="description">'+statePostulacion(r.data[i].estadoCrp)+' - '+fechaFormat+'</span>'+
							     //                  	'</div>'+
												// '</h4>'+
											'</div>'+
										'</a>'+
										'<div id="collapseOne'+r.data[i].idPro+'" class="collapse" data-parent="#accordion'+i+'">'+
											'<div class="card-body">';
						html += '<div class="post">'+
	                      	// '<div class="user-block">'+
		                      //   '<img class="img-circle img-bordered-sm" src="{{asset('img/admin/funcionarios/icono.jpg')}}" alt="user image">'+
		                      //   '<span class="username">'+
		                      //     	'<a href="#">'+novDato(r.data[i].tipoPersona+': '+name)+'</a>'+
		                      //     	'<a href="#" class="float-right btn-tool"><i class="fas fa-user"></i> Mas informacion</a>'+
		                      //   '</span>'+
		                      //   '<span class="description">'+statePostulacion(r.data[i].estadoCrp)+' - '+fechaFormat+'</span>'+
	                      	// '</div>'+
	                      	'<div class="row">'+
	                      		'<div class="col-lg-12">'+
	                      		 	'<strong><i class="fas fa-info mr-1"></i> Datos de postulacion</strong>'+
	                      		'</div>'+
	                      		'<div class="col-lg-3">'+
	                                '<p class="text-sm">Tiempo de entrega:'+
	                                    '<b class="d-block">'+novDato(r.data[i].timeEntrega)+'</b>'+
	                                '</p>'+
	                            '</div>'+
	                            '<div class="col-lg-3">'+
	                                '<p class="text-sm">Tiempo de validez:'+
	                                    '<b class="d-block">'+novDato(r.data[i].timeValidez)+'</b>'+
	                                '</p>'+
	                            '</div>'+
	                            '<div class="col-lg-3">'+
	                                '<p class="text-sm">Se dedica:'+
	                                    '<b class="d-block">'+novDato(r.data[i].dedica=='1'?'SI':'NO')+'</b>'+
	                                '</p>'+
	                            '</div>'+
	                            '<div class="col-lg-3">'+
	                                '<p class="text-sm">Tiempo de garantia:'+
	                                    '<b class="d-block">'+novDato(r.data[i].timeGarantia)+'</b>'+
	                                '</p>'+
	                            '</div>'+
	                            '<div class="col-lg-12">'+
	                      		 	'<strong><i class="fas fa-file-pdf mr-1"></i> Archivos de postulacion</strong>'+
	                      		'</div>'+
	                      		'<div class="col-lg-12">'+
	                                '<p class="text-sm">Archivo: '+
	                                    enlace + 
	                                '</p>'+
	                            '</div>'+
	                            '<div class="col-lg-12">'+
	                      		 	'<strong><i class="fas fa-list mr-1"></i> Items</strong>'+
	                      		'</div>'+
	                      		'<div class="col-lg-12">'+
	                      			'<table class="table table-sm">'+
						                '<thead>'+
						                    '<tr>'+
						                      // '<th style="width: 10px">#</th>'+
						                      '<th class="align-middle">Nombre</th>'+
						                      '<th class="align-middle">U/M</th>'+
						                      '<th class="align-middle" style="width: 40px">Cant</th>'+
						                      '<th class="align-middle">Marca</th>'+
						                      '<th class="align-middle">Modelo</th>'+
						                      '<th class="align-middle">Precio</th>'+
						                      '<th class="align-middle">F.T</th>'+
						                    '</tr>'+
						                '</thead>'+
					                  	'<tbody>';
						idBan=r.data[i].idPro;
					}
                    // javascript:void(0)
                    var enlaceFile = r.data[i].arcDet===null?
                        '<i class="fa fa-cube"></i> '+novDato(r.data[i].nombre):
                        '<a target="_blank" href="'+'{{ route('detalle-archivo') }}/'+r.data[i].arcDet+'"><i class="fa fa-file-pdf"></i></a> '+novDato(r.data[i].nombre);
					var soloEnlaceFile = r.data[i].arcDet===null?
                        '<i class="fa fa-cube"></i>':
                        '<a target="_blank" href="'+'{{ route('detalle-archivo') }}/'+r.data[i].arcDet+'"><i class="fa fa-file-pdf"></i></a>';

					html += '<tr>'+
                      	// '<td>1.</td>'+
                      	// '<td><a target="_blank" href="{{ route('detalle-archivo') }}/'+r.data[i].arcDet+'"><i class="fa fa-file-pdf"></i></a> '+novDato(r.data[i].nombre)+'</td>'+
                        // '<td>'+enlaceFile+'</td>'+
                        '<td>'+novDato(r.data[i].nombre)+'</td>'+
                      	'<td>'+novDato(r.data[i].umn)+'</td>'+
                      	'<td>'+novDato(r.data[i].cantidad)+'</td>'+
                      	'<td>'+novDato(r.data[i].marca)+'</td>'+
                      	'<td>'+novDato(r.data[i].modelo)+'</td>'+
                      	'<td>'+novDato(r.data[i].precio)+'</td>'+
                      	'<td>'+soloEnlaceFile+'</td>'+
                    '</tr>';
                    if(r.data[i+1]===undefined)
                    {
                    	html +=			'</tbody>'+
                    					'<tfoot>'+
											'<tr>'+
												'<td colspan="5" class="text-right font-weight-bold">TOTAL:</td>'+
												'<td colspan="1" class="shadow bg-info text-center font-weight-bold">S/. '+r.data[i].total+'</td>'+
											'</tr>'+
										'</tfoot>'+
	                				'</table>'+
	                      		'</div>'+
	                      	'</div>'+
	                    '</div>';

	                    html += 	'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
	                    break;
                    }
                    if(r.data[i+1].idPro!=r.data[i].idPro)
                    {
                    	html +=			'</tbody>'+
                    					'<tfoot>'+
											'<tr>'+
												'<td colspan="5" class="text-right font-weight-bold">TOTAL:</td>'+
												'<td colspan="1" class="shadow bg-info text-center font-weight-bold">S/. '+r.data[i].total+'</td>'+
											'</tr>'+
										'</tfoot>'+
	                				'</table>'+
	                      		'</div>'+
	                      	'</div>'+
	                    '</div>';
	                    html += 	'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
	                    idBan=0;
                    }
                }
                $('.contentPost').append(html);
                // console.log('html');
                // console.log(html);
                // console.log('html');
            },
            error: function (xhr, status, error) {
                msjSimple('Algo salio mal, porfavor contactese con el Administrador.');
            }
        });
    }
    function loadCotizacion()
    {
  //   	cotizacion
		// items
		jQuery.ajax({
            url: "{{ url('cotizacion/show') }}",
            method: 'POST', 
            data: {id:localStorage.getItem("idCot")},
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
            	console.log(r);
                let cot = "<i class='fa fa-file-pdf'></i> COTIZACION<br>("+r.data.tipo+") <br>#"+r.data.numeroCotizacion;
                $('.cotizacion').html(novDato(cot));
                $('.items').html('Items: '+r.data.cantidad);

                $('.concepto').html(novDato(r.data.concepto));
                $('.descripcion').html(novDato(r.data.descripcion));
                $('.fechas').html('Fecha de cotizacion:<br>'+r.data.fechaCotizacion+'<br>Fecha de finalizacion:<br>'+r.data.fechaFinalizacion);

                var dir = $('.fileCotizacion').attr('href');
	            $('.fileCotizacion').attr('href',dir+'/'+r.data.archivo);
                
                $('.ovCot').css("display","none");
                
            },
            error: function (xhr, status, error) {
                alert('salio un error');
            }
        });
    }
    function statePostulacion(estado)
	{
		// novDato(r.data[i].estadoCrp==0?'Postulando':'Enviado')
	    let badgeEstado='';
	    if(estado == '0') badgeEstado='<span class="shadow badge badge-warning">Postulando</span>';
	    if(estado == '1') badgeEstado='<span class="shadow badge badge-success">Enviado</span>';
	    return badgeEstado
	}
</script>

@endsection