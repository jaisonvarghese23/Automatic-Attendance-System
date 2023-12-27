<?php
include "connection.php";
$filename = time() . 'jpeg';
$filepath = 'images/';
if(isset($_FILES["webcam"])){
    move_uploaded_file($_FILES["webcam"]["temp_name"], $filepath.$filename);



}

?>