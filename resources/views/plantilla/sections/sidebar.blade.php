<style>
    .active-p{
        /*box-shadow: 1px 3px rgba(0,0,0,.5) !important;*/
        box-shadow: 0px 3px 6px rgb(23 162 184) !important;
    }
</style>
<aside class="main-sidebar sidebar-light-navy elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{asset('img/admin/funcionarios/icono.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SICO</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="https://whaticket.com/wp-content/uploads/2023/05/Consejos-para-enviar-presupuestos-o-cotizaciones-por-Whatsapp.jpg" class="img-circle elevation-2" alt="User Image"> -->
                <span class="text-info"><i class="fa fa-user-tie fa-2x"></i></span>
            </div>
            <div class="info">
                <a href="#" class="d-block text-uppercase">
                    Proveedor
                </a>
            </div>
        </div>
        <div class="form-inline" style="display: none;">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">COTIZACIONES</li>
                <!-- <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link sba2">
                        <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="{{url('panelAdm/paProveedor/datos')}}" class="nav-link sba3">
                        <i class="nav-icon fas fa-file"></i><p>Mis datos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('panelAdm/paProveedor/formatos')}}" class="nav-link sba6">
                        <i class="nav-icon fas fa-file"></i><p>Formatos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('panelAdm/paCotizacion/misCotizaciones')}}" class="nav-link sba4">
                        <i class="nav-icon fas fa-file"></i><p>Mis cotizaciones</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('panelAdm/paCotizacion/cotizacionesActivas')}}" class="nav-link sba5">
                        <i class="nav-icon fas fa-file"></i><p>Cotizaciones activas</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{url('proveedor')}}" class="nav-link sba6">
                        <i class="nav-icon fas fa-file"></i><p>Ayuda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('proveedor')}}" class="nav-link sba7">
                        <i class="nav-icon fas fa-file"></i><p>Instructivos</p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link logout">
                        <i class="nav-icon fas fa-sign-out-alt"></i><p>cerrar sesion</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<script>
    $('.logout').on('click',function(){
        Swal.fire({
            title: "Finalizar Sesion",
            text: "¿Esta seguro de cerrar sesion?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#28a745",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, cerrar sesion!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                $('.overlayPagina').css("display","flex");
                window.location.href = "{{url('loginProveedor/logoutPro')}}";
            }
        });
    });
</script>