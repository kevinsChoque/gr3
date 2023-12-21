// Función para obtener el nombre del mes
function obtenerNombreMes(numeroMes) {
    var meses = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ];
    return meses[numeroMes - 1];
}

// Función para obtener el formato de 12 horas
function obtenerFormato12Horas(horas) {
    return horas % 12 || 12; // Devuelve 12 en lugar de 0 para las 12:00 PM
}

// Función para agregar un cero inicial a minutos y segundos
function agregarCeroInicial(valor) {
    return valor < 10 ? "0" + valor : valor;
}

// Función para obtener AM o PM
function obtenerAMPM(horas) {
    return horas >= 12 ? "PM" : "AM";
}
// ----
function sideBarCollapse()
{
    if(localStorage.getItem("sbd")==1)
    {
        $('.sbd1').addClass('menu-is-opening menu-open');
        $('.sbd1>ul').css('display','block');
    }
    if(localStorage.getItem("sbd")==2)
    {
        $('.sbd2').addClass('menu-is-opening menu-open');
        $('.sbd2>ul').css('display','block');
    }
    if(localStorage.getItem("sbd")==3)
    {
        $('.sbd3').addClass('menu-is-opening menu-open');
        $('.sbd3>ul').css('display','block');
    }
    if(localStorage.getItem("sbd")==4)
    {
        $('.sbd4').addClass('menu-is-opening menu-open');
        $('.sbd4>ul').css('display','block');
    }
    if(localStorage.getItem("sbd")==5)
    {
        $('.sbd5').addClass('menu-is-opening menu-open');
        $('.sbd5>ul').css('display','block');
    }
    if(localStorage.getItem("sbd")==6)
    {
        $('.sbd6').addClass('menu-is-opening menu-open');
        $('.sbd6>ul').css('display','block');
    }
    if(localStorage.getItem("sba")==1)
    {
        $('.sba1').removeClass('bg-light');
        $('.sba1').addClass('bg-info');
    }
}
function sideBarActive()
{
    // console.log('este es sba---> '+localStorage.getItem("sba"));
    // if(localStorage.getItem("sba")==5)
    // {
    //     console.log('entro');
    //     $('.sba5').addClass('active');
    // }
    if(localStorage.getItem("sba")==2)$('.sba2').addClass('bg-info');
    if(localStorage.getItem("sba")==3)$('.sba3').addClass('bg-info');
    if(localStorage.getItem("sba")==4)$('.sba4').addClass('bg-info');
    if(localStorage.getItem("sba")==5)$('.sba5').addClass('bg-info');
    if(localStorage.getItem("sba")==6)$('.sba6').addClass('bg-info');
    if(localStorage.getItem("sba")==7)$('.sba7').addClass('bg-info');
    if(localStorage.getItem("sba")==8)$('.sba8').addClass('bg-info');
    if(localStorage.getItem("sba")==9)$('.sba9').addClass('bg-info');
    if(localStorage.getItem("sba")==10)$('.sba10').addClass('bg-info');
    if(localStorage.getItem("sba")==11)$('.sba11').addClass('bg-info');
    if(localStorage.getItem("sba")==12)$('.sba12').addClass('bg-info');
    if(localStorage.getItem("sba")==13)$('.sba13').addClass('bg-info');
    if(localStorage.getItem("sba")==14)$('.sba14').addClass('bg-info');
    if(localStorage.getItem("sba")==15)$('.sba15').addClass('bg-info');
    if(localStorage.getItem("sba")==16)$('.sba16').addClass('bg-info');
    if(localStorage.getItem("sba")==17)$('.sba17').addClass('bg-info');
    if(localStorage.getItem("sba")==18)$('.sba18').addClass('bg-info');
    if(localStorage.getItem("sba")==19)
    {
        $('.sba19').removeClass('bg-light');
        $('.sba19').addClass('bg-info');
    }
    if(localStorage.getItem("sba")==20)
    {
        $('.sba20').removeClass('bg-light');
        $('.sba20').addClass('bg-info');
    }
    if(localStorage.getItem("sba")==21)$('.sba21').addClass('bg-info');
    if(localStorage.getItem("sba")==22)$('.sba22').addClass('bg-info');
    if(localStorage.getItem("sba")==23)$('.sba23').addClass('bg-info');
}
function sideBarActivePa()
{
    // console.log('este es sba---> '+localStorage.getItem("sba"));
    // if(localStorage.getItem("sba")==5)
    // {
    //     console.log('entro');
    //     $('.sba5').addClass('active');
    // }
    if(localStorage.getItem("sba")==2)$('.sba2').addClass('active active-p');
    if(localStorage.getItem("sba")==3)$('.sba3').addClass('active active-p');
    if(localStorage.getItem("sba")==4)$('.sba4').addClass('active active-p');
    if(localStorage.getItem("sba")==5)$('.sba5').addClass('active active-p');
    if(localStorage.getItem("sba")==6)$('.sba6').addClass('active active-p');
    if(localStorage.getItem("sba")==7)$('.sba7').addClass('active active-p');
    if(localStorage.getItem("sba")==8)$('.sba8').addClass('active active-p');
    if(localStorage.getItem("sba")==9)$('.sba9').addClass('bg-info');
    if(localStorage.getItem("sba")==10)$('.sba10').addClass('bg-info');
    if(localStorage.getItem("sba")==11)$('.sba11').addClass('bg-info');
    if(localStorage.getItem("sba")==12)$('.sba12').addClass('bg-info');
    if(localStorage.getItem("sba")==13)$('.sba13').addClass('bg-info');
    if(localStorage.getItem("sba")==14)$('.sba14').addClass('bg-info');
    if(localStorage.getItem("sba")==15)$('.sba15').addClass('bg-info');
    if(localStorage.getItem("sba")==16)$('.sba16').addClass('bg-info');
    if(localStorage.getItem("sba")==17)$('.sba17').addClass('bg-info');
    if(localStorage.getItem("sba")==18)$('.sba18').addClass('bg-info');
    if(localStorage.getItem("sba")==19)
    {
        $('.sba19').removeClass('bg-light');
        $('.sba19').addClass('bg-info');
    }
    if(localStorage.getItem("sba")==20)
    {
        $('.sba20').removeClass('bg-light');
        $('.sba20').addClass('bg-info');
    }
    if(localStorage.getItem("sba")==21)$('.sba21').addClass('bg-info');
    if(localStorage.getItem("sba")==22)$('.sba22').addClass('bg-info');
    if(localStorage.getItem("sba")==23)$('.sba23').addClass('bg-info');
}
$('.soloNumeros').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
function initDatatable(idTabla)
{
    $('#'+idTabla).DataTable( {
        "autoWidth":false,
        "responsive":true,
        "ordering": false,
        "lengthMenu": [[5, 10,25, -1], [5, 10,25, "Todos"]],   
        // "order": [[ 1, 'desc' ]],
        "language": {
            "info": "Mostrando la pagina _PAGE_ de _PAGES_. (Total: _MAX_)",
            "search":"",
            "infoFiltered": "(filtrando)",
            "infoEmpty": "No hay registros disponibles",
            "sEmptyTable": "No tiene registros guardados.",
            "lengthMenu":"Mostrar registros _MENU_ .",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        
    } );
    $('input[type=search]').parent().css('width','100%');
    $('input[type=search]').css('width','100%');            
    $('input[type=search]').css('margin','0');
    $('input[type=search]').prop('placeholder','Escriba para buscar en las columnas.');
}
function initFv(id,rules)
{
    $('#'+id).validate({
        rules: rules,
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        }
    });
}
function estadoCotizacion(estado)
{
    let badgeEstado='';
    if(estado == '1') badgeEstado='<span class="shadow badge badge-warning">En proceso</span>';
    if(estado == '2') badgeEstado='<span class="shadow badge badge-success">Publicado</span>';
    if(estado == '3') badgeEstado='<span class="shadow badge badge-primary">Finalizado</span>';
    if(estado == '4') badgeEstado='<span class="shadow badge badge-danger">Corregir</span>';
    if(estado == '5') badgeEstado='<span class="shadow badge badge-info">Recotizando</span>';
    return badgeEstado
}
function badgeAccordingUser(tipo)
{
    let badgeAccordingUser='';
    if(tipo == 'administrador') badgeAccordingUser='<span class="badge badge-success">ADMINISTRADOR</span>';
    if(tipo == 'cotizador') badgeAccordingUser='<span class="badge badge-primary">COTIZADOR</span>';
    if(tipo == 'proveedor') badgeAccordingUser='<span class="badge badge-info">FINALIZADO</span>';
    return badgeAccordingUser;
}
function badgeTipoCot(tipo)
{   return tipo=='Servicios'?'<span class="badge badge-light">Servicios</span>':'<span class="badge badge-light">Bienes</span>'}
function cleanFv(form)
{
    var validator = $("#"+form).validate();
    validator.resetForm();
    $("#"+form+" .is-valid").removeClass("is-valid");
    $("#"+form+" .is-invalid").removeClass("is-invalid");
}
function stateRecord(est)
{
    return est=='1'?'<span class="badge badge-success shadow">Activo</span>':'<span class="badge badge-danger shadow">Inactivo</span>';
}
function novDato(dato)
{
    return dato!==null && dato!=''?dato:'--';
}
function msjSimple(estado,mensaje)
{
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });
    Toast.fire({
        icon: estado?'success':'error',
        title: mensaje
    });
}
function msgRee(result)
{
    Swal.fire({
        position: "center",
        icon: result.estado?"success":'error',
        title: result.message,
        showConfirmButton: false,
        timer: 2500
    });
}
function msjRee(result)
{
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        // timer: 3000
        timer:3000
    });
    if(result.estado)
    {
        Toast.fire({
            icon: 'success',
            title: result.message
        });
    }
    else
    {
        if(result.validator)
        {
            let verifyObject = JSON.parse(result.message);
            if(typeof verifyObject === 'object')
            {
                var message='';
                for (const property in verifyObject) 
                {
                    console.log(`${property}: ${verifyObject[property]}`);
                    message=message+`${verifyObject[property]}`+'<br>';
                }
                Toast.fire({
                    icon: 'error',
                    title: message
                });
            }
        }
        else
        {
            Toast.fire({
                icon: 'error',
                title: result.message
            });
        }
    }
}
function msjError(error)
{
    Swal.fire({
        position: "top-end",
        icon: "error",
        title: error,
        showConfirmButton: false,
        timer: 4500
    });
}