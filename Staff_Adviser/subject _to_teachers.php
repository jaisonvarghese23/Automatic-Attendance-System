<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  session_start(); 
  include "connection.php";
 
                          $name= $_SESSION['uname2'];
                          $query="SELECT Department from teachers where Temail = '$name'";
                          $rt=mysqli_query($con,$query);
                          while($row = mysqli_fetch_assoc($rt))
                            {
                              $Department = $row['Department'];
                            }
                           
                           
                          $query="SELECT Subject_name from subject where Department = '$Department'";
                          $rt=mysqli_query($con,$query);
                          $st=mysqli_query($con,$query);;
                          $tquery="SELECT T_Name from teachers where Department = '$Department'";
                          $tname=mysqli_query($con,$tquery);
                          $sm=mysqli_query($con,$tquery);;

                          if(isset($_POST['submit']))
                          { 
                              
                            $s = $_POST['sname'];
                            $t= $_POST['tname'];

                          
                         //   echo "<script>alert($teacher);</script>";
                           
                          $query="SELECT Teacher_id from teachers where T_Name = '$t'";
                          $rtt=mysqli_query($con,$query);
                          while($row = mysqli_fetch_assoc($rtt))
                            {
                              $tdd = $row['Teacher_id'];
                            }
                            
                            $Uquery="UPDATE subject SET Teacher_id='$tdd' where Subject_name='$s'";
                            $sp=mysqli_query($con,$Uquery);
                            if($sp){

                               echo "<script>alert('Success');</script>";

                            }
                            
                          }
                          if(isset($_POST['submit2'])){
                            $sub=$_POST['subject'];
                            $teach=$_POST['teacher'];
                            $old=$_POST['old'];
                            $query="SELECT Teacher_id from teachers where T_Name = '$teach'";
                            $sql2=mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($sql2))
                              {
                                $td = $row['Teacher_id'];
                              }
                              $Uquery="UPDATE subject SET Teacher_id='$td' where Subject_name='$sub'";
                            $sp=mysqli_query($con,$Uquery);
                            if($sp){

                              echo "<script>alert('Success');</script>";

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
          <span>Staff Advisor</span>
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
    <a class="nav-link collapsed " href="index.php">
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
  
    <a class="nav-link "  href="subject _to_teachers.php">
      <i class="bi bi-gem"></i><span>Subject Assign</span><i class="bi bi-chevron-right ms-auto"></i>
    </a>
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
  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Subject Assign</h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
  
          <div class="col-xl-8">
  
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
  
                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Assign Subjects to Teachers</button>
                  </li>
  
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Subjects to Teachers</button>
                  </li>
  
                </ul>
                <div class="tab-content pt-3">
  
                  <div class="tab-pane fade show active profile-edit" id="profile-overview">
                  <div class="row">
                <form action="" method="POST">
                  <div class="row mb-3">
                    <label for="yearl" class="col-md-4 col-lg-3 col-form-label">Subject</label>
                    <div class="col-md-8 col-lg-9">
                      <br>
                          <select name="sname" class="form-control"  onchange='selectrole(this.value);'>
                                  <option disabled="disabled" selected="selected" >Select Subject</option>
                                  <?php
                                  while($row = mysqli_fetch_assoc($rt)){
                                    ?>
                                  <option value="<?php echo $row['Subject_name'] ?>"><?php echo $row['Subject_name'] ?></option>
                                  <?php } ?>
                          </select>
                    </div>
                  </div>
                  <span id="addsub" style="display:none;" >
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Teachers</label>
                      <div class="col-md-8 col-lg-9">
                          <select name="tname" id="" class="form-control">
                          <option disabled="disabled" selected="selected" >Select Subject</option>
                          <?php
                                  while($row = mysqli_fetch_assoc($tname)){
                                    ?>
                                  <option  value="<?php echo $row['T_Name'] ?>"><?php echo $row['T_Name'] ?></option>
                                  <?php } ?>
                        </select>
                      </div>
                    </div>
                  </span>
                  <div>
                  <label class="col-md-4 col-lg-3 col-form-label"></label>
                    <button type="submit" name="submit" class="btn btn-primary" >  Assign  </button>
                  </div>
                </form>              
              </div>
</div>
                <!---------Assign subject Form end -->
                  <div class="tab-pane fade profile-edit pt-2" id="profile-edit">
  
                    <!-- Edit Subject assign Form -->
                    <div class="row">
                    <form action="" method="POST">
              <div class="row mb-3">
                  <label for="yearl" class="col-md-4 col-lg-3 col-form-label">Subject</label>
                  <div class="col-md-8 col-lg-9">
                  <!-- <select name="dept" id="country" class="form-control"  onchange='selectrol(this.value);'> -->
                  <select name="subject" id="dept" class="form-control"  onchange='selectrol(this.value);'>
                  <option disabled="disabled" selected="selected" >Select Subject</option>
                  <?php
                                
                                 while($row = mysqli_fetch_assoc($st)){
                                   ?>
                                 <option value="<?php echo $row['Subject_name'] ?>"><?php echo $row['Subject_name'] ?></option>
                                 <?php } ?>
                            </select>
                  </div>
              </div>
              <span id="editsub" style="display:none;" >
              <!-- <span id="editsub"  > -->
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label" > Assigned Teacher</label>
                  <div id="state" class="col-md-8 col-lg-9">
                 <!-- <select name="state" id="state" class="form-control"> -->
                    <!-- <option value=""> select state</option> -->
              <!-- </select> -->
                 <!-- <input type="text" name="state2" id="state" class="form-control" readonly value=lklkwdlwk> -->
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="yearl" class="col-md-4 col-lg-3 col-form-label">New Teacher</label>
                  <div class="col-md-8 col-lg-9">
                  <!-- <select name="dept" id="country" class="form-control"  onchange='selectrol(this.value);'> -->
                  <select name="teacher" id="dept" class="form-control"  onchange='selectrol(this.value);'>
                  <option disabled="disabled" selected="selected" >Select Teacher</option>
                 
                                 <?php
                                  while($row = mysqli_fetch_assoc($sm)){
                                    ?>
                                  <option  value="<?php echo $row['T_Name'] ?>"><?php echo $row['T_Name'] ?></option>
                                  <?php } ?>
                            </select>
                  </div>
              </div>
                
</span>
                  </div> 
                <label class="col-md-4 col-lg-3 col-form-label"></label>
                  <button type="submit" name="submit2" class="btn btn-primary" >  Update Details </button>
                </div>
              </form>            
    </div>
  
                   <!-- End Edit Subject Form -->
  
                  </div>
  
                </div><!-- End Bordered Tabs -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
  
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
      document.getElementById('addsub').style.display="block";
    }
    function selectrol(val){
      document.getElementById('editsub').style.display="block";
    }
  </script>
<script>


  $(document).ready(function(){
    
 $('#dept').change(function(){
  var country_id=$(this).val();
  $.ajax({

    url:"teachername.php",
    method:"POST",
    data:{countryId:country_id},
    dataType:"text",
    success:function(data){
      $('#state').html(data);
    }
  });
  
 });

  });
</script>
</script>
</body>

</html>