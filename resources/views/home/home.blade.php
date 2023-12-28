@extends('layout.layout')
@section('nombreContenido', '----')
@section('cabecera')
<div class="main-header p-1">
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-12 m-auto">
            <h6 class="my-0 ml-3">--</h6>
        </div>
        <div class="col-lg-6 col-sm-6 col-12">
            <button class="btn btn-sm btn-success float-right btnPmsRegistrar" data-toggle="modal" data-target="#modalRegistrar" style="display: none;">
                <i class="fa fa-plus"></i> 
                Nuevo registro
            </button>
        </div>
    </div>
</div>
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container-fluid mt-3">
    <!-- <div class="row">
        <h1 class="text-center text-uppercase font-weight-bold font-italic">Dashboard segun usuario</h1>
    </div> -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">cant proveedores</span>
                    <span class="info-box-number">10</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">cant de cotizadores</span>
                    <span class="info-box-number">10</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">cant de cot de bienes</span>
                    <span class="info-box-number">10</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">cant de cot de servicios</span>
                    <span class="info-box-number">10</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%;">
                        <canvas id="miGrafico"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%;">
                        <canvas id="miGrafico2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%;">
                        <canvas id="miGrafico3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>
<script>
    localStorage.setItem("sbd",0);
    localStorage.setItem("sba",2);
    $(document).ready( function () {
        $('.overlayPagina').css("display","none");
        $('.overlayRegistros').css("display","none");
    });
</script>
<script>
    // Datos para el gráfico
    var datos = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
        datasets: [
            {
                label: 'Servicios',
                data: [1000, 1500, 800, 1200, 2000, 1700], // Monto para servicios por mes
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Bienes',
                data: [800, 1200, 600, 1000, 1500, 1300], // Monto para bienes por mes
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }
        ]
    };

    // Configuración del gráfico
    var opciones = {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                // text: 'Monto de Cotizaciones por Mes',
                text: 'Monto de cotizaciones Segun el tipo por mes',
                font: {
                    size: 16
                }
            }
        }
    };

    // Crear el gráfico de barras
    $(document).ready(function() {
        var ctx = document.getElementById('miGrafico').getContext('2d');
        var miGrafico = new Chart(ctx, {
            type: 'bar',
            data: datos,
            options: opciones
        });
    });
</script>
<script>
    // Datos para el gráfico
    var datos2 = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
        datasets: [
            {
                label: 'Servicios',
                data: [142, 12, 50, 11, 211, 170], // Monto para servicios por mes
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Bienes',
                data: [80, 25, 100, 100, 102, 109], // Monto para bienes por mes
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }
        ]
    };

    // Configuración del gráfico
    var opciones2 = {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                // text: 'Monto de Cotizaciones por Mes',
                text: 'Cant de cotizaciones Segun el tipo por mes',
                font: {
                    size: 16
                }
            }
        }
    };

    // Crear el gráfico de barras
    $(document).ready(function() {
        var ctx = document.getElementById('miGrafico2').getContext('2d');
        var miGrafico2 = new Chart(ctx, {
            type: 'bar',
            data: datos2,
            options: opciones2
        });
    });
</script>
<script>
        // Datos para el gráfico de rosquilla
        var datosDoughnut = {
            labels: ['En proceso', 'Publicado', 'Finalizado', 'Recotizando'],
            datasets: [
                {
                    data: [65, 35, 33, 11], // Porcentajes de cotizaciones para servicios y bienes
                    backgroundColor: ['rgba(255, 99, 132, 0.5)', 
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(66, 99, 132, 0.5)',
                        'rgba(34, 99, 1, 0.5)'
                    ],
                    borderColor: ['rgba(255, 99, 132, 1)', 
                        'rgba(54, 162, 235, 1)',
                        'rgba(66, 99, 132, 0.5)',
                        'rgba(34, 99, 1, 0.5)'
                    ],
                    borderWidth: 1
                }
            ]
        };

        // Configuración del gráfico de rosquilla
        var opcionesDoughnut = {
            plugins: {
                title: {
                    display: true,
                    text: 'Cantidad de cotizaciones por estado y mes',
                    font: {
                        size: 16
                    }
                }
            }
        };

        // Crear el gráfico de rosquilla
        $(document).ready(function() {
            var ctxDoughnut = document.getElementById('miGrafico3').getContext('2d');
            var miGraficoDoughnut = new Chart(ctxDoughnut, {
                type: 'doughnut',
                data: datosDoughnut,
                options: opcionesDoughnut
            });
        });
    </script>
@endsection