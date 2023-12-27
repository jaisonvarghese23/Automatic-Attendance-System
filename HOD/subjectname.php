<?php
session_start();
include "connection.php";
$output = '';
$uname= $_SESSION['uname2'];
 $query="SELECT Department from hod where email1 = '$uname'";
 $rt=mysqli_query($con,$query);
 while($row = mysqli_fetch_assoc($rt))
        {
          $Department = $row['Department'];
        }
$sql = "SELECT * FROM subject where semester = '".$_POST["countryId"]."' AND Department = '$Department'  ORDER BY Subject_name";
$result = mysqli_query($con,$sql);

//echo "<script>alert($c);</script>"; 
//$output = '<option value="">Select State</option>';
$output .= '<select name=subject class="form-control">';
while($row = mysqli_fetch_assoc($result)){
    $output .= '
                <option value="'.$row["Subject_name"].'">'.$row["Subject_name"].'</option>
                ';
  //$output .= '$("#state").val('dfrefer')';
 // $output .= '< value="'.$row["Fname"].'">';
  //$v= $c.val('dew');
}
$output .= '</select>';
// echo $c.value = "kjkjhkj";  
echo $output;
?>