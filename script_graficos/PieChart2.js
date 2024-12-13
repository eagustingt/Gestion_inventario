google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(dibujarGrafico3);

function dibujarGrafico3() {
        //Esta es una solicitud para obtener los datos de data.php
    fetch('script_graficos/data_PieChart2.php')
    .then(response=> response.json())
    .then(data =>{
                    //crear la tabla dataTable
                    var dataTable = google.visualization.arrayToDataTable(data);

                    //Opciones del grafico
                    var options = {
                    title: 'Costo de productos por Proveedor',
                    width: 600,
                    height: 400,
                    pieHole: 0.4,
                    };

                    
                    //Dibujar el grafico
                    var chart = new google.visualization.PieChart(document.getElementById('graficoPie2'));

                    chart.draw(dataTable, options);
        
    })       
}