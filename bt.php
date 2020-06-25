 <?php
 
$limit = 10;
$y = 100;
$dataPoints = array();
for($i = 0; $i < $limit; $i++){
  $y += rand(0, 20)-5; 
  array_push($dataPoints, array("x" => $i, "y" => $y));
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
    text: "body temperature Level"
  },
  axisY: {
    title: "bt %"
  },
   axisX: {
    title: "Time (hours)"
  },
  data: [{
    type: "column",
    name: "Body temperature",
    indexLabel: "{y}",
    showInLegend: true,
    color: "#008080",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();


</script>

<style type="text/css">
  .chart{
    margin-top:100px;
    margin-left: 50px;
  }

</style>
