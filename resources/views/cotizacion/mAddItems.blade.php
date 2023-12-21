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
                            <!-- <b class="d-block archivo">-</b> -->
                            <a href="{{ route('ver-archivo') }}" class="d-block fileCotizacion font-weight-bold" target="_blank">-</a>
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
                            <!-- <div class="form-control"> -->
                                <select name="items" id="items" class="form-control select2" style="width: 100%;">
                                    <option disabled selected>Agregar items (Nombre)</option>
                                </select>
                            <!-- </div> -->
                        </div>
                    </div>  
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="m-0" style="visibility: hidden;">-</label>
                            <button class="btn btn-info form-control form-control-sm addItem"><i class="fa fa-plus"></i> Agregar item</button>
                        </div>
                    </div> 
                    <!-- <div class="col-lg-3">
                        <div class="form-group">
                            <label class="m-0" style="visibility: hidden;">-</label>
                            <button class="btn btn-success form-control form-control-sm changeEstadoCotMai"><i class="fa fa-edit"></i> Publicar cotizacion</button>
                        </div>
                    </div>  -->
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
                                <!-- <tr class="text-center">
                                    <th colspan="6">Sin items</th>
                                </tr> -->
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
    // loadCotizacion();
    // loadItemsCotizacion();
    fillItems();
    // $('.overlayPagina').css("display","none");
    // $('.overlayRegistros').css("display","none");


    // $('#items').select2({
    //     placeholder:"Seleccione los items.",
    //     width:"resolve",
    // });
});
$('.addItem').on('click',function(){
    addItem();
});
$('.changeEstadoCotMai').on('click',function(){
    changeEstadoCotMai();
});
function changeEstadoCotMai()
{
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
                    if(r.estado)
                    {
                        construirTabla();
                        fillRegistros();
                        $('#mAddItems').modal('hide');
                        // window.location.href="{{url('cotizacion/ver')}}";
                    }
                    else
                        msjRee(r);
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
function procedure(r)
{
    // console.log(r);
    var data = {
        id: r.item.idItm,
        text: r.item.clasificador+': '+r.item.nombre+' | ' + r.item.descripcion,
    };
    var newOptionReg = new Option(data.text, data.id, true, true);
    $('#items').prepend(newOptionReg).trigger('change');
}
function addItem()
{
    if($('#items').val()==null)
    {
        msjSimple(false,'Seleccione un item');
        return;
    }
    $('.addItem').prop('disabled',true); 
    jQuery.ajax({
        url: "{{ url('cotxitm/guardar') }}",
        method: 'POST', 
        data: {idCot:localStorage.getItem('idCot'),idItm:$('#items').val(),},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            console.log(r);
            if (r.estado) {
                let idFila = localStorage.getItem('idCot')+r.item.idItm;
                let html='';
                html += '<tr class="fila'+idFila+'">' +
                        '<td class="font-weight-bold">' + novDato(r.item.nombre) +'</td>' +
                        '<td class="text-center">' + novDato(r.item.clasificador) + '</td>' +
                        '<td class="text-center">' + novDato(r.item.descripcion) + '</td>' +
                        '<td class="text-center"><span class="font-weight-bold badge badge-light shadow um'+idFila+'">'+ novDato(r.item.cantidad) +'</span> <button class="btn text-success" onclick="seleccionarUm('+idFila+','+r.item.idItm+')"><i class="fa fa-edit"></i></button></td>' +
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
        },
        error: function (xhr, status, error) {
            alert('salio un error');
        }
    });
}
function loadCotizacionMai(id)
{
    jQuery.ajax({
        url: "{{ url('cotizacion/show') }}",
        method: 'POST', 
        data: {id:id},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            // limpiarForm();
            var estadoCot = r.data.estadoCotizacion=='1'?'Activo':
                r.data.estadoCotizacion=='2'?'Finalizado':'Borrador';
            let estateCotizacion = estadoCotizacion(r.data.estadoCotizacion);
            console.log(estadoCotizacion)
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
            $('.fileCotizacion').html(r.data.archivo);
            $('.fileCotizacion').attr('href',dir+'/'+r.data.archivo);
            $('.overlayRegistros').css("display","none");
            numero = r.data.numeroCotizacion;
            console.log(r)
            // $('#mAddItems').modal('show');
        },
        error: function (xhr, status, error) {
            alert('salio un error');
        }
    });
}
function loadItemsCotizacion(id)
{
    jQuery.ajax({
        url: "{{ url('cotxitm/loadSegunCotizacion') }}",
        method: 'POST', 
        data: {idCot:id},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            console.log(r);
            let idFila = '';
            var html = '';
            for (var i = 0; i < r.data.length; i++) 
            {
                idFila = localStorage.getItem('idCot')+r.data[i].idItm;
                html += '<tr class="fila'+idFila+'">' +
                    '<td class="font-weight-bold">' + novDato(r.data[i].nombre) + '</td>' +
                    '<td class="text-center">' + novDato(r.data[i].clasificador) + '</td>' +
                    '<td class="text-center">' + novDato(r.data[i].descripcion) + '</td>' +
                    '<td class="text-center"><span class="font-weight-bold badge badge-light shadow um'+idFila+'">'+ novDato(r.data[i].nombreUm) +'</span> <button class="btn text-success" onclick="seleccionarUm('+idFila+','+r.data[i].idItm+')"><i class="fa fa-edit"></i></button>' +
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
            console.log(html);
            $('#listItemsMai').html(html);
        },
        error: function (xhr, status, error) {
            msjSimple(false,'Algo salio mal, porfavor contactese con el Administrador.');
        }
    });
}
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
                // theme: "adminlte"
            });
        }
    });
}
function deleteItem(idItm)
{
    jQuery.ajax({
        url: "{{ url('cotxitm/eliminar') }}",
        method: 'POST', 
        data: {idCot:localStorage.getItem("idCot"),idItm:idItm},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            $('.fila'+localStorage.getItem("idCot")+idItm).remove();
            msjRee(r);

        },
        error: function (xhr, status, error) {
            alert('Ocurrio un conflicto, porfavor contactese con el administrador.');
        }
    });
}
function seleccionar()
{
    jQuery.ajax({
        url: "{{ url('cotxitm/changeUm') }}",
        method: 'POST', 
        data: {idCot:localStorage.getItem('idCot'),idItm:idItem,idUm:$('#unidadMedida').val()},
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
            alert('salio un error');
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