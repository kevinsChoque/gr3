<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{asset('img/admin/funcionarios/icono.jpg')}}" alt="SICO" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                    {{
                        Session::has('usuario')?
                            Session::get('usuario')->tipo:
                            '--';
                    }}
                </a>
            </div>
        </div>
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('home/home')}}" class="nav-link sba2">
                        <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('postulaciones/ver')}}" class="nav-link sba7">
                        <i class="nav-icon fas fa-handshake"></i><p>Postulaciones</p>
                    </a>
                </li>
                @if(session()->get('usuario')->tipo=="administrador")
                <li class="nav-item">
                    <a href="{{url('usuario')}}" class="nav-link sba3">
                        <i class="nav-icon fas fa-users"></i><p>Usuarios</p>
                    </a>
                </li>
                @endif
                <li class="sbd1 nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Cotizaciones<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('cotizacion/registrar')}}" class="nav-link sba4">
                                <i class="far fa-file-alt nav-icon"></i><p>Registrar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('cotizacion/ver')}}" class="nav-link sba5">
                                <i class="fa fa-list nav-icon"></i><p>Listar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('proveedor')}}" class="nav-link sba6">
                        <i class="nav-icon fas fa-building"></i><p>Proveedor</p>
                    </a>
                </li>
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
                window.location.href = "{{url('login/logout')}}";
            }
        });
    });
</script>