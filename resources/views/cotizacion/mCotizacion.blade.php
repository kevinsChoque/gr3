<!-- modal mCotizacion -->
<style>
    .modal-custom-size {
    max-width: 90%; /* Puedes ajustar el porcentaje según tus necesidades */
}
</style>
<div class="modal fade" id="mCotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-custom-size" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-doctor"></i> Cotizacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                                <button class="btn btn-success float-right ml-2" onclick="addItemsM()"><i class="fa fa-plus"></i> Agregar items</button>
                                <button class="btn btn-success float-right" onclick="editarM()"><i class="fa fa-edit"></i> Modificar Cotizacion</button>
                            </div> -->
                            <div class="col-lg-12 my-2">
                                <h4 class="text-center font-weight-bold">Datos de cotizacion</h4>
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
                            <div class="col-lg-12">
                                <table class="w-100 table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="35%">Nombre</th>
                                            <th width="10%">Clasificador</th>
                                            <th width="20%">Descripcion</th>
                                            <th width="15%">U.Medida</th>
                                            <th width="20%">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listItems">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 contentPdf">
                        <!-- <embed src="http://localhost/grc/public/cotizacion/archivo/1699541524_Cotizaciones(1).pdf" id="pdfViewer" class="w-100 h-100"> -->
                        <!-- <div id="pdfViewer" class="w-100 h-100" ></div> -->
                        <!-- <div id="pdfViewerContainer" style="width: 100%; height: 600px;">
                            <div id="pdfViewer" style="width: 100%; height: 100%;"></div>
                        </div> -->
                    </div>
                </div>
                
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>	
$(document).ready( function () {

});
// ---

// ----
var idM = '';
function editarM()
{
    localStorage.setItem("idCot",idM);
    window.location.href = "{{url('cotizacion/editar')}}";
}
function addItemsM()
{
    localStorage.setItem("idCot",idM);
    window.location.href = "{{url('cotizacion/addItems')}}";
}
function showDataCotizacion(r)
{
    idM = r.cot.idCot;
    let estateCotizacion = estadoCotizacion(r.cot.estadoCotizacion);
    $('.numeroCotizacion').html(r.cot.numeroCotizacion);
    $('.tipo').html(r.cot.tipo);
    $('.unidadEjecutora').html(novDato(r.cot.unidadEjecutora));
    $('.documento').html(r.cot.documento);
    $('.fechaCotizacion').html(r.cot.fechaCotizacion);
    $('.fechaFinalizacion').html(r.cot.fechaFinalizacion);
    $('.concepto').html(r.cot.concepto);
    $('.descripcion').html(r.cot.descripcion);
    $('.estadoCotizacion').html(estateCotizacion);
    var dir = $('.fileCotizacion').attr('href');
    $('.fileCotizacion').html(r.cot.archivo);
    $('.fileCotizacion').attr('href',dir+'/'+r.cot.archivo);

    var preVisualizador = "<embed src='http://localhost/grc2/public/cotizacion/archivo/"+r.cot.archivo+"' id='pdfViewer' class='w-100 h-100'>";//este es el que ase embebida del documento con push
    $('#pdfViewer').attr('src',dir+'/'+r.cot.archivo);
    // var estees = "<embed src='http://localhost/grc/public/cotizacion/archivo/1699541524_Cotizaciones(1).pdf' id='pdfViewer' class='w-100 h-100'>";
    
    $('.contentPdf').html(preVisualizador);
    // showPDFPreview(r.cot.archivo);
    // -----
    var html = '';
    for (var i = 0; i < r.items.length; i++) 
    {
        html += '<tr>' +
            '<td class="font-weight-bold">' + novDato(r.items[i].nombre) +'</td>' +
            '<td class="text-center">' + novDato(r.items[i].clasificador) + '</td>' +
            '<td class="text-center">' + novDato(r.items[i].descripcion) + '</td>' +
            '<td class="text-center"><span class="font-weight-bold badge badge-light shadow">'+ novDato(r.items[i].nombreUm) +'</span>' +
            '</td>' +
            '<td class="text-center">' + novDato(r.items[i].cantidad) + '</td>' +
        '</tr>';
    }
    $('#listItems').html(html);
}
</script>