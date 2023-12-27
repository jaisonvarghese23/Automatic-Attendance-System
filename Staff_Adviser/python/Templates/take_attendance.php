<!DOCTYPE html>
<html lang="en">

<head>
<script src="assets/js/webcam.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <!-- <script src="assets/js/webcam1.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> 

 <?php
  session_start(); 
  if(isset($_POST['submit'])){
    $img = $_POST['image']; 
    $period = $_POST['period']; 
    $flag=0;
    if(empty($img)){
      $_SESSION['status'] ='No image captured';
      $_SESSION['status_code'] = 'error';
       $flag = 1;
    }
    else if(empty($period))
    {
      $_SESSION['status'] ='Period no not selected';
      $_SESSION['status_code'] = 'error';
       $flag = 1;

       
    }
    if($flag==0){
    $folderPath = "images/"; 
    $image_parts = explode(";base64,", $img); 
    $image_type_aux = explode("image/", $image_parts[0]); 
    $image_type = $image_type_aux[1]; 
    $image_base64 = base64_decode($image_parts[1]); 
    $fileName = date("y.m.d")."-" .$period. '.png'; 
    $file = $folderPath . $fileName; 
    file_put_contents($file, $image_base64);
    $_SESSION['status'] ='Image Captured successfully';
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
        <a class="nav-link collapsed"  href="teachers.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Lecturers</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed"  href="students.php">
          <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li class="nav-item">
        <a class="nav-link collapsed"  href="subjectadd.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Lecturers</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li class="nav-item">
        <a class="nav-link "  href="take_attendance.php">
          <i class="bi bi-gem"></i><span>Take Attendance</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        </li>
      <li class="nav-item">
        <a class="nav-link collapsed"  href="programs.php">
          <i class="bi bi-gem"></i><span>Programs & Courses     </span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li class="nav-item">
        <a class="nav-link collapsed"  href="subject _to_teachers.php">
          <i class="bi bi-gem"></i><span>Subject Assign</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li>
        <a class="nav-link collapsed"  href="your_subject.php">
          <i class="bi bi-gem"></i><span>Yor Subject</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        </li>
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
      <h1>Take Students Image</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="index.php">Home</a></li> -->
          <!-- <li class="breadcrumb-item active">Dashboard</li> -->
        </ol>
      </nav>
      <br>
    </div><!-- End Page Title -->
<div class="col-8">
   <!--  Registration Form Start-->
   <section class="section profile">
      <div class="row">
                  <form action="" method="POST">
                  <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Take Image</label>
                      <div class="col-md-8 col-lg-9">
                        <div id="camera" style="width:100px;height:250px;"></div>
                        <div class="pt-2">
                          <!-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                          <input type=button class="btn btn-primary btn-sm" value="Take Snapshot" onClick="take_snapshot()"> 
                          <!-- <a href="#" class="btn btn-danger btn-sm" onclick="getremove()" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                          <a class="btn btn-danger btn-sm" onclick="getremove()" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                          <input type="hidden" name="image" class="image-tag"> 
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                    <label for="yearl" class="col-md-4 col-lg-3 col-form-label">Students Photo</label>
                      <div class="col-md-8 col-lg-9">
                    <select name="period" class="form-control" >
                     <option disabled="disabled" selected="selected" > Select Period NO</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                    </select>
                      </div>
                      </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Date</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="datee" type="text"  readonly class="form-control" id="fullName"
                                                                            value=<?php echo date("y.m.d"); ?>>
                      </div>
                    </div>
                    <label class="col-md-4 col-lg-3 col-form-label"></label>
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
     Webcam.set({ 

width: 490, 

height: 390, 

image_format: 'jpeg', 

jpeg_quality: 90 

}); 



Webcam.attach( '#camera' ); 
     function take_snapshot(){
      Webcam.snap( function(data_uri) { 

$(".image-tag").val(data_uri); 

document.getElementById('camera').innerHTML = '<img  src="'+data_uri+'"/>'; 

} ); 
     
     }

    function getremove(){
   
        Webcam.attach( '#camera' );
    }
</script>
</body>

</html>