<?php
include "connection.php";
$output = '';
$sql = "SELECT * FROM Subject where Subject_name = '".$_POST["countryId"]."'";
$rt = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($rt))
                            {
                              $td = $row['Teacher_id'];
                            }
 $sql = "SELECT * FROM Teachers where Teacher_id = '$td'";
 $result = mysqli_query($con,$sql);                       
while($row = mysqli_fetch_array($result)){
    $output .= '<input name="old" class="form-control" value="'.$row["T_Name"].'">';
  //$output .= '$("#state").val('dfrefer')';
 // $output .= '< value="'.$row["Fname"].'">';
  //$v= $c.val('dew');
}
// echo $c.value = "kjkjhkj";  
echo $output;
?>