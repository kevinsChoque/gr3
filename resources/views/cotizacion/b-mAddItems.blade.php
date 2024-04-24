<div class="modal fade" id="mAddItems" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-chart-bar"></i> Agregar items de cotizacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 my-2">
                        <h4 class="text-center">Datos de cotizacion</h4>
                    </div>
                    <div class="col-lg-3">
                        <p class="text-sm">Numero de cotizacion:
                            <b class="d-block numeroCotizacion">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Tipo de cotizacion:
                            <b class="d-block tipo">-</b>
                        </p>
                    </div>
                    <div class="col-lg-3">
                        <p class="text-sm">Unidad ejecutora:
                            <b class="d-block unidadEjecutora">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Documento:
                            <b class="d-block documento">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Fecha de la cotizacion:
                            <b class="d-block fechaCotizacion">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Fecha de la finalizacion:
                            <b class="d-block fechaFinalizacion">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Archivo:
                            <!-- <a href="{{ route('ver-archivo') }}" class="d-block fileCotizacion font-weight-bold" target="_blank">-</a> -->
                            <button class="showDeepFileAddItem d-block font-weight-bold text-primary" style="border: 0;"><i class="fa fa-file-pdf fa-lg"></i></button>
                        </p>
                    </div> 
                    <div class="col-lg-3">
                        <p class="text-sm">Estado:
                            <b class="d-block"><span class="badge badge-light estadoCotizacion" style="font-size: 1rem;"></span></b>
                        </p>
                    </div> 
                    <div class="col-lg-6">
                        <p class="text-sm">Concepto:
                            <b class="d-block concepto">-</b>
                        </p>
                    </div> 
                    <div class="col-lg-6">
                        <p class="text-sm">Descripcion:
                            <b class="d-block descripcion">-</b>
                        </p>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="m-0">Items: <a href="#" class="control-label font-weight-bold text-info" data-toggle="modal" data-target="#mItems"> [ + Nuevo]</a></label>
                            <select name="items" id="items" class="form-control select2" style="width: 100%;">
                                <option disabled selected>Agregar items (Nombre)</option>
                            </select>
                        </div>
                    </div>  
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="m-0" style="visibility: hidden;">-</label>
                            <button class="btn btn-info form-control form-control-sm addItem"><i class="fa fa-plus"></i> Agregar item</button>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="w-100 table table-hover table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th width="35%">Nombre</th>
                                    <th width="10%">Clasificador</th>
                                    <th width="15%">Descripcion</th>
                                    <th width="15%">U.Medida</th>
                                    <th width="20%">Cantidad</th>
                                    <th width="5%">Opc.</th>
                                </tr>
                            </thead>
                            <tbody id="listItemsMai">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                <button type="button" class="btn btn-success float-right changeEstadoCotMai ml-2"><i class="fa fa-save"></i> Publicar Cotizacion</button>
            </div>
        </div>
    </div>
</div>
@include('cotizacion.item.mItems')
@include('cotizacion.unidadMedida.mUnidadMedida')
<script>
var idRow='';
var idItem='';
var numero = '';
var idCot = '';
$(document).ready( function () {
    fillItems();
});
$('.addItem').on('click',function(){
    addItem();
});
$('.changeEstadoCotMai').on('click',function(){
    changeEstadoCotMai();
});
$('.showDeepFileAddItem').on('click',function(){
    showFile(idM);
})
function changeEstadoCotMai()
{
    // confirmamos el cambo de estado de EN PROCESO A PUBLICADO
    let numeroCotizacion = '<strong>'+numero+'</strong>';
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
            jQuery.ajax(
            { 
                url: "{{url('cotizacion/changeEstadoCotizacion')}}",
                data: {id:idCot},
                method: 'post',
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                success: function(r){
                    // en caso se guardo se actualiza la table, 
                    // caso contrario solo nos muestra el mensaje de error
                    if(r.estado)
                    {
                        construirTabla();
                        fillRegistros();
                        $('#mAddItems').modal('hide');
                    }
                    else
                        msgRee(r);
                }
            });
        }
    });
}
function seleccionarUm(idFila,idItm)
{
    idRow = idFila;
    idItem = idItm;
    $('#mUnidadMedida').modal('show');
}
// esta funcion selecciona el item q ingresamos y selecciona por defecto en la lista de select2
function procedure(r)
{
    var data = {
        id: r.item.idItm,
        text: r.item.clasificador+': '+r.item.nombre+' | ' + r.item.descripcion,
    };
    // creamos la opcion segun la libreria de select2 y agregamos dentro de la lista
    var newOptionReg = new Option(data.text, data.id, true, true);
    $('#items').prepend(newOptionReg).trigger('change');
}
// una vez agregado el item con el select2 crea una fila en la tabla de items
// esto lo realiza despues q lo guarde con ajax
function addItem()
{
    if($('#items').val()==null)
    {
        msjSimple(false,'Seleccione un item');
        return;
    }
    $('.addItem').prop('disabled',true); 
    $('.overlayPagina').css("display","flex");
    jQuery.ajax({
        url: "{{ url('cotxitm/guardar') }}",
        method: 'POST', 
        data: {idCot:idCot,idItm:$('#items').val(),},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            if (r.estado) {
                let idFila = idCot+r.item.idItm;
                let html='';
                html += '<tr class="fila'+idFila+'">' +
                        '<td class="font-weight-bold">' + novDato(r.item.nombre) +'</td>' +
                        '<td class="text-center">' + novDato(r.item.clasificador) + '</td>' +
                        '<td class="text-center">' + novDato(r.item.descripcion) + '</td>' +
                        '<td class="text-center"><span class="font-weight-bold badge badge-light shadow um'+idFila+'">'+ novDato(r.item.cantidad) +'</span> <button class="btn text-success" onclick="seleccionarUm(\''+idFila+'\','+r.item.idItm+')"><i class="fa fa-edit"></i></button></td>' +
                        '<td class="text-center">' + 
                            '<div class="input-group">' +
                                '<div class="input-group-prepend">' +
                                    '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>' +
                                '</div>' + 
                                '<input type="text" class="form-control" onblur="changeCant(this,'+r.item.idItm+');">' +
                            '</div>' +
                        '</td>' +
                        '<td class="text-center">' + 
                            '<button type="button" class="btn text-danger" onclick="deleteItem('+r.item.idItm+');"><i class="fa fa-trash"></i></button>'+
                        '</td>'+
                    '</tr>';
                $('#listItemsMai').append(html);
                msjRee(r);
            } 
            else 
                msjRee(r);
            $('.addItem').prop('disabled',false);
            $('.overlayPagina').css("display","none");
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
            $('.overlayPagina').css("display","none");
        }
    });
}
function loadCotizacionMai(id)
{
    // alert('loadCotizacionMai -'+id);
    // llena los datos en el modal, datos que son de la cotizacion
    jQuery.ajax({
        url: "{{ url('cotizacion/verCotizacion') }}",
        method: 'POST', 
        data: {id:id},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            console.log(r)
            idM = r.data.idCot;
            var estadoCot = r.data.estadoCotizacion=='1'?'Activo':
                r.data.estadoCotizacion=='2'?'Finalizado':'Borrador';
            let estateCotizacion = estadoCotizacion(r.data.estadoCotizacion);
            
            $('.numeroCotizacion').html(r.data.numeroCotizacion);
            $('.tipo').html(r.data.tipo);
            $('.unidadEjecutora').html(novDato(r.data.unidadEjecutora));
            $('.documento').html(r.data.documento);
            $('.fechaCotizacion').html(r.data.fechaCotizacion);
            $('.fechaFinalizacion').html(r.data.fechaFinalizacion);
            $('.concepto').html(r.data.concepto);
            $('.descripcion').html(novDato(r.data.descripcion));
            $('.archivo').html(r.data.archivo);
            $('.estadoCotizacion').html(estateCotizacion);
            var dir = $('.fileCotizacion').attr('href');
            let path = "{{ route('ver-archivo') }}";
            $('.fileCotizacion').html('<i class="fa fa-file-pdf fa-lg"></i>');
            $('.fileCotizacion').attr('href',path+'/'+r.data.archivo);
            $('.overlayRegistros').css("display","none");
            numero = r.data.numeroCotizacion;
        },
        error: function (xhr, status, error) {
            msjError('Algo salio mal, porfavor contactese con el Administrador');
        }
    });
}
// esta funcion llena la tabla de items en caso la cotizacion fuera llenada de items anteriormente
function loadItemsCotizacion(id)
{
    jQuery.ajax({
        url: "{{ url('cotxitm/loadSegunCotizacion') }}",
        method: 'POST', 
        data: {idCot:id},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            let idFila = '';
            var html = '';
            for (var i = 0; i < r.data.length; i++) 
            {
                idFila = idCot+r.data[i].idItm;
                html += '<tr class="fila'+idFila+'">' +
                    '<td class="font-weight-bold">' + novDato(r.data[i].nombre) + '</td>' +
                    '<td class="text-center">' + novDato(r.data[i].clasificador) + '</td>' +
                    '<td class="text-center">' + novDato(r.data[i].descripcion) + '</td>' +
                    '<td class="text-center"><span class="font-weight-bold badge badge-light shadow um'+idFila+'">'+ novDato(r.data[i].nombreUm) +'</span> <button class="btn text-success" onclick="seleccionarUm(\''+idFila+'\','+r.data[i].idItm+')"><i class="fa fa-edit"></i></button>' +
                    '</td>' +
                    '<td class="text-center">' + 
                        '<div class="input-group">' +
                            '<div class="input-group-prepend">' +
                                '<span class="input-group-text font-weight-bold"><i class="fa fa-hashtag"></i></span>' +
                            '</div>' + 
                            '<input type="text" class="form-control" onblur="changeCant(this,'+r.data[i].idItm+');" value="'+novDato(r.data[i].cantidad)+'">' +
                        '</div>' +
                    '</td>' +
                    '<td class="text-center">' + 
                        '<button type="button" class="btn text-danger" onclick="deleteItem('+r.data[i].idItm+');"><i class="fa fa-trash"></i></button>'+
                    '</td>'+
                '</tr>';
            }
            $('#listItemsMai').html(html);
        },
        error: function (xhr, status, error) {
            msjSimple(false,'Algo salio mal, porfavor contactese con el Administrador.');
        }
    });
}
// una vez se lanza el evento blur se guarda la cantidad en el item
// se guarda en la tabla de cotxitm
function changeCant(ele,idItm)
{
    let cadena = $(ele).val();
    if(isNaN(cadena))
    {
        $(ele).val('');
        return;
    }
    else
    {
        jQuery.ajax({
            url: "{{ url('cotxitm/changeCant') }}",
            method: 'POST', 
            data: {idCot:idCot,idItm:idItm,cant:$(ele).val()},
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {

            },
            error: function (xhr, status, error) {
                msjSimple(false,'Ocurrio un conflicto, porfavor contactese con el administrador.');
            }
        });
    }
}
// con esta funcion se carga el select2 donde se encuentra listado los items
function fillItems()
{
    jQuery.ajax(
    { 
        url: "{{ url('item/listar') }}",
        method: 'get',
        success: function(r){
            $.each(r.data,function(indice,fila){
                $('#items').append("<option value='"+fila.idItm+"'>"+fila.clasificador+': '+fila.nombre+' | ' + fila.descripcion+"</option>");
            });
            $('#items').select2({
                placeholder:"Seleccione los items.",
                width:"resolve",
                dropdownParent: $('#mAddItems')
            });
        }
    });
}
function deleteItem(idItm)
{
    // alert('.fila'+idCot+idItm);
    jQuery.ajax({
        url: "{{ url('cotxitm/eliminar') }}",
        method: 'POST', 
        data: {idCot:idCot,idItm:idItm},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            $('.fila'+idCot+idItm).remove();
            msjRee(r);

        },
        error: function (xhr, status, error) {
            msjSimple(false,'Algo salio mal, porfavor contactese con el Administrador.');
        }
    });
}
function seleccionar()
{
    jQuery.ajax({
        url: "{{ url('cotxitm/changeUm') }}",
        method: 'POST', 
        data: {idCot:idCot,idItm:idItem,idUm:$('#unidadMedida').val()},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            console.log(r);
            var opcionSelect = $('#unidadMedida option[value="' + $('#unidadMedida').val() + '"]');
            var opcionSelectHtml = opcionSelect.prop('outerHTML');
            $('.um'+idRow).html(opcionSelectHtml.split('|')[0]);
            $('#unidadMedida').val('0').change();
            $('#mUnidadMedida').modal('hide');
        },
        error: function (xhr, status, error) {
            msjSimple(false,'Algo salio mal, porfavor contactese con el Administrador.');
        }
    });
    // -----
    // var opcionSelect = $('#unidadMedida option[value="' + $('#unidadMedida').val() + '"]');
    // var opcionSelectHtml = opcionSelect.prop('outerHTML');
    // $('.um'+idRow).html(opcionSelectHtml.split('|')[0]);
    // $('#unidadMedida').val('0').change();
    // $('#mUnidadMedida').modal('hide');
}
</script>