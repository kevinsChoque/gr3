<div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header py-1 border-transparent" style="background-color: rgba(0, 0, 0, 0.03);">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-key"></i> Cambiar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fvchangepassword">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label class="m-0">Contraseña: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="password" name="password">
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="m-0">Confirmar contraseña: <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-weight-bold"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="text" class="form-control input" id="repassword" name="repassword">
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer py-1 border-transparent">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success float-right saveChangePassword"><i class="fa fa-lock"></i> Cambiar contraseña</button>
            </div>
        </div>
    </div>
</div>
<script>
    localStorage.setItem("sba",3);
    var flip=0;
    $(document).ready( function () {
        $.validator.addMethod("equalToPassword", function (value, element) {
            return value === $("#password").val();
        }, "Las contraseñas no coinciden");
        initFv('fvchangepassword',rulesChangePassowrd());
    });
    $('.saveChangePassword').on('click',function(){
        saveChangePassword();
    });
    function rulesChangePassowrd()
    {
        return {
            password: {required: true,minlength: 8},
            repassword: {required: true,minlength: 8,equalToPassword: true},
        };
    }
    function saveChangePassword()
    {
        // alert('entro a contra');
        if($('#fvchangepassword').valid()==false)
        {return;}
    // alert('llego hasta aki')
        var formData = new FormData($("#fvchangepassword")[0]);
        $('.saveChangePassword').prop('disabled',true);
        // $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
        jQuery.ajax(
        { 
            url: "{{ url('panelAdm/paProveedor/savePassword') }}",
            data: formData,
            method: 'post',
            dataType: 'json',
            processData: false, 
            contentType: false, 
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            success: function(r){
                console.log(r);
                // $( ".overlayRegistros" ).toggle( flip++ % 2 === 0 );
                $('#modalChangePassword').modal('hide');
                $('.saveChangePassword').prop('disabled',false);
                // msjRee(r);
                msgRee(r);
            }
        });
    }
</script>