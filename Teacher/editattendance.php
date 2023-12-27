<!DOCTYPE html>
<html lang="en">

<head>
<script src="assets/js/webcam.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <!-- <script src="assets/js/webcam1.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> 

 <?php
  session_start(); 
  $cs='';
  $p='';
  $d='';
 // $subjects='';
  $subjects=$_POST['subid'];
  $name= $_SESSION['uname2'];
  include "connection.php";
  $sql="SELECT * FROM teachers where Temail='$name'";
  $s=mysqli_query($con,$sql);
 while( $row=mysqli_fetch_assoc($s)){
  $id=$row['Teacher_id'];
  $department=$row['Department'];
 }
 $sql="SELECT * FROM student where current_Semester=0";
  $s2=mysqli_query($con,$sql);
 if(isset($_POST['submit1'])){
 $subjects=$_POST['subid'];
 $p=$_POST['period'];
 $d=$_POST['date1'];
 $sql="SELECT * FROM subject where Subject_id='$subjects'";
 $s1=mysqli_query($con,$sql);
 while( $row=mysqli_fetch_assoc($s1)){
  $cs=$row['semester'];
  $dept=$row['Department'];
  
 
 }
 $sql="SELECT * FROM attendance where Department='$dept' AND Subject_id='$subjects'AND period='$p' AND date2='$d' ";
  $s2=mysqli_query($con,$sql);
  $sql4="SELECT * FROM student where Department='$dept' AND current_Semester='$cs'";
  $s6=mysqli_query($con,$sql4);
 }
 
 if(isset($_POST['submit2'])){
  
 
  $peri=$p;
  $dd=$_POST['dates'];
  $code=$_POST['subject1'];
  $period=$_POST['period1'];
  $current=$_POST['current'];
  $query = "SELECT count(1) From student where Department='$department' AND current_Semester='$current'";
$c=mysqli_query($con,$query);
$row = mysqli_fetch_array($c);
$x= $row[0];
$query = "SELECT * From student where Department='$department' AND current_Semester='$current'";
$sd=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($sd)){
  $ktuid=$row['ktu_id'];
  $staf=$row['Teacher_id'];



for($i=0;$i<$x;$i++){
$ktu=$ktuid;
$ab=$_POST[$ktuid];
// $sql="INSERT INTO attendance(Subject_id,date2,period,ktu_id,present1,Department,staff) values('$code','$dd','$period','$ktu','$ab','$department','$staf')";

$sql="UPDATE attendance SET present1='$ab' where Subject_id='$code' AND period='$period' AND ktu_id='$ktu' AND date2='$dd' ";
$s4=mysqli_query($con,$sql);
break;
}
$flag=1;
}
if($flag==1){

  $_SESSION['status'] ='Attendance Records Updated successfully';
  $_SESSION['status_code'] = 'success';

}





 }
  ?> 
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Automated Attendance System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

   <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Attendance System</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i> 
</div>

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">
          <?php 
       
        echo $_SESSION['uname2'];
         ?>
        </span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo " ".$_SESSION['uname2']; ?></h6>
          <span>Staff Adviser</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
         <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  
  <li class="nav-item">
  <a class="nav-link collapsed"  href="student-register.php">
      <i class="bi bi-journal-text"></i><span>Register Students</span><i class="bi bi-chevron-right ms-auto"></i>
    </a>

 
  <li class="nav-item">
    <a class="nav-link collapsed"  href="students.php">
      <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
    </a>
   
    <li class="nav-item">
    <a class="nav-link collapsed"  href="take_attendance.php">
      <i class="bi bi-gem"></i><span>Take Attendance</span><i class="bi bi-chevron-right ms-auto"></i>
    </a>
    </li>
    <li>
    <a class="nav-link collapsed "  href="manual.php">
      <i class="bi bi-gem"></i><span>Take attendance Manually</span><i class="bi bi-chevron-right ms-auto"></i>
    </a>
  <li>
  <li>
        <a class="nav-link "  href="editattendance.php">
          <i class="bi bi-gem"></i><span>Edit attendance </span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
    <a class="nav-link collapsed"  href="subject _to_teachers.php">
      <i class="bi bi-gem"></i><span>Subject Assign</span><i class="bi bi-chevron-right ms-auto"></i>
    </a>
    <li>
    <a class="nav-link collapsed"  href="your_subject.php">
      <i class="bi bi-gem"></i><span>Yor Subject</span><i class="bi bi-chevron-right ms-auto"></i>
    </a>
  <li class="nav-heading">Pages</li> 

  <li class="nav-item">
    <a class="nav-link collapsed" href="completeprofile.php">
      <i class="bi bi-person"></i>
      <span>Edit Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="logout.php">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>LogOut</span>
    </a> 
   </li>

</ul>

</aside><!-- End Sidebar-->
  <!-- ======= Sidebar ======= -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Take Attendance Manually</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
          <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
      </nav>
      <br>
    </div><!-- End Page Title -->
    <form action="" method="POST">
<div class="col-lg-12">
  <div class="row">
  <div class="col-xxl-3 col-md-3">

  <select name="subid" class="form-select" onchange="hello()">
                     <option disabled="disabled" selected="selected" > Select Subject</option>
                     <?php 
                          $query="SELECT * from subject where Teacher_id='$id'";
                          $sq=mysqli_query($con,$query);
                          while($row=mysqli_fetch_assoc($sq)){
                           ?>
                                    <option value="<?php echo $row['Subject_id']?>"><?php echo $row['Subject_name']; ?></option>
                            <?php }?>  
                    </select>
  </div>
  <div class="col-xxl-3 col-md-3">
 
  <select name="period" class="form-select" >
                     <option disabled="disabled" selected="selected" > Select Period NO </option>
                    
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                    </select>
  </div>
  <div class="col-xxl-3 col-md-3">

<input type="date" class="form-control" name=date1>
</select>
</div>
<div class="col-xxl-3 col-md-3">

<input type="submit" name="submit1"  class="btn btn-primary btn-sm" onclick="dis();" value="Apply">
</div>
  </div>
</div>
    </form>
    <br>
    <hr>
    <form action="" method="POST">
      <!--  -->

      <div class="col-lg-12" >
  <div class="row">
  <div class="col-xxl-3 col-md-3">
  <input  name="subject1" type="text"  readonly class="form-control"  value=<?php echo $subjects; ?>>


  </div>
  <div class="col-xxl-3 col-md-3">
  <input  name="period1" type="text"  readonly class="form-control"  value=<?php echo $p; ?>>

  
  </div>
  <div class="col-xxl-3 col-md-3">
  <input  name="dates" type="text"  readonly class="form-control"  value=<?php echo $d; ?>>
  </div>
  <div style="display:none;" class="col-xxl-3 col-md-3">
  <input  name="current" type="text"  readonly class="form-control"  value=<?php echo $cs; ?>>

</div>
<div class="col-xxl-3 col-md-3">

</div>
  </div>
</div>
      <!--  -->
<br><br>
<div class="col-lg-12" id="vis"  >
 
  <?php
        while( $row=mysqli_fetch_assoc($s2)){
            
        

        ?>
         <div class="row">
        <div class="col-xxl-6 col-md-6">
         
        <input   type="text"  readonly class="form-control" value=<?php echo $row['ktu_id']; ?>>
        
        </div>
          <div class="col-xxl-6 col-md-6">
          <select name="<?php echo $row['ktu_id'];?>" class="form-select">
            <option value="<?php echo $row['present1'];?>"><?php echo $row['present1'];?></option>
            <?php
               $r=$row['present1'];
               if($r==0){
                $u=1;
               }
               else{
                $u=0;
               }
               ?>
            <option value="<?php echo $u ?>"><?php echo $u ?></option>
          </select>
          </div>

 
  </div>
  <br>
  <?php } ?> 

  <br>
 
  <input type="submit" name="submit2" class="btn btn-primary btn-sm" value="UPDATE"></div>
</form>

</div>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Automatic Attendance System</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="\AMP\login\js\sweet.js"></script>
  <?php
     if(isset($_SESSION['status']) && $_SESSION['status'] != '' )
     {
    
    ?>
    <script>swal({
          title: '<?php echo $_SESSION['status'];  ?>',
        icon: '<?php echo $_SESSION['status_code'];  ?>',
       // icon: "success";
        button: "OK",
    });
    </script>
    <?php
    unset($_SESSION['status']);
    }
    ?>
<script>
  function dis(){
document.getElementById('vis').style.display='block';
  }

</script>

 
</body>

</html>