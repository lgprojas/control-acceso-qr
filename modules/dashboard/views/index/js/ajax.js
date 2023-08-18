$(document).ready(function(){
    
    
    getCantMovPorMes();
    cargarDatosGraficoPie();

    $("#fchMov").change(function(){
        getCantMovPorMes();
    });
    
    $("#fchPie").change(function(){
        cargarDatosGraficoPie();
    });
    
    $("#mesPie").change(function(){
        cargarDatosGraficoPie();
    });
    
    function getCantMovPorMes(){      
        
        var fchc = $("#fchMov").val();
        
                    $.ajax({
                            type: "POST",
                            url: _root_ + 'dashboard/index/getCantMovPorMes',
                            data: {
                                fch:fchc
                            }
                    }).done(function(resp){
                        if(resp.length>0){
                            var titulo = [];
                            var cantidad = [];
                            var colores = [];
                            var data = JSON.parse(resp);
                            for(i=0;i<data.length;i++){
                                titulo.push(data[i][0]);
                                cantidad.push(data[i][1]);
                                colores.push(colorRGB());
                            }
                            
                            crearGrafico(titulo,
                                         cantidad,
                                         colores,
                                         'bar',
                                         'Mov/Mes',
                                         'graficobar'
                                        );
                        }
                    }); 
    };
    

    
    function cargarDatosGraficoPie(){      
        
            var fchpie = $("#fchPie").val();
            var mespie = $("#mesPie").val();
        
                    $.ajax({
                            type: "POST",
                            url: _root_ + 'dashboard/index/getMovs',
                            data: {
                                fch:fchpie,
                                mes:mespie
                            }
                    }).done(function(resp){
                        if(resp.length>0){
                            var cant1 = [];
                            var cant2 = [];
                            var cant3 = [];
                            var cant4 = [];
                            var cant5 = [];
                            var cant6 = [];
                            var colores = [];
                            var data = JSON.parse(resp);
                            for(i=0;i<data.length;i++){
                                cant1.push(data[i][0]);
                                cant2.push(data[i][1]);
                                cant3.push(data[i][2]);
                                cant4.push(data[i][3]);
                                cant5.push(data[i][4]);
                                cant6.push(data[i][5]);
                            }
                            
                            crearGraficoPie(   cant1,
                                               cant2,
                                               cant3,
                                               cant4,
                                               cant5,
                                               cant6,
                                               'pie',
                                               'Mall',
                                               'Sodimac',
                                               'Inacesa',
                                               'Samsung',
                                               'Farmacia',
                                               'Cowork',
                                               'graficopie',
                                               
                                               );
                            
                        }
                    }); 
    };

    function crearGrafico(titulo,cantidad,colores,tipo,encabezado,id){

        if (window.myChart) {//Actualizamos gráfico
            window.myChart.clear();
            window.myChart.destroy();
        }
    

        var myPieGraph = document.getElementById(id);
        var ctx = myPieGraph.getContext('2d');   
        
        //crear variable global única por cada gráfico
        window.myChart = new Chart(ctx, {
            plugins: [ChartDataLabels],
            type: tipo,
            data: {
                labels: titulo,
                datasets:[{
                        label: encabezado,
                        data: cantidad,
                        backgroundColor: colores,
                        borderColor: colores,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    /* Formato del texto valor */
                    datalabels: {
                      anchor: "end", //start, center, end
                      color: '#000000',
                      display: function(context) {//muestra sólo valores >0
                              return context.dataset.data[context.dataIndex] > 0; // or >= 1 or ...
                            },
                      formatter: (value) => {
                              return value > 0 ? value + '%' : '';
                            },
                      font: {
                              family: '"Times New Roman", Times, serif',
                              size: "10",
                              weight: "bold",
                            },
                      /* Formato de la caja contenedora valor*/
                      backgroundColor: "white",
                      padding: "3", 
                      borderWidth: 1,
                      borderColor: "#E5E4E4",
                      borderRadius: 9,
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
                        
            }

        });   

    }
    
    //Gráfico de Pie
    function crearGraficoPie(   cant1,
                                cant2,
                                cant3,
                                cant4,
                                cant5,
                                cant6,
                                tipo,
                                encabezado1,
                                encabezado2,
                                encabezado3,
                                encabezado4,
                                encabezado5,
                                encabezado6,                               
                                id
                                ){
                            
        if (window.myChartPie) {//Actualizamos gráfico con variable global
            window.myChartPie.clear();
            window.myChartPie.destroy();
        }                    
                            
        var myPieGraph = document.getElementById(id);
        var ctx = myPieGraph.getContext('2d');   

        //crear variable global única por cada gráfico
        window.myChartPie = new Chart(ctx, {
            plugins: [ChartDataLabels],
            type: tipo,
            data: {
                labels: [
                        encabezado1,
                        encabezado2,
                        encabezado3,
                        encabezado4,
                        encabezado5,
                        encabezado6
                        ],
                datasets: [
                        {
                            
                            data: [
                                cant1,
                                cant2,
                                cant3,
                                cant4,
                                cant5,
                                cant6
                            ],
                            backgroundColor: [
                                colorRGB(),
                                colorRGB(),
                                colorRGB(),
                                colorRGB(),
                                colorRGB(),
                                colorRGB()
                            ]
                        }]
  
            },
            options: {
                plugins: {
                    /* Formato del texto valor */
                    datalabels: {
                      anchor: "end", //start, center, end
                      color: '#000000',
                      display: function(context) {//muestra sólo valores >0
                              return context.dataset.data[context.dataIndex] > 0; // or >= 1 or ...
                            },
                      formatter: (value) => {
                              return value > 0 ? value + '%' : '';
                            },
                      font: {
                              family: '"Times New Roman", Times, serif',
                              size: "10",
                              weight: "bold",
                            },
                      /* Formato de la caja contenedora valor*/
                      backgroundColor: "white",
                      padding: "3", 
                      borderWidth: 1,
                      borderColor: "#E5E4E4",
                      borderRadius: 9,
                    }
                }
            }   

        });   

    }
    
    function generarNumero(numero){
        return (Math.random()*numero).toFixed(0);
    }
    
    function colorRGB(){
        var color = "("+generarNumero(255)+","+generarNumero(255)+","+generarNumero(255)+")";
        return "rgb" + color;
    }
});