@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Cotizaciones</h1></div>
            <div class="col-sm-6">
                <a href="{{url('cotizacion/registrar')}}" class="btn btn-success float-right ml-2"><i class="fa fa-plus"></i> Nueva</a>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 contenedorFormulario">
            <div class="card card-default card-info card-outline">
                <div class="overlay overlayRegistros">
                    <div class="spinner"></div>
                </div>
                <div class="card-header border-transparent py-2">
                    <h3 class="card-title m-0 font-weight-bold"><i class="fa-solid fa-car-tunnel"></i> Agregar items de cotizacion</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning msjPms" style="display: none;">
                        <p class="m-0 font-weight-bold font-italic">El usuario no cuenta con el acceso a registros.</p>
                    </div>
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
                    <hr>
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
                                <button class="btn btn-success form-control form-control-sm changeEstadoCot"><i class="fa fa-edit"></i> Publicar cotizacion</button>
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
                                <tbody id="listItems">
                                    <!-- <tr class="text-center">
                                        <th colspan="6">Sin items</th>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success form-control form-control-sm changeEstadoCot"><i class="fa fa-edit"></i> Publicar cotizacion</button>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@include('cotizacion.item.mItems')
@include('cotizacion.unidadMedida.mUnidadMedida')
<script>

// localStorage.setItem("sbd",1);
// localStorage.setItem("sba",4);
//     var tablaDeRegistros;
//     var flip=0;
var idRow='';
var idItem='';
var numero = '';
$(document).ready( function () {
    loadCotizacion();
    loadItemsCotizacion();
    fillItems();
    $('.overlayPagina').css("display","none");
    $('.overlayRegistros').css("display","none");
    // $('#items').select2({
    //     placeholder:"Seleccione los items.",
    //     width:"resolve",
    // });
});
$('.addItem').on('click',function(){
    addItem();
});
$('.changeEstadoCot').on('click',function(){
    changeEstadoCot();
});
function changeEstadoCot()
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
                data: {id:localStorage.getItem('idCot')},
                method: 'post',
                headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                success: function(r){
                    if(r.estado)
                        window.location.href="{{url('cotizacion/ver')}}";
                    else
                        msjRee(r);
                }
            });
        }
    });
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
            console.log(r);
            let idFila = '';
            var html = '';
            for (var i = 0; i < r.data.length; i++) 
            {
                idFila = localStorage.getItem('idCot')+r.data[i].idItm;
                html += '<tr class="fila'+idFila+'">' +
                    '<td class="font-weight-bold">' + novDato(r.data[i].nombre) +'</td>' +
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
            $('#listItems').html(html);
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
                $('#listItems').append(html);
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
function seleccionarUm(idFila,idItm)
{
    idRow = idFila;
    idItem = idItm;
    $('#mUnidadMedida').modal('show');
}
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
            data: {idCot:localStorage.getItem("idCot"),idItm:idItm,cant:$(ele).val()},
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function (r) {

            },
            error: function (xhr, status, error) {
                msjSimple(false,'Ocurrio un conflicto, porfavor contactese con el administrador.');
            }
        });
    }
    // ele.value = ele.value.replace(/[^0-9]/g,'');
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
                placeholder:"Seleccione las rutas.",
                width:"resolve",
                // theme: "adminlte"
            });
        }
    });
}
function loadCotizacion()
{
    jQuery.ajax({
        url: "{{ url('cotizacion/show') }}",
        method: 'POST', 
        data: {id:localStorage.getItem("idCot")},
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
        },
        error: function (xhr, status, error) {
            alert('salio un error');
        }
    });
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
//     function fillRegistros()
//     {
//         $('.contenedorRegistros').css('display','block');
//         jQuery.ajax(
//         { 
//             url: "{{ url('cotizacion/listar') }}",
//             method: 'get',
//             success: function(r)
//             {
//                 console.log(r.data);
//                 var html = '';
//                 for (var i = 0; i < r.data.length; i++) 
//                 {
//                     edit = '<button type="button" class="btn text-info" title="Editar registro" onclick="editar('+r.data[i].idCot+');"><i class="fa fa-edit" ></i></button>';
//                     dele = '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar('+r.data[i].idCot+');"><i class="fa fa-trash"></i></button>';
//                     html += '<tr>' +
//                         '<td class="text-center">' + r.data[i].numeroCotizacion + '</td>' +
//                         '<td class="text-center">' + novDato(r.data[i].tipo) +'</td>' +
//                         '<td class="text-center">' + novDato(r.data[i].fechaCotizacion) + '</td>' +
//                         '<td class="text-center">' + novDato(r.data[i].fechaFinalizacion) + '</td>' +
//                         '<td class="text-center">' + novDato(r.data[i].estadoCotizacion) + '</td>' +
//                         '<td class="text-center">' + 
//                             '<div class="btn-group btn-group-sm" role="group">'+
//                                 '<button type="button" class="btn text-info"><i class="fa fa-eye"></i></button>'+
//                                 '<button type="button" class="btn text-info"><i class="fa fa-file-pdf"></i></button>'+
//                                 '<button type="button" class="btn text-info"><i class="fa fa-plus" onclick="addItems('+r.data[i].idCot+');"></i></button>'+
//                                 edit+
//                                 dele+
//                             '</div>'+
//                         '</td></tr>';
//                 }
//                 $('#data').html(html);
//                 initDatatable('registros');
//                 $('.overlayRegistros').css('display','none');
//             }
//         });
        
//     }
//     function editar(id)
//     {
//         localStorage.setItem("idCot",id);
//         window.location.href = "{{url('cotizacion/editar')}}";
//     }
//     function addItems(id)
//     {
//         localStorage.setItem("idCot",id);
//         window.location.href = "{{url('cotizacion/addItems')}}";
//     }
//     function eliminar(id)
//     {
//         Swal.fire({
//             title: 'Esta seguro de eliminar el registro?',
//             text: "¡No podrás revertir esto!",
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#28a745',
//             cancelButtonColor: '#6c757d',
//             confirmButtonText: 'Si, eliminar!'
//         }).then((result) => {
//             if(result.isConfirmed)
//             {
//                 $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
//                 jQuery.ajax(
//                 { 
//                     url: "{{url('cotizacion/eliminar')}}",
//                     data: {id:id},
//                     method: 'post',
//                     headers: {
//                         'X-CSRF-TOKEN': "{{ csrf_token() }}"
//                     },
//                     success: function(result){
//                         construirTabla();
//                         fillRegistros();
//                         msjRee(result);
//                     }
//                 });
//             }
//         });
//     }
//     function construirTabla()
//     {
//         $('.contenedorRegistros>div').remove();
//         $('.contenedorRegistros').html(tablaDeRegistros);
//     }
</script>
@endsection