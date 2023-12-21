<!-- modal mArchivos -->
<div class="modal fade" id="mSend" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-doctor"></i> Enviar Archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="fvsend">
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item w-50">
                                        <a class="nav-link active text-center opcSeleccionado" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true" data-selected="uno">
                                            <strong>Subir archivos por individual</strong>
                                        </a>
                                    </li>
                                    <li class="nav-item w-50">
                                        <a class="nav-link text-center opcSeleccionado" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false" data-selected="segundo">
                                            <strong>Subir los archivos en uno solo</strong>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="alert text-center boxFile" style="border: 4px dashed #000;background: #ebeff5;cursor: pointer;">
                                                    <h5 class="font-italic font-weight-bold m-auto nameFile">Subir Cotizacion LLenada</h5>
                                                    <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                                    <p class="m-auto"><i class="fa fa-upload fa-lg"></i></p>
                                                </div>
                                                <input type="file" id="pdfCll" class="pdfFile" style="display: none;" data-name="Cotizacion LLenada">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="alert text-center boxFile" style="border: 4px dashed #000;background: #ebeff5;">
                                                    <h5 class="font-italic font-weight-bold m-auto nameFile">Subir Declaracion Jurada</h5>
                                                    <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                                    <p class="m-auto"><i class="fa fa-upload fa-lg"></i></p>
                                                </div>
                                                <input type="file" id="pdfDj" class="pdfFile" style="display: none;" data-name="Declaracion Jurada">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="alert text-center boxFile" style="border: 4px dashed #000;background: #ebeff5;">
                                                    <h5 class="font-italic font-weight-bold m-auto nameFile">Subir CCI</h5>
                                                    <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                                    <p class="m-auto"><i class="fa fa-upload fa-lg"></i></p>
                                                </div>
                                                <input type="file" id="pdfCci" class="pdfFile" style="display: none;" data-name="CCI">
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="alert text-center boxFile" style="border: 4px dashed #000;background: #ebeff5;">
                                                    <h5 class="font-italic font-weight-bold m-auto nameFile">Subir Anexo 5</h5>
                                                    <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                                    <p class="m-auto"><i class="fa fa-upload fa-lg"></i></p>
                                                </div>
                                                <input type="file" id="pdfA5" class="pdfFile" style="display: none;" data-name="Anexo 5">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="alert alert-info">
                                                    <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> -->
                                                    <h5 class="font-weight-bold font-italic"><i class="icon fas fa-info"></i> La cotizacion debe de contener los archivos en el siguiente orden:</h5>
                                                    <!-- <p class="m-0 font-italic">La cotizacion debe de contener los archivos en el siguiente orden</p> -->
                                                    <ol class="mb-0 font-weight-bold">
                                                        <li>Cotizacion Llenada</li>
                                                        <li>Declaracion Jurada</li>
                                                        <li>CCI (Cuenta corriente interbancaria)</li>
                                                        <li>Anexo 5</li>
                                                    </ol>
                                                </div>
                                            </div>
                                            <!-- <div class="col-lg-6">
                                                <div class="alert text-center boxFile h-100" style="border: 4px dashed #000;background: #ebeff5;">
                                                    <h5 class="font-italic font-weight-bold m-auto nameFile">ARCHIVO DE COTIZACION</h5>
                                                    <p class="m-auto"><i class="fa fa-upload fa-lg"></i></p>
                                                </div>
                                                <input type="file" id="pdfAll" class="pdfFile" style="display: none;">
                                            </div> -->
                                            <div class="col-lg-6">
                                                <div class="alert text-center boxFile h-100 d-flex flex-column justify-content-center" style="border: 4px dashed #000;background: #ebeff5;">
                                                    <h5 class="font-italic font-weight-bold m-auto nameFile">ARCHIVO DE COTIZACION</h5>
                                                    <p class="font-italic m-0 msgClick">Realiza click aki, para subir el archivo</p>
                                                    <p class="m-auto"><i class="fa fa-upload fa-2x"></i></p>
                                                </div>
                                                <input type="file" id="pdfAll" class="pdfFile" style="display: none;" data-name="ARCHIVO DE COTIZACION">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>  
            	<form id="fvsend_b" style="display: none;">
    				<div class="row">
                        <div class="col-lg-12">
                            <div class="callout callout-info">
                                <h5>Sobre el archivo</h5>
                                <p class="m-0"><strong>Su oferta economica debera ser entregada en formato digital (PDF) mediante este cuadro, todos los archivos juntos en un solo PDF.</strong></p>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="m-0">Archivos: <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text font-weight-bold"><i class="fa fa-angle-right"></i></span>
                                </div>
                                <input type="file" class="form-control file" id="file" name="file">
                            </div>
                        </div>
    				</div>
            	</form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                <button type="button" class="btn btn-success float-right sendCotPro ml-2" style="display: none;"><i class="fa fa-paper-plane"></i> Enviar</button>
            </div>
        </div>
    </div>
</div>
<script>	
    var soloPdf='false';
$(document).ready( function () {
    // initValidateItem();
    initFv('fvsend',rules());
});
$('.sendCotPro').on('click',function(){
    sendCotPro();
});
$('.boxFile').on('click',function(){
    $(this).parent().find('input.pdfFile').click();
});
$('.pdfFile').on('change',function(){
    let nameFile = $(this).val().split('\\').pop();
    if (/\.(pdf)$/i.test(nameFile))
    {
        $(this).parent().find('.nameFile').html($(this).attr('data-name')+': '+nameFile);
        $(this).parent().find('i').removeClass('fa fa-upload fa-lg');
        $(this).parent().find('i').addClass('fa fa-file-pdf fa-lg');
        // $(this).parent().find('.boxFile').css('background','#dc3545 !important');
        $(this).parent().find('.boxFile').css('border','4px solid #000');
    }
    else
    {
        $(this).val('');
        alert('Selecciona un archivo PDF válido.');
    }

});
$('.pdfFile').on('change',function(){
    // showBtnSend()
    // alert('otro change');
    activarBotonSend();
});
// $("#mSend").on("hidden.bs.modal", function () {
//     alert('se cerro el modal');
//     $('.file').val('');
//     $('.sendCotPro').css('display','none');
// });

$('.opcSeleccionado').on('click',function(){
    // alert($(this).attr('data-selected'));
    soloPdf = $(this).attr('data-selected')=='segundo'?'true':'false';
    activarBotonSend();
});
function activarBotonSend()
{
    if(soloPdf=='true')
    {
        if($('#pdfAll').val()!=='')
            $('.sendCotPro').css('display','block');
        else
            $('.sendCotPro').css('display','none');
    }
    else
    {
        if($('#pdfCll').val()!=='' && 
            $('#pdfDj').val()!=='' && 
            $('#pdfCci').val()!=='' && 
            $('#pdfA5').val()!==''
        )
            $('.sendCotPro').css('display','block');
        else
            $('.sendCotPro').css('display','none');
    }
}
function cleanFiles()
{
    $('#pdfCll').val('');
    $('#pdfDj').val('');
    $('#pdfCci').val('');
    $('#pdfA5').val('');
    $('#pdfAll').val('');
    $('.pdfFile').each(function(index, el) {

        $(this).parent().find('.nameFile').html('Subir '+$(this).attr('data-name'));
        $(this).parent().find('i').removeClass('fa fa-file-pdf fa-lg');
        $(this).parent().find('i').addClass('fa fa-download fa-lg');
        $(this).parent().find('.boxFile').css('border','4px dashed #000');
    });
    activarBotonSend();
}
function rules()
{
    // return {
    //     file: {required: true,},
    // };
}
function sendCotPro()
{
    // if($('#fvsend').valid()==false)
    // {return;}
    var formData = new FormData($("#fvsend")[0]);
    formData.append('idCrp', idCrp); 
    formData.append('soloPdf', soloPdf); 
    formData.append('pdfCll', $('#pdfCll')[0].files[0]);
    formData.append('pdfDj', $('#pdfDj')[0].files[0]);
    formData.append('pdfCci', $('#pdfCci')[0].files[0]);
    formData.append('pdfA5', $('#pdfA5')[0].files[0]);
    formData.append('pdfAll', $('#pdfAll')[0].files[0]);
    
    // formData.append('file', $('#archivo')[0].files.length>0?'true':'false');
    // $('.sendCotPro').prop('disabled',true); 
    jQuery.ajax({
        url: "{{ url('panelAdm/paCotRecPro/subirArchivo') }}",
        method: 'POST', 
        data: formData,
        dataType: 'json',
        processData: false, 
        contentType: false, 
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            if (r.estado) 
            {
                // limpiarFormSend();


                // procedure(r);
                construirTabla();
                fillRegistros();
                $('#mSend').modal('hide');
            } 
            msjRee(r);
            // $('.sendCotPro').prop('disabled',false); 
        },
        error: function (xhr, status, error) {
            msjSimple(false,'Algo salio mal, porfavor contactese con el Administrador.');
        }
    });
}
function limpiarFormSend()
{
    cleanFv('fvsend');
    $('.file').val('');
    $('.sendCotPro').css('display','none');
}
</script>