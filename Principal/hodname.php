<?php
include "connection.php";
$output = '';
$sql = "SELECT * FROM HOD where Department = '".$_POST["countryId"]."' ORDER BY fname";
$result = mysqli_query($con,$sql);

//echo "<script>alert($c);</script>"; 
//$output = '<option value="">Select State</option>';
while($row = mysqli_fetch_array($result)){
    $output .= '<input class="form-control" value="'.$row["fname"].'">';
  //$output .= '$("#state").val('dfrefer')';
 // $output .= '< value="'.$row["Fname"].'">';
  //$v= $c.val('dew');
}
// echo $c.value = "kjkjhkj";  
echo $output;
?>