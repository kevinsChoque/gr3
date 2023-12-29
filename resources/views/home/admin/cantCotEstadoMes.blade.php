<script>
function cantCotEstadoMes()
{
    jQuery.ajax(
    { 
        url: "{{ url('homeAdmin/cantCotEstadoMes') }}",
        method: 'get',
        dataType: 'json',
        success: function(r){
            console.log(r)
            // Configuración del gráfico de rosquilla
            var opcionesDoughnut = {
                plugins: {
                    title: {
                        display: true,
                        text: 'Cotizaciones por estado, en el ultimo mes',
                        // text: 'Cantidad de cotizaciones por estado y mes',
                        font: {
                            size: 16
                        }
                    }
                }
            };

            // Crear el gráfico de rosquilla
            $(document).ready(function() {
                var ctxDoughnut = document.getElementById('cantCotEstadoMes').getContext('2d');
                var miGraficoDoughnut = new Chart(ctxDoughnut, {
                    type: 'doughnut',
                    data: r,
                    options: opcionesDoughnut
                });
            });
        },
        error: function (xhr, status, error) {
            msjError("Algo salio mal, porfavor contactese con el Administrador.");
        }
    });
}
</script>