<div class="modal fade mEditar" id="mEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-chart-bar"></i> Editar Cotizacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="efvcotizacion">
                <input type="hidden" id="idCot">
            	<div class="row">
                    <div class="alert col-lg-12 py-0">
                        <h4 class="card-title m-0 font-weight-bold float-right">Fecha de la Cotizacion: <span class="badge badge-warning fechaCotizacionFormato" style="font-size: 1.2rem;">-</span></h4>
                    </div>
                    <div class="form-group col-lg-3">
                        <label class="m-0">Numero de Cotizacion: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
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
                            <select name="tipo" id="tipo" class="form-control">
                                <option disabled>Seleccione opcion</option>
                                <option value="Bienes" selected>Bienes</option>
                                <option value="Servicios" selected>Servicios</option>
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
                                <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraCotizacion" id="horaCotizacion" name="horaCotizacion"/>
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
                                <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ifechaFinalizacion" id="fechaFinalizacion" name="fechaFinalizacion">
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
                                <input type="text" class="form-control datetimepicker-input inputDate" data-target="#ihoraFinalizacion" id="horaFinalizacion" name="horaFinalizacion">
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
                        <label class="m-0">Descripcion: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="3" class="form-control input"></textarea>
                        </div>
                    </div> -->
                    <div class="col-lg-12 alert alert-info">
                        <p class="m-0 font-weight-bold">Si ingresa nuevo archivo, el archivo anterior se reemplazara.</p>
                        <ul class="m-0">
                            <li>Archivo de cotizacion <span class="showDeepFileEditar text-danger p-1" style="cursor: pointer;"><i class="fa fa-file-pdf fa-2x"></i></span></li>
                            <li class="contentAnexoFile">Anexo de cotizacion <span class="showDeepFileAnexoEditar text-danger p-1" style="cursor: pointer;"><i class="fa fa-file fa-2x"></i></span></li>
                        </ul>
                    </div>
                    <!-- <div class="form-group col-lg-6">
                        <label class="m-0">Archivo: 
                            <span class="fa fa-file-pdf showDeepFileEditar text-primary" style="cursor: pointer;"></span>
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-file"></i></span>
                            </div>
                            <input type="file" class="form-control input" id="file" name="file">
                        </div>
                    </div> -->
                    <div class="col-lg-6 mb-3">
                        <div class="alert text-center boxFile h-100 d-flex flex-column justify-content-center" style="border: 4px dashed #000;background: #ebeff5;">
                            <h5 class="font-italic font-weight-bold m-auto nameFile">ARCHIVO DE COTIZACION</h5>
                            <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                            <p class="m-auto"><i class="fa fa-upload fa-2x"></i></p>
                        </div>
                        <input type="file" id="file" name="file" class="pdfFile pdfFileCot" style="display: none;" data-name="ARCHIVO DE COTIZACION">
                    </div>
                    <div class="col-lg-6 mb-3">
                        <div class="alert text-center boxFile h-100 d-flex flex-column justify-content-center" style="border: 4px dashed #000;background: #ebeff5;">
                            <h5 class="font-italic font-weight-bold m-auto nameFile">ANEXOS DE LA COTIZACION</h5>
                            <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                            <p class="m-auto"><i class="fa fa-upload fa-2x"></i></p>
                        </div>
                        <input type="file" id="fileAnexo" name="fileAnexo" class="pdfFile pdfFileAne" style="display: none;" data-name="ANEXOS DE LA COTIZACION">
                    </div>
                    <!-- <div class="form-group col-lg-4 m-auto">
                        <label class="m-0">Documento: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="documento" name="documento">
                        </div>
                    </div> -->
                    <div class="form-group col-lg-4  m-auto">
                            <label class="m-0">NUMERO DE CCMN: <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control soloNumeros" id="documento" name="documento" maxlength="6">
                                <div class="input-group-append">
                                    <span class="btn btn-outline-success searchItemsSiga"><i class="fa fa-search"></i> Buscar</span>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-12 my-2"></div>
                    <div class="col-lg-9 m-auto p-3 shadow contenedorRegistrosEditarxxx">
                        <table id="registrosItemsEditarxxx" class="w-100 table table-hover table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th width="35%">Nombre</th>
                                    <th width="15%">U.Medida</th>
                                    <th width="20%">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody id="listItemsEditarxxx">
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="form-group col-lg-6">
                        <label class="m-0">Estado: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-file"></i></span>
                            </div>
                            <select name="estadoCotizacion" id="estadoCotizacion" class="form-control">
                                <option disabled>Seleccione opcion</option>
                                <option value="1" selected>Activa</option>
                                <option value="2">Finalizada</option>
                                <option value="3">Borrador</option>
                            </select>
                        </div>
                    </div> -->
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                <button type="button" class="btn btn-success float-right guardarCambios ml-2"><i class="fa fa-save"></i> Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
<script>
var tablaDeRegistrosEditar;
var ccmnItems;
    $(document).ready( function () {
        tablaDeRegistrosEditar=$('.contenedorRegistrosEditarxxx').html();
        // $('#ifechaCotizacion').datetimepicker({format: 'YYYY-MM-DD'});
        $('#ifechaFinalizacion').datetimepicker({format: 'YYYY-MM-DD'});
        // $('#ihoraCotizacion').datetimepicker({format: 'LT'});
        $('#ihoraFinalizacion').datetimepicker({format: 'LT'});
        initFv('efvcotizacion',rules());
        $('#mEditar').on('hidden.bs.modal', function (e) {
            console.log('El modal se ha cerrado.');
            construirTablaEditar()
        });
    });
    $('.guardarCambios').on('click',function(){guardarCambios();});
    $('.inputDate').on('click',function(){$(this).parent().find('.input-group-prepend').click();});
    $('.showDeepFileEditar').on('click',function(){
        showFile(idM);
    })
    $('.showDeepFileAnexoEditar').on('click',function(){
        showAnexos(idM);
    });
    $('.searchItemsSiga').on('click',function(){
        searchItemsSiga();
    });
    function construirTablaEditar()
    {
        $('.contenedorRegistrosEditarxxx>div').remove();
        $('.contenedorRegistrosEditarxxx').html(tablaDeRegistrosEditar);
    }
    // reglas del formulario efvcotizacion, formulario q usamos para editar los datos de la cotizaion
    function rules()
    {
        return {
            numeroCotizacion: {required: true,},
            tipo: {required: true,},
            // unidadEjecutora: {required: true,},
            documento: {required: true,},
            // fechaCotizacion: {required: true,},
            fechaFinalizacion: {required: true,},
            concepto: {required: true,},
        };
    }
    // esta funcion abrira el modal y llenara los datos del registro
    function loadCotizacion(id)
    {
        jQuery.ajax({
            url: "{{ url('cotizacion/verCotizacion') }}",
            // url: "{{ url('cotizacion/show') }}",
            method: 'POST', 
            data: {id:id},
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {

                cleanFiles();
                // console.log(r);
                idM = r.data.idCot;
                $('#idCot').val(r.data.idCot);
                $('#numeroCotizacion').val(r.data.numeroCotizacion);
                $('#tipo').val(r.data.tipo);
                $('#documento').val(r.data.documento);
                // ---------------
                var fechaCotizacion = new Date(r.data.fechaCotizacion);
                    fechaFormat = `${fechaCotizacion.getDate()} de ${obtenerNombreMes(fechaCotizacion.getMonth() + 1)} del ${fechaCotizacion.getFullYear()} | ${r.data.horaCotizacion}`;
                $('.fechaCotizacionFormato').html(fechaFormat);
                // $('#fechaCotizacion').val(r.data.fechaCotizacion);
                // $('#horaCotizacion').val(r.data.horaCotizacion);
                
                $('#fechaFinalizacion').val(r.data.fechaFinalizacion);
                $('#horaFinalizacion').val(r.data.horaFinalizacion);
                $('#concepto').val(r.data.concepto);
                // console.log('----'+r.data.anexoPdf);
                $('.contentAnexoFile').css('display',r.data.anexoPdf===null?'none':'block');
                // $('#descripcion').val(r.data.descripcion);
                $('#file').val(r.data.file);
                // $('#estadoCotizacion').val(r.data.estadoCotizacion);
                // $('.fileCotizacion').attr('href');
                let direccion = $('.fileCotizacion').attr('href');
                let path = "{{ route('ver-archivo') }}";
                $('.fileCotizacion').attr('href',path+'/'+r.data.archivo);
                // $('.fileCotizacion').attr('href',direccion+'/'+r.data.archivo);
                $('.overlayRegistros').css("display","none");
                // construirTablaEditar();
                ccmnItems=r.data.documento;
                showItems(r.data.idCot);
                $('#mEditar').modal('show');
            },
            error: function (xhr, status, error) {
                msgRee('Algo salio mal, porfavor contactese con el Administrador');
            }
        });
    }
    function showItems(idM)
    {
        jQuery.ajax({
            url: "{{ url('itemSiga/showItems') }}",
            method: 'post', 
            data: {idCot:idM},
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
                console.log(r);
                if (r.estado)
                {
                    // initDatatable('registrosItemsEditarxxx');
                    // if($('.contenedorRegistrosEditarxxx > div').length > 0)
                    // construirTablaEditar();
                    var html = '';
                    for (var i = 0; i < r.data.length; i++) 
                    {
                        html += '<tr>' +
                            '<td class="font-weight-bold nombreItem">' + novDato(r.data[i].nombre) + '</td>' +
                            '<td class="text-center font-weight-bold umItem">' + novDato(r.data[i].um) + '</td>' +
                            '<td class="text-center font-weight-bold cantItem">' + novDato(r.data[i].cantidad) + '</td>'+
                        '</tr>';
                    }
                    console.log(html)
                    $('#listItemsEditarxxx').html(html);

                    initDatatable('registrosItemsEditarxxx');
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
    function searchItemsSiga()
    {
        jQuery.ajax({
            url: "{{ url('itemSiga/search') }}",
            method: 'post', 
            data: {documento:$('#documento').val()},
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
                console.log(r.data);
                // construirTablaEditar()
                ccmnItems=r.data[0].pedido;
                if (r.estado)
                {
                    construirTablaEditar();
                    var html = '';
                    $('#listItemsEditarxxx').html('');
                    for (var i = 0; i < r.data.length; i++) 
                    {
                        html += '<tr>' +
                            '<td class="font-weight-bold nombreItem">' + novDato(r.data[i].nombre) + '</td>' +
                            '<td class="text-center font-weight-bold umItem">' + novDato(r.data[i].um) + '</td>' +
                            '<td class="text-center font-weight-bold cantItem">' + novDato(r.data[i].cantidad) + '</td>'+
                        '</tr>';
                    }
                    $('#listItemsEditarxxx').html(html);
                    initDatatable('registrosItemsEditarxxx');
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
    function guardarCambios()
    {
        let nombreItem = [];
        let umItem = [];
        let cantItem = [];
        var miObjeto = {};
        // se verifica la validacion del formulario efvcotizacion acorde a las reglas
        if($('#documento').val()!=ccmnItems)
        {msjSimple(false,"El <b>CCMN: "+$('#documento').val()+"</b> ingresado  no coincide con el <b>CCMN: "+ccmnItems+"</b> de los items.");return;}
        if($('#efvcotizacion').valid()==false)
        {return;}
        if($(".nombreItem").length==0)
        {msjSimple(false,"No se cargo los items de la COTIZACION.");return;}
        $(".nombreItem").each(function(){
            nombreItem.push($(this).html())
            umItem.push($(this).parent().find('.umItem').html())
            cantItem.push($(this).parent().find('.cantItem').html())
        });
        for (var i = 0; i < $(".nombreItem").length; i++) 
        {
            miObjeto[i] = {
                nombreItem: nombreItem[i],
                umItem: umItem[i],
                cantItem: cantItem[i],
            };
        }
        
        var formData = new FormData($("#efvcotizacion")[0]);
        formData.append('items',JSON.stringify(miObjeto));
        // adjuntamos el id de la cotizacion para poder editarlo
        formData.append('id', $('#idCot').val()); 
        $('.guardarCambios').prop('disabled',true); 
        jQuery.ajax({
            url: "{{ url('cotizacion/guardarCambios') }}",
            method: 'POST', 
            data: formData,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {
                if (r.estado) 
                {
                    // construirTablaEditar();
                    fillRegistros();
                    msjRee(r);
                    $('#mEditar').modal('hide');
                } 
                else 
                {
                    $('.overlayRegistros').css("display","none");
                    msjRee(r);
                }
                $('.guardarCambios').prop('disabled',false);
            },
            error: function (xhr, status, error) {
                alert('salio un error');
            }
        });
    }
    function cleanFiles()
    {
        $('.pdfFileCot').parent().find('.nameFile').html($('.pdfFileCot').attr('data-name'));
        $('.pdfFileAne').parent().find('.nameFile').html($('.pdfFileAne').attr('data-name'));
        $('.pdfFile').parent().find('.msgClick').css('displa','block');
        $('.pdfFile').parent().find('i').removeClass('fa fa-file-pdf fa-lg');
        $('.pdfFile').parent().find('i').addClass('fa fa-upload fa-lg');
        $('.pdfFile').parent().find('.boxFile').css('border','4px dashed #000');
        $('#file').val('');
        $('#fileAnexo').val('');
    }
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
            // $(this).parent().find('.msgClick').css('displa','none');
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