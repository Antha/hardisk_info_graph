<!DOCTYPE html>
<html>
<head>
  <title>Hardisk Info</title>
</head>
<body>
  <div id="graph-modal"></div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
  $.ajax({
    type:"POST",
    url:"graphics_json.php",
    data:{},
    beforeSend:function(){
   
    },
    success:function(data){
    var dataParsed = JSON.parse(data);
    CATEGORIES = dataParsed.DATETIME;
    DATA = [{ name: "LOCAL DISK (C)", data: dataParsed.SIZE, color: "aqua",yAxis:1},
            { name: "LOCAL DISK (D)", data: dataParsed.SIZE2, color: "green",yAxis:2}];
    
    //getGraphV2('graph-modal',CATEGORIES,DATA);
    viewHighChart('graph-modal',CATEGORIES,DATA,'Site','spline');
    }});

    function viewHighChart(idarea,CATEGORIES,DATA){
      Highcharts.setOptions({
        lang: {
          decimalPoint: ',',
          thousandsSep: '.'
        }
      });

      Highcharts.chart(idarea, {
        title: {
            text: 'Daily Free Space Of Hardisk Size'
        },

        subtitle: {
            text: 'Made By SIT'
        },

        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}°C',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            title: {
                text: 'Temperature',
                style: {
                    color: Highcharts.getOptions().colors[2]
                }
            },
            opposite: true

        }, { // Secondary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Rainfall',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} mm',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            }

        }, { // Tertiary yAxis
            gridLineWidth: 0,
            title: {
                text: 'Sea-Level Pressure',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            labels: {
                format: '{value} mb',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            opposite: true
        }],

        xAxis: {
            categories: CATEGORIES
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
               
            }
        },

        plotOptions: {
          series: {
              dataLabels: {
                  enabled: true,
                  format: '{y} MB'
              }
          }
        },

        series: DATA,
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    }
    
</script>