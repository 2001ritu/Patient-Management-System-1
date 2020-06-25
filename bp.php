 <?php
 
$limit = 10;
$y = 140;
$dataPoints1 = array();
for($i = 0; $i < $limit; $i++){
  $y += rand(0, 10); 
  array_push($dataPoints1, array("x" => $i, "y" => $y));
}

$limit = 10;
$y = 90;
$dataPoints2 = array();
for($i = 0; $i < $limit; $i++){
  $y += rand(0, 10); 
  array_push($dataPoints2, array("x" => $i, "y" => $y));
}

?>

 <div class="chart">
  <script src="../assets/demo/demo.js"></script>
  <div id="chartContainer" style="height: 400px; width: 90%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></div>
 
 <script>
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "Blood Pressure"
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  axisX: {
    title: "Time (hours)"
  },
  axisY: {
    title: "Pressure (mm-Hg)"
  },
  data: [{
    type: "column",
    name: "Systolic Pressure",
    indexLabel: "{y}",
    showInLegend: true,
    color: "teal",
    dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "Diastolic Pressure",
    indexLabel: "{y}",
    showInLegend: true,
    dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
 


</script>

<style type="text/css">
  .chart{
    margin-top:100px;
    margin-left: 50px;
  }

</style>
