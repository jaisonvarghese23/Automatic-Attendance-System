<?php
if(isset($_POST['button1']))
 {
  $query= " SELECT * FROM teachers WHERE Department='computer Science'";
  $result = mysqli_query($con,$query);
  $cs='blue';
 }
 elseif(isset($_POST['button2']))
 {
  $query= " SELECT * FROM teachers WHERE Department='Electrical and Electronics Engineering'";
  $result = mysqli_query($con,$query);
  $eee = 'blue';
 }
 elseif(isset($_POST['button3']))
 {
  $query= " SELECT * FROM teachers WHERE Department='Electronics Engineering'";
  $result = mysqli_query($con,$query);
  $ec = 'blue';
 }
 elseif(isset($_POST['button4']))
 {
  $query= " SELECT * FROM teachers WHERE Department='Information Technology'";
  $result = mysqli_query($con,$query);
  $it = 'blue';
 }
 elseif(isset($_POST['button5']))
 {
  $query= " SELECT * FROM teachers WHERE Department='Mechanical Engineering'";
  $result = mysqli_query($con,$query);
  $me = 'blue';
 }
 elseif(isset($_POST['All'])){
    $query= " SELECT * FROM teachers";
    $result = mysqli_query($con,$query);
    $all = 'blue';
    }
 
 else{
 $query= " SELECT * FROM teachers";
 $result = mysqli_query($con,$query);
 $all = 'blue';

 }
 ?>