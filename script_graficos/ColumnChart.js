google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(dibujarGraficocol2);

function dibujarGraficocol2() {
        //Esta es una solicitud para obtener los datos de data.php
    fetch('script_graficos/data_ColumnChart.php')
    .then(response=> response.json())
    .then(data =>{
                    //crear la tabla dataTable
                    var dataTable = google.visualization.arrayToDataTable(data);

                    //Opciones del grafico
                    var options = {
                    title: 'Cantidad de productos',
                    haxis: {title: 'Producto'},
                    vAxis: {title: 'Cantidad'},
                    legend: {position: 'none'},
                    bars: 'vertical',
                    colors: ['#4285f4'],
                    width: 600,
                    height: 400,

                    };

                    
                    //Dibujar el grafico
                    var chart = new google.visualization.ColumnChart(document.getElementById('graficoCol1'));

                    chart.draw(dataTable, options);
        
    })       
}