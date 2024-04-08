
<!-- ----- -->
<style>
    .btn-custom {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
</style>
<script>
var tablaDeRegistros;
var flip=0;
$(document).ready( function () 
{
    tablaDeRegistros=$('.contenedorRegistros').html();
});
$('.filtrarCotizaciones').on('click',function(){
    construirTabla();
    fillRegistros();
});
function construirTabla()
{
    $('.contenedorRegistros>div').remove();
    $('.contenedorRegistros').html(tablaDeRegistros);
}
function fillRegistros()
{
    $('.contenedorRegistros').css('display','block');
    jQuery.ajax(
    { 
        url: "{{ url('homeAdmin/cotFiltradas') }}",
        method: 'post',
        data: {meta:$('#meta').val(),tipo:$('#tipo').val(),estado:$('#estado').val()},
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r)
        {
            console.log(r)
            var html = '';
            // let opciones = '';
            // let opcRec = '';
            // let segunEstado;
            // let opcAne = '';
            for (var i = 0; i < r.data.length; i++) 
            {
                // solo se muestra estas opciones para lascotizaciones q estan EN PROCESO
                // if(r.data[i].estadoCotizacion=='1')
                // {
                //     opciones = ''+
                //         // '<button type="button" class="btn text-info" title="Agregar items" onclick="addItems(\''+r.data[i].idCot+'\');"><i class="fa fa-plus"></i></button>'+
                //         '<button type="button" class="btn text-info" title="Editar registro" onclick="editar(\''+r.data[i].idCot+'\');"><i class="fa fa-edit"></i></button>'+
                //         '<button type="button" class="btn text-danger" title="Eliminar registro" onclick="eliminar(\''+r.data[i].idCot+'\');"><i class="fa fa-trash"></i></button>';
                // }
                // solo se muestra esta opcion cuando la cotizacion FINALIZO
                // if(r.data[i].estadoCotizacion == '3')
                // {
                //     opcRec = '<button type="button" class="btn text-info" onclick="showRecotizar(\''+r.data[i].idCot+'\')" title="Recotizar"><i class="fa fa-calendar-alt"></i></button>';
                // }
                // console.log(r.data[i].anexoPdf!==null);

                // if(r.data[i].anexoPdf!==null)
                // {
                //     opcAne = '<button type="button" class="btn text-info" onclick="showAnexos(\''+r.data[i].idCot+'\')" title="Ver anexos"><i class="fa fa-file"></i></button>';
                // }
                let deleteColor = r.data[i].estado==0?'background: rgba(157,23,22,.5)':'';
                // opciones = r.data[i].estado==0?'':opciones;
                // segunEstado = r.data[i].estado==0?estadoCotizacion(r.data[i].estadoCotizacion):segunEstadoCotizacion(r.data[i]);
                // SE CARGA LAS COTIZACIONES
                html += '<tr style="'+deleteColor+'">' +
                    @if(session()->get('usuario')->tipo=="administrador")
                    '<td class="align-middle text-left text-uppercase font-weight-bold">' + novDato(r.data[i].nameUser) + '</td>' +
                    @endif
                    '<td class="align-middle text-center font-weight-bold">' + novDato(r.data[i].meta) +'</td>' +
                    '<td class="align-middle text-center font-weight-bold"><span onclick="showFile(\''+r.data[i].idCot+'\')" style="cursor: pointer;text-decoration: underline;" class="text-info">' + r.data[i].numeroCotizacion + '</span></td>' +
                    '<td class="align-middle text-left"><p class="m-0 ocultarTextIzqNameUser">' + novDato(r.data[i].concepto) + '</p></td>' +
                    '<td class="align-middle text-center">' + badgeTipoCot(r.data[i].tipo) +'</td>' +
                    '<td class="align-middle text-left">' + fechaCotizacionFormat(r.data[i].fechaFinalizacion) +'<br>'+ formatoHour(r.data[i].horaFinalizacion) + '</td>' +
                    '<td class="align-middle text-center">' + estadoCotizacion(r.data[i].estadoCotizacion) + '</td>' +
                    // '<td class="align-middle text-center">' + 
                    //     '<div class="btn-group btn-group-sm" role="group">'+
                    //         // '<button type="button" class="btn text-info" title="Ver cotizacion" onclick="showCotizacion(\''+r.data[i].idCot+'\')"><i class="fa fa-eye"></i></button>'+
                    //         // '<button type="button" class="btn text-info" title="Ver archivo" onclick="showFile(\''+r.data[i].idCot+'\')"><i class="fa fa-file-pdf"></i></button>'+
                    //         // opcAne +
                    //         // opcRec +
                    //         // opciones +
                    //     '</div>'+
                    // '</td>'+
                    '</tr>';
                // opciones='';
                // opcRec='';
                // opcAne='';
            }
            $('#data').html(html);
            // initDatatable('registros');
            // new DataTable('#registros', {
            //     layout: {
            //         topStart: {
            //             buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            //         }
            //     }
            // });
            let titulo = '';
            let meta = $('#meta').val();
            let tipo = $('#tipo option:selected').html();
            let estado = $('#estado option:selected').html();
            if(meta != '')
            {
                titulo = 'Cotizaciones de la meta '+meta+': ';
            }
            else
            {
                titulo = 'Cotizaciones: ';
            }
            if(tipo != 'TODOS')
            {
                titulo += ' tipo '+tipo;
            }
            if(estado != 'TODOS LOS ESTADOS')
            {
                titulo += ' estado '+estado+'';
            }
            $('#registros').DataTable( {
                "autoWidth": false,
                "responsive": true,
                "ordering": false,
                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "Todos"]],   
                "language": {
                    "info": "Mostrando la página _PAGE_ de _PAGES_. (Total: _MAX_)",
                    "search":"",
                    "infoFiltered": "(filtrando)",
                    "infoEmpty": "No hay registros disponibles",
                    "sEmptyTable": "No tiene registros guardados.",
                    "lengthMenu": "Mostrar registros _MENU_ .",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "layout": {
                    topStart: {
                        // buttons: ['excel', 'pdf']
                        "buttons": [{
                                extend: 'excelHtml5',
                                title: titulo,
                                className: 'btn-custom'
                            },
                            {
                                extend: 'pdfHtml5',
                                title: titulo,
                                customize: function (doc) {
                                    // Ajustar el ancho de las columnas
                                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                }
                            }
                        ]
                    }
                }
            });
            $('.overlayRegistros').css('display','none');
        }
    });
}
function segunEstadoCotizacion(cot)
{
    let opcion = cot.estadoCotizacion == '5' || cot.estadoCotizacion == '2' || cot.estadoCotizacion == '3' ? '':'<button class="btn text-info" onclick="changeEstadoCot(\''+cot.idCot+'\','+cot.numeroCotizacion+')"><i class="fa fa-edit"></i></button>';
    return estadoCotizacion(cot.estadoCotizacion) + opcion;
}
function showFile(idCot)
{
    jQuery.ajax({
        url: "{{ url('cotizacion/verFile') }}",
        method: 'post', 
        data: {idCot:idCot},
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            abrirArchivoBase64EnNuevaPestana(r.file,"application/pdf");
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
</script>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script> -->