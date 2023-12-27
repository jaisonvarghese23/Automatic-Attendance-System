<!DOCTYPE html>
<html lang="en">

<head>
<?php
session_start();
    include "connection.php";
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.,@!#$%^&*";
      if(isset($_POST['submit'])){
        
        $str=str_shuffle(($str));
        $str=substr($str,0,8);
         $Name = $_POST['name'];
        $Phone = $_POST['phone'];
        $role = $_POST['role'];
        $Email= $_POST['email'];
        $Batch= $_POST['batch'];
        $uname= $_SESSION['uname2'];
        $query="SELECT Department from hod where email1 = '$uname'";
        $rt=mysqli_query($con,$query);
        while($row = mysqli_fetch_assoc($rt))
        {
          $Department = $row['Department'];
        }
         $sql="INSERT INTO teachers(T_Name,Department,roles,Phone,Temail,Tpassword,Batch) values('$Name','$Department','$role','$Phone','$Email','$str','$Batch')";
      $result = (mysqli_query($con,$sql));
      if($result){
        echo '<script>alert("inserted successfull")</script>';
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
        <!-- <img src="assets/img/logo.png" alt=""> -->
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
      <a class="nav-link collapsed"  href="teacher_register.php">
          <i class="bi bi-journal-text"></i><span>Register Teachers</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="teachers.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Lecturers</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="students.php">
          <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="programs.php">
          <i class="bi bi-gem"></i><span>Programs & Courses </span><i class="bi bi-chevron-right ms-auto"></i>
          <li class="nav-item">
        <a class="nav-link collapsed"  href="subjectadd.php">
          <i class="bi bi-gem"></i><span>Add Subects</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        </a>
      <li class="nav-heading">Pages</li> 

      <li class="nav-item">
        <a class="nav-link collapsed" href="Edit_profile.php">
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
      <h1>Register Teacher</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
          <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->
<div class="col-8">
   <!--  Registration Form Start-->
   <section class="section profile">
      <div class="row">
                  <form action="" method="POST">

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" >
                      </div>
                    </div>
                   

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" >
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Role</label>
                      <div class="col-md-8 col-lg-9">
                     <select name="role" class="form-control" onchange='selectrole(this.value);'>
                     <option disabled="disabled" selected="selected" >Select Role</option>
                     <option value="Staff Adviser">Staff Adviser</option>
                                    <option value="Teacher">Teacher</option>
                                  
                                    
                                    
                      </select>
                      </div>
                    </div>
                    <div class="row mb-3" id='year' style="visibility:hidden">
                      <label for="yearl" class="col-md-4 col-lg-3 col-form-label">Batch</label>
                      <div class="col-md-8 col-lg-9">
                      <!-- <select name="year" class="form-control" >
                                    <option disabled="disabled" selected="selected" >Select Year</option>
                                    <option value="first">First Year</option>
                                    <option value="second">Second Year</option>
                                    <option value="third">Third Year</option>
                                    <option value="forth">Fourth Year</option>
                       </select> -->
                       <input name="batch" type="text" class="form-control" id="Batch" placeholder="eg...2020-2023" >
                      </div>
                    </div>
                    <div>
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label"></label>
                      <button type="submit" name="submit" class="btn btn-primary" >  Register  </button>
                    </div>
                  </form>              
      </div>
    </section>
    <br>
    <br><br>
    <br><br><br><br>
    <br><br>
    <!-- End Profile Registration Form --> 
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
  <script>

    function selectrole(val){
    
  var role=document.getElementById('year');
  if(val == 'Staff Adviser'){
role.style.visibility='visible';
}


   
  else{
    role.style.visibility='hidden';
  }

}
  </script>

</body>

</html>