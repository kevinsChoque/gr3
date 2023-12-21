<!-- modal mArchivos -->
<div class="modal fade" id="mArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-file-pdf"></i> Archivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<form id="fvitem">
    				<div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-box">
                                <!-- <span class="info-box-icon bg-light shadow"><i class="fa fa-download"></i></span> -->
                                <a href="{{route('cotizacion-llenada')}}" target="_blank" class="info-box-icon bg-light shadow">
                                    <!-- <i class="fas fa-file-pdf"></i> Descargar Cotizacion Llenada -->
                                    <!-- <span class="info-box-icon bg-light shadow"> -->
                                        <i class="fa fa-download"></i>
                                    <!-- </span> -->
                                </a>
                                <div class="info-box-content">
                                    <span class="info-box-text">Descargar</span>
                                    <span class="info-box-number">Cotizacion Llenada</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-box">
                                <!-- <span class="info-box-icon bg-light shadow"><i class="fa fa-download"></i></span> -->
                                <a href="{{route('declaracion-jurada')}}" target="_blank" class="info-box-icon bg-light shadow">
                                    <i class="fa fa-download"></i>
                                </a>
                                <div class="info-box-content">
                                    <span class="info-box-text">Descargar</span>
                                    <span class="info-box-number">Declaracion Jurada</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-box">
                                <!-- <span class="info-box-icon bg-light shadow"><i class="fa fa-download"></i></span> -->
                                <a href="{{route('anexo5')}}" target="_blank" class="info-box-icon bg-light shadow">
                                    <i class="fa fa-download"></i>
                                </a>
                                <div class="info-box-content">
                                    <span class="info-box-text">Descargar</span>
                                    <span class="info-box-number">Anexo 5</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-box">
                                <!-- <span class="info-box-icon bg-light shadow"><i class="fa fa-download"></i></span> -->
                                <a href="{{route('cci')}}" target="_blank" class="info-box-icon bg-light shadow">
                                    <i class="fa fa-download"></i>
                                </a>
                                <div class="info-box-content">
                                    <span class="info-box-text">Descargar</span>
                                    <span class="info-box-number">CCI<!-- (Cuenta corriente interbancaria) --></span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 text-center">
                            <a href="{{route('cotizacion-llenada')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> Descargar Cotizacion Llenada
                            </a>
                        </div>  
                        <div class="col-lg-3 text-center">
                            <a href="{{route('cci')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> Descargar CCI
                            </a>
                        </div> 
                        <div class="col-lg-3 text-center">
                            <a href="{{route('declaracion-jurada')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> Descargar Declaracion Jurada
                            </a>
                        </div> 
                        <div class="col-lg-3 text-center">
                            <a href="{{route('anexo5')}}" target="_blank" class="btn btn-app shadow bg-purple">
                                <i class="fas fa-file-pdf"></i> ANEXO 5
                            </a>
                        </div>  -->
    				</div>
            	</form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>	

</script>