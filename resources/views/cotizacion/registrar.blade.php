@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones</h1></div>
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
@if($numero==0)
<script>
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        Swal.fire({
            title: "NUMERO DE COTIZACION",
            text: "ES NECESARIO QUE CONFIGURE EL NUMERO DE COTIZACION.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
            allowOutsideClick: false, 
            allowEscapeKey: false, 
            showCancelButton: false,
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{url('numero')}}";
            }
        });
    });
</script>
@else
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa fa-chart-bar"></i> Registrar Cotizacion</h3>
                    <h3 class="card-title m-0 font-weight-bold float-right"><span class="badge badge-warning fechaActualCotizacion" style="font-size: 1.2rem;">5 de Marzo de 2024</span></h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
                    <form id="fvcotizacion">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="alert alert-primary text-center py-1 font-weight-bold">GOBIERNO REGIONAL DE APURIMAC - SEDE CENTRAL</h3>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0">Numero de Cotizacion: <span class="text-danger">*</span> <i class="fa fa-info-circle text-info"></i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control soloNumeros input" id="numeroCotizacion" name="numeroCotizacion" disabled>
                            </div>
                        </div>
                        <div class="form-group col-lg-3">
                            <label class="m-0">Tipo de Cotizacion: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <!-- <input type="text" class="form-control" id="tipo" name="tipo"> -->
                                <select name="tipo" id="tipo" class="form-control">
                                    <option disabled>Seleccione opcion</option>
                                    <option value="Bienes" selected>Bienes</option>
                                    <option value="Servicios">Servicios</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group col-lg-3">
                            <label class="m-0">Unidad Ejecutora: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="text" class="form-control" id="unidadEjecutora" name="unidadEjecutora" value="GOBIERNO REGIONAL DE APURIMAC - SEDE CENTRAL" disabled>
                            </div>
                        </div> -->
                        
                        <!-- <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Fecha de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ifechaCotizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ifechaCotizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ifechaCotizacion" id="fechaCotizacion" name="fechaCotizacion">
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Hora de la Cotizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ihoraCotizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ihoraCotizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraCotizacion" id="horaCotizacion" name="horaCotizacion" autocomplete="off"/>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Fecha de la finalizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ifechaFinalizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ifechaFinalizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ifechaFinalizacion" id="fechaFinalizacion" name="fechaFinalizacion" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="m-0">Hora de la finalizacion: <span class="text-danger">*</span></label>
                                <div class="input-group date" id="ihoraFinalizacion" data-target-input="nearest">
                                    <div class="input-group-prepend" data-target="#ihoraFinalizacion" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-clock"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraFinalizacion" id="horaFinalizacion" name="horaFinalizacion" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="m-0">Concepto: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <textarea name="concepto" id="concepto" cols="30" rows="3" class="form-control input text-uppercase"></textarea>
                            </div>
                        </div>

                        <!-- <div class="form-group col-lg-6">
                            <label class="m-0">Descripcion:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control input"></textarea>
                            </div>
                        </div> -->
                        <!-- <div class="form-group col-lg-12">
                            <label class="m-0">Archivo: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-file"></i></span>
                                </div>
                                <input type="file" class="form-control input testFile" id="file" name="file">
                            </div>
                        </div> -->
                        <!-- <div class="form-group col-lg-6">
                            <label class="m-0">Estado: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-file"></i></span>
                                </div>
                                <select name="estadoCotizacion" id="estadoCotizacion" class="form-control" disabled>
                                    <option disabled>Seleccione opcion</option>
                                    <option value="1" selected>En proceso</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-lg-6 mb-3">
                            <div class="alert text-center boxFile h-100 d-flex flex-column justify-content-center" style="border: 4px dashed #000;background: #ebeff5;">
                                <h5 class="font-italic font-weight-bold m-auto nameFile">ARCHIVO DE COTIZACION</h5>
                                <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                <p class="m-auto"><i class="fa fa-upload fa-2x"></i></p>
                            </div>
                            <input type="file" id="fileCotizacion" name="fileCotizacion" class="pdfFile" style="display: none;" data-name="ARCHIVO DE COTIZACION">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="alert text-center boxFile h-100 d-flex flex-column justify-content-center" style="border: 4px dashed #000;background: #ebeff5;">
                                <h5 class="font-italic font-weight-bold m-auto nameFile">ANEXOS DE LA COTIZACION</h5>
                                <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                <p class="m-auto"><i class="fa fa-upload fa-2x"></i></p>
                            </div>
                            <input type="file" id="fileAnexo" name="fileAnexo" class="pdfFile" style="display: none;" data-name="ANEXOS DE LA COTIZACION">
                        </div>
                        <div class="form-group col-lg-4" style="margin: 0px auto;">
                            <label class="m-0">META:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>
                                </div>
                                <input type="text" class="form-control" id="meta" name="meta" disabled>
                            </div>
                        </div>
                        <div class="form-group col-lg-4 m-auto">
                            <label class="m-0">NUMERO DE CCMN: <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control soloNumeros" id="documento" name="documento" maxlength="6">
                                <div class="input-group-append">
                                    <span class="btn btn-outline-success searchItemsSiga"><i class="fa fa-search"></i> Buscar</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12"></div>
                        <div class="col-lg-9 m-auto p-3 shadow contenedorRegistros">
                            <table id="registrosItems" class="w-100 table table-hover table-striped table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="65%" class="text-center">Nombre</th>
                                        <th width="20%" class="text-center">U.Medida</th>
                                        <th width="15%" class="text-center">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody id="listItems">
                                </tbody>
                            </table>
                        </div>
                    </div> 
                    </form>
                </div>
                <div class="card-footer py-1 border-transparent">
                    <button type="button" class="btn btn-success float-right guardar ml-2"><i class="fa fa-save"></i> Guardar Cotizacion</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
localStorage.setItem("sbd",1);
localStorage.setItem("sba",4);
var tablaDeRegistros;
var ccmnItems;
var itemsCcmn = {};
$(document).ready( function () {
    tablaDeRegistros=$('.contenedorRegistros').html();
    $.validator.addMethod("extensionPdf", function(value, element) {
        return this.optional(element) || value.toLowerCase().endsWith(".pdf");
    }, "Solo se permiten archivos PDF");
    loadPage();
    loadNumeroCotizacion();

    // loadFileBase64();


    // se inicializa el formulario con el jquery validate
    // conjuntamente con sus reglas de validacion
    initFv('fvcotizacion',rules());
    $('.overlayPagina').css("display","none");
    $('.overlayRegistros').css("display","none");
    // se inicializa la inicializacion de las fecha y hora con las validadciones
    // $('#ifechaCotizacion').datetimepicker({format: 'YYYY-MM-DD',minDate: moment(),daysOfWeekDisabled: [0, 6], });
    $('#ifechaFinalizacion').datetimepicker({format: 'YYYY-MM-DD',minDate: moment()});
    $('#ihoraCotizacion').datetimepicker({format: 'LT'});
    $('#ihoraFinalizacion').datetimepicker({format: 'LT'});
});
$('.searchItemsSiga').on('click',function(){
    searchItemsSiga();
})
function construirTabla()
{
    $('.contenedorRegistros>div').remove();
    $('.contenedorRegistros').html(tablaDeRegistros);
}
function searchItemsSiga()
{
    jQuery.ajax({
        url: "{{ url('itemSiga/search') }}",
        method: 'post', 
        data: {documento:$('#documento').val()},
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            construirTabla();
            itemsCcmn = {};
            // console.log('r.data.length');
            // console.log(r.data.length);
            
            if (r.estado)
            {
                if(r.data.length==0)
                {
                    msgRee({estado:false,message:'No se encontro items asociados al numero CCMN ingresado: '+$('#documento').val()});
                    return;
                }
                ccmnItems=r.data[0].pedido;
                $('#meta').val(r.data[0].meta);
                console.log(r.data.length);
                var html = '';

                for (var i = 0; i < r.data.length; i++) 
                {
                    itemsCcmn[i] = {
                        nombreItem: r.data[i].nombre,
                        umItem: r.data[i].um,
                        cantItem: r.data[i].cantidad,
                    };
                    html += '<tr>' +
                        '<td class="font-weight-bold nombreItem">' + novDato(r.data[i].nombre) + '</td>' +
                        '<td class="text-center font-weight-bold umItem">' + novDato(r.data[i].um) + '</td>' +
                        '<td class="text-center font-weight-bold cantItem">' + novDato(r.data[i].cantidad) + '</td>'+
                    '</tr>';
                }
                $('#listItems').html(html);
                initDatatable('registrosItems');
            }
            else
            {
                msjError("Algo salio mal, porfavor contactese con el Administrador.");
            }
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
function loadNumeroCotizacion()
{
    jQuery.ajax({
        url: "{{ url('numero/numeroCotizacion') }}",
        method: 'get', 
        success: function (r) {
            // console.log(r);
            $('#numeroCotizacion').val(r);
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
function loadFileBase64()
{
    jQuery.ajax({
        url: "{{ url('cotizacion/readBase64') }}",
        method: 'get', 
        dataType: 'json',
        processData: false, 
        contentType: false, 
        success: function (r) {
            console.log(r);
            abrirArchivoBase64EnNuevaPestana(r.base64,"application/pdf");
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
function abrirArchivoBase64EnNuevaPestana(base64String,tipoMIME) {
    // Convertir la cadena Base64 en un Blob
    var byteCharacters = atob(base64String);
    var byteNumbers = new Array(byteCharacters.length);
    for (var i = 0; i < byteCharacters.length; i++) {
        byteNumbers[i] = byteCharacters.charCodeAt(i);
    }
    var byteArray = new Uint8Array(byteNumbers);
    var blob = new Blob([byteArray], { type: tipoMIME });
    
    // Crear una URL de objeto (Object URL) para el Blob
    var url = URL.createObjectURL(blob);
    
    // Abrir la URL en una nueva pestaña
    window.open(url, '_blank');
}

// Ejemplo de uso:
// var base64String = "/* Tu cadena Base64 aquí */";
// var tipoMIME = "application/pdf"; // Tipo MIME del archivo, por ejemplo: "application/pdf" para un PDF
// abrirArchivoBase64EnNuevaPestana(base64String, tipoMIME);

// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
$('.inputDate').on('click',function(){$(this).parent().find('.input-group-prepend').click();});
$('.guardar').on('click',function(){guardar();});
// esta funcion ingresa por defecto llena la fecha de cotizacion con la fecha actual
function loadPage()
{
    // var fechaActual = new Date();
    // var fecha = fechaActual.toISOString().split('T')[0];
    // $('#fechaCotizacion').val(fecha);

    var fecha = new Date();
    fechaFormat = `${fecha.getDate()} de ${obtenerNombreMes(fecha.getMonth() + 1)} del ${fecha.getFullYear()}`;

    // fechaFormat = `${fecha.getDate()} de ${obtenerNombreMes(fecha.getMonth() + 1)} de ${fecha.getFullYear()} ${obtenerFormato12Horas(fecha.getHours())}:${agregarCeroInicial(fecha.getMinutes())}:${agregarCeroInicial(fecha.getSeconds())} ${obtenerAMPM(fecha.getHours())}`;
    
    $('.fechaActualCotizacion').html(fechaFormat);
}
function rules()
{
    return {
        numeroCotizacion: {required: true,},
        tipo: {required: true,},
        unidadEjecutora: {required: true,},
        documento: {required: true,},
        // fechaCotizacion: {required: true,},
        // horaCotizacion: {required: true,},
        fechaFinalizacion: {required: true,},
        horaFinalizacion: {required: true,},
        concepto: {required: true,},
        // file: {required: true,extensionPdf: "pdf"},
        estado: {required: true,},

    };
}
// esta funcion se ejecuta cuando realizamos click en el boton de guardar
function guardar()
{
    // let nombreItem = [];
    // let umItem = [];
    // let cantItem = [];
    // var miObjeto = {};
    // validamos el formulario deacuerdo a las reglas de validaion q anteiormente declaramos
    if($('#documento').val()!=ccmnItems)
    {msjSimple(false,"El <b>CCMN: "+$('#documento').val()+"</b> ingresado  no coincide con el <b>CCMN: "+ccmnItems+"</b> de los items.");return;}
    if($('#fvcotizacion').valid()==false)
    {return;}
    if($('#fileCotizacion')[0].files.length==0)
    {msjSimple(false,"No se subio el documento de la COTIZACION.");return;}
console.log(itemsCcmn.length);
    if(Object.keys(itemsCcmn).length==0)
    {msjSimple(false,"No se cargo los items de la COTIZACION.");return;}
    
    // $(".nombreItem").each(function(){
    //     nombreItem.push($(this).html())
    //     umItem.push($(this).parent().find('.umItem').html())
    //     cantItem.push($(this).parent().find('.cantItem').html())
    // });
    // for (var i = 0; i < $(".nombreItem").length; i++) 
    // {
    //     miObjeto[i] = {
    //         nombreItem: nombreItem[i],
    //         umItem: umItem[i],
    //         cantItem: cantItem[i],
    //     };
    // }
    
    // capturamos los datos del formulario para enviarlo en ajax
    var formData = new FormData($("#fvcotizacion")[0]);
    formData.append('items',JSON.stringify(itemsCcmn));
    formData.append('meta',$('#meta').val());
    
    $('.guardar').prop('disabled',true); 
    $('.overlayRegistros').css("display","flex");


    jQuery.ajax({
        url: "{{ url('cotizacion/guardar') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            // una vez guardado el registro nos mostrara un mensaje para enviarnos a la lista de cotizaiones
            if (r.estado) 
                redirectUrlMsj("{{url('cotizacion/ver')}}",r.message);
            else 
            {
                $('.overlayRegistros').css("display","none");
                msjRee(r); 
            }
            $('.guardar').prop('disabled',false);
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
function limpiarForm()
{   $('.input').val('');}
</script>
<script>
function convertirAPDFBase64(archivo) 
{
    return new Promise((resolve, reject) => 
    {
        var reader = new FileReader();
        
        // Escuchar el evento 'load' para leer el contenido del archivo
        reader.onload = function(event) 
        {
            // Obtener el contenido del archivo como una cadena Base64
            var base64String = event.target.result;
            
            // Resolver la promesa con la cadena Base64
            resolve(base64String);
        };
        
        // Escuchar el evento 'error' en caso de que ocurra un error durante la lectura del archivo
        reader.onerror = function(event)
        {
            reject(event.target.error);
        };
        
        // Leer el contenido del archivo como una URL de datos (Data URL)
        reader.readAsDataURL(archivo);
    });
}

// Uso del método convertirAPDFBase64
// var input = document.getElementById('inputFile'); // Asumiendo que tienes un input de tipo 'file' en tu HTML
// var archivoPDF = input.files[0];


$('.testFile').on('change',function(){
    convertirAPDFBase64(document.getElementById('file').files[0])
        .then(function(base64String) {
            console.log('Archivo PDF convertido a Base64:', base64String);
            // Aquí puedes enviar la cadena Base64 al servidor o hacer cualquier otra cosa que necesites con ella
        })
        .catch(function(error) {
            console.error('Error al convertir el archivo PDF a Base64:', error);
        });
})
// convertirAPDFBase64(archivoPDF)
//     .then(function(base64String) {
//         console.log('Archivo PDF convertido a Base64:', base64String);
//         // Aquí puedes enviar la cadena Base64 al servidor o hacer cualquier otra cosa que necesites con ella
//     })
//     .catch(function(error) {
//         console.error('Error al convertir el archivo PDF a Base64:', error);
//     });

</script>
<script>
$('.boxFile').on('click',function(){
    $(this).parent().find('input.pdfFile').click();
});
$('.pdfFile').on('change',function(){
    let nameFile = $(this).val().split('\\').pop();
    if (/\.(pdf)$/i.test(nameFile))
    {
        $(this).parent().find('.nameFile').html($(this).attr('data-name')+': '+nameFile);
        $(this).parent().find('.msgClick').remove();
        $(this).parent().find('i').removeClass('fa fa-upload fa-lg');
        $(this).parent().find('i').addClass('fa fa-file-pdf fa-lg');
        $(this).parent().find('.boxFile').css('border','4px solid #000');
    }
    else
    {
        $(this).val('');
        alert('Selecciona un archivo PDF válido.');
    }
});
</script>
@endif
@endsection