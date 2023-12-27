<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  session_start();
  include "connection.php";
  if(isset($_POST['editsubmit'])){
   // echo '<script>alert("success");</script>';
   $q="SELECT images FROM principal where p_id=1";
   $r=mysqli_query($con,$q);
   if(empty($_FILES["p"]["name"])){
   while($row=mysqli_fetch_array($r))
   {
     $pimage=$row['images'];
   }
 }
 else{
   $pimage = $_FILES["p"]["name"];
   $folder = "./image/" . $pimage;
   //$timage = $_FILES["p"]["temp_name"];
 }


  //    $filename = $_FILES["p"]["name"];
	  $tempname = $_FILES["p"]["tmp_name"];
 
    $names=$_POST['fullname'];
    $age=$_POST['Age'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $instagram=$_POST['instagram'];
    $link=$_POST['linkedin'];
   
   // $i=mysqli_fetch_assoc($row['images']);
    $query="UPDATE principal SET images='$pimage', fname='$names',age='$age',email1='$email',phone='$phone',instagram1='$instagram',facebook1='$link' where p_id=1";
    move_uploaded_file($tempname, $folder);
    $result = mysqli_query($con,$query);
    if($result){
      
      $_SESSION['status'] ='profile Updated';
      $_SESSION['status_code'] = 'success';
    }else{
      $_SESSION['status'] ='Profile not Updated';
      $_SESSION['status_code'] = 'error';
    }

  }
  if(isset($_POST['passwordsubmit'])){

    $currentpass = $_POST['newpassword'];
    $reenterpass = $_POST['renewpassword'];
    if($currentpass==$reenterpass){
    $query="UPDATE principal SET password1='$currentpass' WHERE p_id=1";
    $result=mysqli_query($con,$query);
    if($result){
   
      $_SESSION['status'] ='password Updated';
      $_SESSION['status_code'] = 'success';
      
    }
    else{
      $_SESSION['status'] =' password not Updated';
      $_SESSION['status_code'] = 'error';

    }
  }
  else{
    $_SESSION['status'] =' Mismatch between New password and Re enter password';
      $_SESSION['status_code'] = 'error';


  }
  }
  
  
  
  ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Automatic Attendance System</title>
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
        <?php

$query = " select * from Principal ";
$result = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($result)) {
?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="./image/<?php echo $data['images']; ?>" alt="Profile" class="rounded-circle">
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
                <span>Profile</span>
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

           </ul><!--End Profile Dropdown Items -->
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
        <a class="nav-link collapsed " href="hod_register.php">
          <i class="bi bi-journal-text"></i><span>Register HOD</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="teachers.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Faculty</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed "  href="students.php">
          <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="programs.php">
          <i class="bi bi-gem"></i><span>Programs & Courses </span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-heading">Pages</li> 

      <li class="nav-item">
        <a class="nav-link " href="completeprofile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
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
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
      
            
            <img src="./image/<?php echo $data['images']; ?>" alt="Profile" style="height:200px;">
              
              <h2></h2>
              <h3></h3>
              <div class="social-links mt-2">
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
               
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Full profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <br><br>
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['fname']; ?> </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Age</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['age']; ?></div>
            </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['phone']; ?> </div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['email1']; ?> </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Instagram Profile</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['instagram1']; ?> </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Facebook Profile</div>
                    <div class="col-lg-9 col-md-8"><?php echo $data['facebook1']; ?> </div>
                  </div>
                 
             
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="state"  method="POST" action="" enctype="multipart/form-data">
                    
                  </form>   
                 
                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="" method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="text" value=<?php echo $data["password1"];?> class="form-control" id="currentPassword" readonly>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                    <div class="text-center">
                      <button type="submit" name='passwordsubmit' class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script>
   function getImagepreview(event){
    var image =  URL.createObjectURL(event.target.files[0]);
    
    var imag = document.getElementById("preview");
    imag.width="100";
    imag.margin="10";
      imag.src=image;
  
    }
    </script>
    <script>
    function getremovee(){
    // var image =  URL.createObjectURL(event.target.files[0]);
    var imag = document.getElementById("preview");
    imag.src="0";
     
     }
    </script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
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
  $(document).ready(function(){
  $.ajax({

    url:"profileajax.php",
    method:"POST",
    dataType:"text",
    success:function(data){
      $('#state').html(data);
      $('#state2').html(data);
    }
  });
  
 });
</script>
  
</body>


</html>