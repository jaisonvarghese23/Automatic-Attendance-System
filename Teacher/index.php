<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  session_start(); 
  include "connection.php";
  $uname= $_SESSION['uname2'];
  

    

    if(isset($_POST['submit'])){

   $from=$_POST['from'];
   $to=$_POST['to'];
   

    }
    if(isset($_POST['submit2'])){

     $subjects=$_POST['sub'];
     $query="SELECT * from Subject where Subject_name = '$subjects' ";
     $rt=mysqli_query($con,$query);
     while($row = mysqli_fetch_assoc($rt))
       {
         $sem = $row['semester'];
         $sname= $row['Subject_name'];
         $Department= $row['Department'];
         $sid= $row['Subject_id'];
       }
 
      $query="SELECT * from Student where Department = '$Department' AND current_Semester='$sem' ";
      $stud=mysqli_query($con,$query);
      $rty=mysqli_query($con,$query);
      
   
       }
       else{

$query="SELECT * from teachers where Temail = '$uname' ";
  $rt=mysqli_query($con,$query);
  while($row = mysqli_fetch_assoc($rt))
    {
      $id = $row['Teacher_id'];
    }
    $query="SELECT * from Subject where Teacher_id = '$id' ";
    $rt=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($rt))
      {
        $sem = $row['semester'];
        $sname= $row['Subject_name'];
        $Department= $row['Department'];
        $sid= $row['Subject_id'];
      }

     $query="SELECT * from Student where Department = '$Department' AND current_Semester='$sem' ";
     $stud=mysqli_query($con,$query);
     $rty=mysqli_query($con,$query);
     
    




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
          <span>Teacher</span>
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
    <a class="nav-link  " href="index.php">
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
    <li class="nav-item">
        <a class="nav-link collapsed"  href="take_attendance.php">
          <i class="bi bi-gem"></i><span>Take Attendance</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        </li>
        <li>
        <a class="nav-link collapsed"  href="manual.php">
          <i class="bi bi-gem"></i><span>Take attendance Manually</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li>
        <a class="nav-link collapsed"  href="editattendance.php">
          <i class="bi bi-gem"></i><span>Edit attendance </span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li>
  
    <a class="nav-link collapsed"  href="your_subject.php">
      <i class="bi bi-gem"></i><span>Your Subject</span><i class="bi bi-chevron-right ms-auto"></i>
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
  <main id="main" class="main">
  <div class="pagetitle">
      <h1><?php echo $sname ?></h1>
      <br>
      <form action="" method="POST">
      <nav class="col-xxl-6 col-md-4">
      <div class="d-flex align-items-center">
        <ol class="breadcrumb">  
        </ol>
        
        <select name="sub"class="form-select">
        <option disabled="disabled" selected="selected" >Change Subject</option>
          <?php
            $uname= $_SESSION['uname2'];
            $query="SELECT * from teachers where Temail = '$uname' ";
            $rt=mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($rt))
              {
                $id = $row['Teacher_id'];
               
               
              }
              $q="SELECT * FROM subject where Teacher_id='$id'";
              $re=mysqli_query($con,$q);
              while($row=mysqli_fetch_assoc($re)){
          ?>
         
      <option value="<?php echo $row['Subject_name'] ?>"><?php echo $row['Subject_name'] ?></option>
      <?php
              }
              ?>
      &nbsp;&nbsp; <input style="margin-left: 10px;"  type="submit"  name="submit2" class="btn btn-primary" value="Change"></h6>
    </select>
    </form>
      </div>
      </nav>
     
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">

        <!-- right side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Today Attendance</span></h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="ps-3">
                      <h6>5</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">This Week Attendance</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6><?php
                      
                      $uname= $_SESSION['uname2'];
                      $query="SELECT * from teachers where Temail = '$uname' ";
                      $rt=mysqli_query($con,$query);
                      while($row = mysqli_fetch_assoc($rt))
                        {
                          $id = $row['Teacher_id'];
                         
                         
                        }
                     
                        $query = "SELECT count(1) From attendance where Subject_id='$sid' AND present1=1";
                        $c=mysqli_query($con,$query);
                        $query = "SELECT count(1) From attendance where Subject_id='$sid'";
                        $cp=mysqli_query($con,$query);
                        $row = mysqli_fetch_array($c);
                        $row1 = mysqli_fetch_array($cp);
                        echo $row[0];
                        echo "/";
                        echo $row1[0];
                      ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">This Semsester Attendance</span></h5>

                  <div class="d-flex align-items-center">
                    
                    <div class="ps-3">
                      <h6> <?php echo $row[0];
                        echo "/";
                        echo $row1[0];
                      ?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
        

        </div>
        <div class="row">
        <form action="" method="POST">
            <div class="col-12">
            <!-- <label  class="col-form-label">Showing &nbsp;</label> <input type="number" value=10 class="col-form-label" style="width:1.5cm" min=1 max=30><label  class="col-form-label">&nbsp;Entries </label> -->
<span style="float:right"><label  class="col-form-label">From &nbsp;</label><input type="date" name="from" class="col-form-label" name="from" id="from">
<label  class="col-form-label">To &nbsp;</label><input type="date"  name="to" class="col-form-label"name="from" id="from">&nbsp;
<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Apply">
</div>
</span>
</form>
<br>
<br>

<div class="col-12">



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Attendance</h5>

      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">Name</th>
            <th scope="col">Semester</th>
            <?php 
             if(isset($_POST['submit'])){
              $from=$_POST['from'];
              $to=$_POST['to'];
            $wp="SELECT  * from attendance where  date2 BETWEEN '$from' AND '$to' AND Subject_id='$sid GROUP BY date2 ";
            $sq=mysqli_query($con,$wp);
             }
             else{
              $wp="SELECT  * from attendance where Subject_id='$sid' GROUP BY date2 ";
              $sq=mysqli_query($con,$wp);
             }
       
            while($row2 = mysqli_fetch_assoc($sq))
                {
                  ?>
            <th scope="col"><?php echo $row2['date2'];?></th>
                <?php }?>
          </tr>
        </thead>
        <tr>
        <?php
        
                while($row = mysqli_fetch_assoc($rty))
                {
                  $ktu = $row['ktu_id'];
                  $query="SELECT * from Student where Ktu_id='$ktu'";
                  $w=mysqli_query($con,$query);
                  $r= mysqli_fetch_assoc($w);
                  ?>
                  <td><?php echo $r['fname'];?></td>
                  <td><?php echo $r['current_Semester'];?></td>
                <?php
            //  $query="SELECT attendance.*,student.* from attendance,student where student.Department = '$Department' AND student.current_Semester='$sem' ";
            if(isset($_POST['submit'])){

              $from=$_POST['from'];
              $to=$_POST['to'];
             
               $query="SELECT * from attendance where  date2 BETWEEN '$from' AND '$to' AND Department='$Department' AND Subject_id='$sid' AND ktu_id='$ktu'";
                         $rt=mysqli_query($con,$query);
                          $a=mysqli_query($con,$query);
           
               }
               else{
              $query="SELECT * from attendance where Department='$Department' AND Subject_id='$sid' AND ktu_id='$ktu'";
              $rt=mysqli_query($con,$query);
               $a=mysqli_query($con,$query);
               }
                  while($row1 = mysqli_fetch_assoc($a) ) 
                  {
                    
                    ?>
                    
                   <td><?php echo $row1['present1'];?></td>
                   <?php

                  
}

?>
                  </tr>
                  <?php

                  
}

?>       
      </table>
      <table class="table table-striped">
        <thead>
          <tr>
            <!-- <?php
           
          while($row = mysqli_fetch_assoc($rt) ) 
                  {
                    ?>
                    <th><?php echo $row['date2'];?></th>
                    <?php

                  
}

?>  </tr> -->
                  
        </thead>
       
                   
      </table>
      <!-- End Table with stripped rows -->

    </div>
</div>
</div>
    </section>
   </main>

 

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
</body>

</html>