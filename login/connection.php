<?php
$con = new mysqli("localhost","root","","attendance");
if($con->connect_error){
    die("Failed to connect :");
}