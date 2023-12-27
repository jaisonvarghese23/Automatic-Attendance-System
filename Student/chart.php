<?php

include "connection.php";
$j=0;
$k=1;
$ktu='LIDK19IT065';
$id='EC301';
//while($j<=$k){
  
$query="SELECT count(*) as present_absent_count,present1,
         case
           when present1 = 1 then 'present'
           when present1 = 0 then 'absent' 
           end as present1 FROM attendance where ktu_id='LIDK19IT065' AND Subject_id='EC302' GROUP BY present1;";
$result= mysqli_query($con,$query);
$i=0;
while($row = mysqli_fetch_array($result)){
    // echo "<pre>";
    // print_r($row);
    $label[$i] = $row["present1"];
    $count[$i] = $row["present_absent_count"];
    $i++;
}
$count[] = 3;
$j++;
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['attendance','Number'],
  ['<?php echo $label[0];?>',<?php echo $count[0];?>],
  ['<?php echo $label[1];?>',<?php echo $count[1];?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'My Average Day',legend:'none',slices:{0:{color:'#666666'},1:{color:'#006EFF'}}};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}



    </script>
</head>
<body>
 <div id="piechart"></div>   
 <div id="piechart"></div>  
</body>
</html>