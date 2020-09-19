<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Pilwe</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- datatble -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

  <!-- select2 -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/select2/css/select2.css') }}">
  <!-- jquery ui -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    .highcharts-figure, .highcharts-data-table table {
        /* min-width: 310px;  */
        /* max-width: 800px; */
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 5.2em;
        color: #555;
    }
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

  </style>
</head>
<body class="container">
<h1 class="text-center">Quick Count</h1>
<input type="hidden" id="continue" value="1"/>
<button class="btn btn-primary" onclick="realtime()" id="start_btn">Start</button>
<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
</body>
<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
function realtime() {
    var next_counting = $("#continue").val();
    
    if (next_counting == "1") {
        setInterval(() => {
            get_chart_data();
        }, <?=$system->limit_quick_count * 1000?>);    
    }
    
}

function get_chart_data() {
    var chart_data = [];

    $.ajax({
        url:"/quick/realtime",
        type:"get",
        datatype:"json",
        success:function(data){
            var result = JSON.parse(data);
            var next_counting = result.continue;
            chart_data = result.chart;
            
            // set continue
            $("#continue").val(next_counting);
            
            if (next_counting) {
                 // Create the chart
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Hasil Perolehan Suara Pemilihan Ketua RW 004'
                    },
                    subtitle: {
                        text: ''
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Total Pemilih'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:f}',
                                style: {
                                    fontSize:18,
                                    fontWeight:"bold",
                                }
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b><br/>'
                    },

                    series: [
                        {
                            name: "Total Suara",
                            colorByPoint: true,
                            data: chart_data,
                            style:{
                                fontSize: 20,
                                fontWeight:"bold",
                            }
                        }
                    ],
                });
            }else {
                // hide tombol start
                $("#start_btn").addClass("d-none");
            }
            
           
        }
    });
    
        
    }
</script>

