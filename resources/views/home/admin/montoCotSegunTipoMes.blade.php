<script>
    var dataMontoCotSegunTipoMes = {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
        datasets: [
            {
                label: 'Servicios',
                data: [0, 0, 0, 0, 0, 0], 
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Bienes',
                data: [0, 0, 0, 0, 0, 0], 
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }
        ]
    };
    var opcMontoCotSegunTipoMes = {
        scales: {
            y: {beginAtZero: true}
        },
        plugins: {
            title: {
                display: true,
                text: 'Cant de cotizaciones Segun el tipo por mes ',
                font: {size: 16}
            }
        }
    };
    var graficoMontoCotSegunTipoMes = new Chart(document.getElementById('montoCotSegunTipoMes').getContext('2d'), 
    {
        type: 'bar',
        data: dataMontoCotSegunTipoMes,
        options: opcMontoCotSegunTipoMes
    });
    $('.updateMontoCotSegunTipoMes').on('click',function(){
        montoCotSegunTipoMes();
    });
    function loadMontoCotSegunTipoMes()
    {
        if(localStorage.getItem("montoCotSegunTipoMes") === null)
            montoCotSegunTipoMes();
        else
        {
            var r = JSON.parse(localStorage.getItem("montoCotSegunTipoMes"));
            diagramaMontoCotSegunTipoMes(r);
        }
    }
    function diagramaMontoCotSegunTipoMes(r)
    {
        graficoMontoCotSegunTipoMes.data = r;
        graficoMontoCotSegunTipoMes.update();
        $('.overlayMontoCotSegunTipoMes').css('display','none');
    }
    function montoCotSegunTipoMes()
    {
        $('.overlayMontoCotSegunTipoMes').css('display','flex');
        jQuery.ajax(
        { 
            url: "{{ url('homeAdmin/montoCotSegunTipoMes') }}",
            method: 'get',
            dataType: 'json',
            success: function(r){
                localStorage.setItem("montoCotSegunTipoMes",JSON.stringify(r));
                diagramaMontoCotSegunTipoMes(r);
            },
            error: function (xhr, status, error) {
                msjError("Algo salio mal, porfavor contactese con el Administrador.");
            }
        });
    }
</script>