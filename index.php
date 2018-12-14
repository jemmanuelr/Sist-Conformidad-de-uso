<?php include '_seciones.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
<?php include ('_headbasic.php'); ?>
  <style type="text/css">/* Chart.js */
    @-webkit-keyframes chartjs-render-animation{
      from{opacity:0.99}to{opacity:1}
    }
    @keyframes chartjs-render-animation{
      from{opacity:0.99}to{opacity:1}
    }
    .chartjs-render-monitor{
      -webkit-animation:chartjs-render-animation 0.001s;
      animation:chartjs-render-animation 0.001s;
    }
  </style>
</head>
<body>

<?php
  include '_nav.php';
?>

<br>

<div class="container">
  <main role="main" class="col-md-auto ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <center>
        <h1 class="h1">Sistema de Registro y Control de<br>CONFORMIDADES DE USO</h1>
    </center>
  </div>
      <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
          <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0">
          </div>
        </div>
        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
          <div style="position:absolute;width:200%;height:200%;left:0; top:0">
          </div>
        </div>
      </div>
      <canvas class="my-4 w-100 chartjs-render-monitor" id="myChart" width="791" height="333" style="display: block; width: 791px; height: 333px;">
      </canvas>
  </main>
</div>
<!-- Graphs -->
    <script src="cont/chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
          datasets: [{
            data: [345, 483, 303, 489, 192, 339, 345, 483, 103, 489, 492, 350],
            lineTension: 0.3,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 2,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
</body>
</html>


