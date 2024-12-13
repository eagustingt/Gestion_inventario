google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(dibujarGraficocol2);

function dibujarGraficocol2() {
        //Esta es una solicitud para obtener los datos de data.php
    fetch('script_graficos/data_ColumnChart2.php')
    .then(response=> response.json())
    .then(data =>{
                    //crear la tabla dataTable
                    var dataTable = google.visualization.arrayToDataTable(data);

                    //Opciones del grafico
                    var options = {
                    title: 'Costo de Productos por Categorias',
                    haxis: {title: 'Producto'},
                    vAxis: {title: 'Quetzales'},
                    legend: {position: 'none'},
                    bars: 'vertical',
                    colors: ['#33FF80'],
                    width: 600,
                    height: 400,

                    };

                    
                    //Dibujar el grafico
                    var chart = new google.visualization.ColumnChart(document.getElementById('graficoCol2'));

                    chart.draw(dataTable, options);
        
    })       
}