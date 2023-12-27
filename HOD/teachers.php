<!DOCTYPE html>
<html lang="en">

<head>
<?php
session_start();
 include "connection.php";
 $name= $_SESSION['uname2'];
                       $query="SELECT Department from HOD where email1 = '$name'";
                       $rt=mysqli_query($con,$query);
                       while($row = mysqli_fetch_assoc($rt))
                         {
                           $Department = $row['Department'];
                         }
 $query= " SELECT * FROM teachers WHERE Department='$Department'";
  $result = mysqli_query($con,$query);



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

<body >

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
<?php
        $query = " select * from Principal ";
$r = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($r)) {
?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="./image/<?php echo $data['images']; ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php 
           
            echo $_SESSION['uname2'];
}
             ?>
            </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo " ".$_SESSION['uname2']; ?></h6>
              <span>Principal</span>
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
        <a class="nav-link collapsed "  href="hod_register.php">
          <i class="bi bi-journal-text"></i><span>Register HOD</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link"  href="teachers.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Faculty</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed"  href="students.php">
          <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="programs.php">
          <i class="bi bi-gem"></i><span>Programs & Courses </span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-heading">Pages</li> 

      <li class="nav-item">
        <a class="nav-link collapsed" href="completeprofile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

      
      <!-- <form method="POST" action="logout.php" onsubmit="return submitForm(this);">
	<button class="nav-link collapsed" type="submit" ><span>LogOut</span></button>
</form> -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>LogOut</span>
        </a> 
       </li>
       <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>LogOut</span>
        </a> 
       </li>


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <!-- <div class="pagetitle">
      <h1>Lecturers</h1>
      <nav>
        <ol class="breadcrumb">
        
        </ol>
      </nav>
    </div>End Page Title -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-l2">
          <div class="row">
          <div class="card">

<div class="filter">
  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
    <li class="dropdown-header text-start">
      <h6>Filter</h6>
    </li>
    <form action="" method="POST">
    <li><button type="submit" name="All" class="dropdown-item" style="color:<?php echo $all ;?>">All Department</button></li>
      <li><button type="submit" name="button1" id="jai" value ="computer Science" class="dropdown-item" style="color:<?php echo $cs ;?>">Computer Science</button></li>
    <li><input type="submit" name="button2" value ="Electrical and electronics Engineering" class="dropdown-item" style="color:<?php echo $eee ;?>"></li>
    <li><input type="submit" name="button3" class="dropdown-item" value="Electronics Engineering" style="color:<?php echo $ec ;?>"></li>
    <li><input type="submit" name="button4" value="Information Technology" class="dropdown-item" style="color:<?php echo $it ;?>"></li>
    <li><input type="submit" name="button5" value ="Mechanical Engineering" class="dropdown-item" style="color:<?php echo $me ;?>"></li>
      </forrm>
  </ul>
</div>
      <br><br><br>
      <div class="row">

        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title" >Lecturers</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php
                  while($row = mysqli_fetch_assoc($result))
                  {
                    ?>
                     <!-- <th scope="row"><?php echo $row['Teacher_id']; ?></th> -->
                    <td><?php echo $row['T_Name'];?></td>
                    <td><?php echo $row['Department'];?></td>
                    <td><?php echo $row['phone'];?></td>
                    <td><?php echo $row['Temail'];?></td>

                  </tr>
                    <?php

                  
                  }
                  ?>
                 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
<!--logout code-->
<!-- <div id="logout">h
<form method="POST" action="" onsubmit="return submitForm(this);">
	<input type="text" name="name" />
	<input type="submit" />
</form>
</div> -->








  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span style="color :<?php $c ; ?>">Automatic Attendance System</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer --><script src="sweetalert.min.js"></script>
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