<div class="col-lg-6 pr-3" style="border-right: 4px solid #505048;">
    <div class="row">
        <div class="col-lg-12 my-2">
            <h4 class="text-center font-weight-bold">Datos de cotizacion</h4>
        </div>
        <div class="col-lg-3">
            <p class="text-sm">Numero de cotizacion:
                <b class="d-block rnumeroCotizacion">-</b>
            </p>
        </div> 
        <div class="col-lg-3">
            <p class="text-sm">Tipo de cotizacion:
                <b class="d-block rtipo">-</b>
            </p>
        </div>
        <div class="col-lg-3">
            <p class="text-sm">Archivo:
                <!-- <a href="{{ route('ver-archivo') }}" class="d-block rfileCotizacion font-weight-bold" target="_blank" style="word-wrap: break-word;">-</a> -->
                <span class="fa fa-file-pdf fa-lg showDeepFileRec text-primary d-block" style="cursor: pointer;"></span>
            </p>
        </div> 
        <div class="col-lg-3">
            <p class="text-sm">Numero de CCMN:
                <b class="d-block rdocumento">-</b>
            </p>
        </div> 
        <div class="col-lg-4">
            <p class="text-sm">Fecha de la cotizacion:
                <b class="d-block rfechaCotizacion2" style="display: none !important;">-</b>
                <b class="d-block rfechaCotizacion">-</b>
                <b class="d-block rhoraCotizacion">-</b>
            </p>
        </div> 
        <div class="col-lg-4">
            <p class="text-sm">Fecha de la finalizacion:
                <b class="d-block rfechaFinalizacion2" style="display: none !important;">-</b>
                <b class="d-block rfechaFinalizacion">-</b>
                <b class="d-block rhoraFinalizacion">-</b>
            </p>
        </div> 
        
        <div class="col-lg-4">
            <p class="text-sm">Estado:
                <b class="d-block"><span class="badge badge-light restadoCotizacion" style="font-size: 1rem;"></span></b>
            </p>
        </div> 
        <div class="col-lg-4">
            <p class="text-sm">Concepto:
                <b class="d-block text-justify rconcepto">-</b>
            </p>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-12 m-auto p-3 shadow contenedorRegItemsRec">
            <table id="registrosItemsRec" class="w-100 table table-hover table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="35%">Nombre</th>
                        <th width="15%">U.Medida</th>
                        <th width="20%">Cantidad</th>
                    </tr>
                </thead>
                <tbody id="listItemsRec">
                </tbody>
            </table>
        </div>
    </div>
</div>