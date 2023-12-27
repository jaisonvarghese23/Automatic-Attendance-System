<?php
 session_start();
session_destroy();

header("Location:\AMP\login\login.php");
echo "<script>alert('logout successfully')</script>";

// if(isset($_POST('logout-btn'))){

//     // session_start();
//     session_destroy();
//     header("Location:\Mainproject\login\login.php");

// }


?>