@extends('layout.layout')
@section('nombreContenido', '----')
@section('pageTitle')
<div class="content-header pb-0 pt-2">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Historial de Usuario</h1></div>
            <div class="col-sm-6">
                <!-- <a href="{{url('postulaciones/ver')}}" class="btn btn-success float-right"><i class="fa fa-list"></i> Ver lista de postulaciones</a> -->
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
<!-- ----------------------------------------------------------------- -->

<div class="container-fluid mb-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <label class="m-0">Fecha de historial:</label>
            <div class="input-group">
                <input type="date" class="form-control fechaHistorialLoad">
                <div class="input-group-append">
                    <button class="btn btn-success" onclick="buscarHistorial();">Cargar historial</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="invoice p-3 mb-3">
                <div class="row">
                    <div class="col-12">
                        <h5>
                            <i class="fas fa-lg fa-user"></i> Datos Personales.
                        </h5>
                    </div>
                    <div class="col-12">
                        <h5>
                            <small class="float-left fechaRegistro">--</small>
                        </h5>
                    </div>
                </div>
                <hr>
                <div class="row invoice-info">
                    <div class="col-lg-12 invoice-col">
                        Datos Personales
                    </div>
                    <div class="col-lg-6">
                        <strong>Dni.</strong>
                        <br>
                        <span class="dniUsu">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Nombres</strong>
                        <br>
                        <span class="nombreUsu">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Apellido Paterno</strong>
                        <br>
                        <span class="apUsu">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Apellido Materno</strong>
                        <br>
                        <span class="amUsu">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Tipo</strong>
                        <br>
                        <span class="tipo">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Celular</strong>
                        <br>
                        <span class="celular">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Correo Electronico</strong>
                        <br>
                        <span class="correoUsu">--</span>
                    </div>
                    <div class="col-lg-6">
                        <strong>Usuario</strong>
                        <br>
                        <span class="usuario">--</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 contenedorHistorial">
            <div class="timeline">
                <!-- <div class="time-label">
                    <span class="bg-red dia-historial">--</span>
                </div> -->
                <!-- <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                    </div>
                </div> -->
                <!-- <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div> -->
            </div>
        </div>
    </div>
</div>
<div class="col-md-12" style="display: none;">
    <div class="timeline">
        <div class="time-label">
            <span class="bg-red">10 Feb. 2014</span>
        </div>
        <div>
            <i class="fas fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                <div class="timeline-body">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                    <a class="btn btn-primary btn-sm">Read more</a>
                    <a class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
        <div>
            <i class="fas fa-user bg-green"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
            </div>
        </div>
        <div>
            <i class="fas fa-comments bg-yellow"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                <div class="timeline-body">
                Take me to your leader!
                Switzerland is small and neutral!
                We are more like Germany, ambitious and misunderstood!
                </div>
                <div class="timeline-footer">
                    <a class="btn btn-warning btn-sm">View comment</a>
                </div>
            </div>
        </div>
        <div class="time-label">
            <span class="bg-green">3 Jan. 2014</span>
        </div>
        <div>
            <i class="fa fa-camera bg-purple"></i>
            <div class="timeline-item">
                <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                <div class="timeline-body">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                    <img src="https://placehold.it/150x100" alt="...">
                </div>
            </div>
        </div>
        <div>
            <i class="fas fa-clock bg-gray"></i>
        </div>
    </div>
</div>
<!-- ----------------------------------------------------------------- -->

<a href="{{ route('cotRecPro-archivo') }}" ></a>
<script>
localStorage.setItem("sbd",0);
localStorage.setItem("sba",3);
$(document).ready( function () {
    // loadCotizacion();
    loadHistorial();
    showUsuario();
    $('.overlayPagina').css("display","none");
} );
function buscarHistorial()
{
    if($('.fechaHistorialLoad').val()=='')
        alert('elije una fecha');
    else
        loadHistorial()
}
function loadHistorial()
{
    jQuery.ajax({
        url: "{{ url('historial/load') }}",
        method: 'POST', 
        data: {idUsu:localStorage.getItem("idUsu"),fecha:$('.fechaHistorialLoad').val()},
        dataType: 'json',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function (r) {
            var html = '';
            $('.contenedorHistorial>.timeline>div').remove();
            if(r.his.length==0)
            {
                // alert('es = a 0');
                html = '<div class="alert alert-info w-100">'+
                    '<p class="m-0 font-weight-bold">El Cotizador no realizo ninguna accion '+$('.fechaHistorialLoad').val()+'</p>'+
                '</div>';
            }
            else
            {
                let opciones = '';
                let nombreUsu = '';

                html = '<div class="time-label">'+
                        '<span class="bg-red dia-historial">'+formatoDateHistorial(r.his[0].fecha)+'</span>'+
                    '</div>';
                
                // for (var i = 0; i < r.his.length; i++) 
                for (i = r.his.length-1; i>=0; i--) 
                {
                    nombreUsu = r.his[i].nombre+' '+r.his[i].apellidoPaterno;
                    html += '<div>'+
                        segunAccion(r.his[i].accion) +
                        '<div class="timeline-item">'+
                            '<span class="time"><i class="fas fa-clock"></i> '+formatoHoraHistorial(r.his[i].fecha)+'</span>'+
                            '<h3 class="timeline-header no-border"><a href="#"></a> '+r.his[i].accion+'</h3>'+
                            // '<h3 class="timeline-header no-border"><a href="#">'+nombreUsu+'</a> '+r.his[i].accion+'</h3>'+
                        '</div>'+
                    '</div>';
                }
                html += '<div>'+
                        '<i class="fas fa-home bg-gray"></i>'+
                    '</div>';
            }
            $('.contenedorHistorial>.timeline').append(html);
        },
        error: function (xhr, status, error) {
            console.log('salio un error');
        }
    });
}
function formatoHoraHistorial(fecha)
{
    var fecha = new Date(fecha);
    return fecha.toLocaleTimeString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true});
}
function segunAccion(accion)
{
    let icono = '<i class="fas fa-arrow-right bg-secondary"></i>';
    if (accion.includes("cotizacion")) icono='<i class="fas fa-chart-bar bg-green"></i>';
    if (accion.includes("recotizacion")) icono='<i class="fa fa-calendar-alt bg-info"></i>';
    if (accion.includes("proveedor")) icono='<i class="fas fa-building bg-primary"></i>';
    if (accion.includes("penalizo")) icono='<i class="fa fa-user-slash bg-danger"></i>';
    return icono;
}
function formatoDateHistorial(fecha)
{
    var fechaObjeto = new Date(fecha);

    var nombresDias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    var nombreDia = nombresDias[fechaObjeto.getDay()];
    var nombreMes = nombresMeses[fechaObjeto.getMonth()];

    var dia = fechaObjeto.getDate();
    var año = fechaObjeto.getFullYear();

    return nombreDia + ', ' + dia + ' de ' + nombreMes + ' de ' + año;
}
function showUsuario()
{
    jQuery.ajax(
    { 
        url: "{{ url('usuario/editar') }}",
        data: {id:localStorage.getItem("idUsu")},
        method: 'post',
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        success: function(r){
            fecha = new Date(r.data.fr);
            fechaFormat = `${fecha.getDate()} de ${obtenerNombreMes(fecha.getMonth() + 1)} de ${fecha.getFullYear()}`;
            $('.fechaRegistro').html('Fecha Registro: '+fechaFormat);
            console.log(r.data.dni)
            $('.dniUsu').html(novDato(r.data.dni));
            $('.nombreUsu').html(novDato(r.data.nombre));
            $('.apUsu').html(novDato(r.data.apellidoPaterno));
            $('.amUsu').html(novDato(r.data.apellidoMaterno));
            $('.tipo').html(novDato(r.data.tipo));
            $('.celular').html(novDato(r.data.celular));
            $('.correoUsu').html(novDato(r.data.correo));
            $('.usuario').html(novDato(r.data.usuario));
            // $('#efvusuario #estado').val(r.data.estado);
            // idUsu = r.data.idUsu;
            // $('#modalEditar').modal('show');
        }
    });
}
</script>
@endsection