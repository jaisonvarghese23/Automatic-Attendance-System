<!DOCTYPE html>
<html lang="en">

<head>
<?php
session_start();
    include "connection.php";
    include 'mail.php';
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.,@!#$%^&*";
      if(isset($_POST['submit'])){
        $str=str_shuffle(($str));
        $str=substr($str,0,8);
        $pimage = $_FILES["p"]["name"];
        $folder = "./known/" . $pimage;
        $tempname = $_FILES["p"]["tmp_name"];
         $Name = $_POST['name'];
        $Phone = $_POST['phone'];
        $Email= $_POST['email'];
        $ktuid = $_POST['ktu_id'];
        $rollno = $_POST['roll_no'];
   
    //php validation
    $q= "Select * FROM student where ktu_id='$ktuid'";
    $resultt = mysqli_query($con,$q);
    $flag=0;
    if(empty($pimage))
    {
      $_SESSION['status'] ='image not selected';
      $_SESSION['status_code'] = 'error';
       $flag = 1;

    }
    
    else if(mysqli_num_rows($resultt) == 1){
      $_SESSION['status'] ='KTU ID already exist';
      $_SESSION['status_code'] = 'error';
       $flag = 1;

    }
  
    
     else if(preg_match('/^[0-9]{10}+$/',$_POST['phone']))
        {
          $Phone = $_POST['phone'];
         
        }
        else{
          $Department = $_POST['department'];
          $_SESSION['status'] ='Invalid Phone Number';
        $_SESSION['status_code'] = 'error';
         $flag = 1;
        }

     if($flag==0){

      $uname= $_SESSION['uname2'];
      $query="SELECT * from teachers where Temail = '$uname' AND roles='Staff Adviser'";
      $rt=mysqli_query($con,$query);
      while($row = mysqli_fetch_assoc($rt))
        {
          $Department = $row['Department'];
          $id = $row['Teacher_id'];
          $csem = $row['current_Semester'];
        }

      $sql="INSERT INTO student(ktu_id,Roll_no,fname,phone,email1,password1,Department,current_Semester,images,Teacher_id) values('$ktuid','$rollno','$Name','$Phone','$Email','$str','$Department','$csem','$pimage','$id')";
      $result = (mysqli_query($con,$sql));
      move_uploaded_file($tempname, $folder);
     // if($result){
        
        // Mail Start
     //  $mail->addAddress($Email);
    //   //Content
      //  $mail->isHTML(true);                                  //Set email format to HTML
      //  $mail->Subject = 'You are Registered to smart Attendance System';
      //  $mail->Body    = 'Your Username: '.$Email."\n Your Password:".$str;
      //  $mail->AltBody = 'This is a registration mail from Smart Attendance Sytem';
  
      // if( $mail->send()){
    //   echo 'Message has been sent';
      // }else{
    //   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   //   }
      
        $_SESSION['status'] = 'Registration Sucessfull';
        $_SESSION['status_code'] = 'success';
      }
     
     }
    //}
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
  
    <a class="nav-link collapsed"  href="subject _to_teachers.php">
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
      <h1>Register Students</h1>
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
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img  alt="Profile" id="preview">
                        <div class="pt-2">
                          <!-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                          <input type="file"  name="p" id="a" class="btn btn-primary btn-sm" onchange="getImagepreview(event)" >
                          <!-- <a href="#" class="btn btn-danger btn-sm" onclick="getremove()" title="Remove my profile image"><i class="bi bi-trash"></i></a> -->
                          <button class="btn btn-danger btn-sm" onclick="getremovee()" title="Remove my profile image"><i class="bi bi-trash"></i></a>

                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">KTU ID</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ktu_id" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Roll NO</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="roll_no" type="text" class="form-control" required>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" required >
                      </div>
                    </div>
                    <!-- <div class="row mb-3">
                      <label for="yearl" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                      <div class="col-md-8 col-lg-9">
                      <select name="semester" class="form-control" >
                     <option disabled="disabled" selected="selected" >Select Semester</option>
                                    <option value="1">Semester 1</option>
                                    <option value="2">Semester 2</option>
                                    <option value="3">Semester 3</option>
                                    <option value="4">Semester 4</option>
                                    <option value="5">Semester 5</option>
                                    <option value="6">Semester 6</option>
                                    <option value="6">Semester 7</option>
                                    <option value="6">Semester 8</option>
                                </select>
                      </div>
                    </div>
                    <div> -->
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
    imag.src="";
    imag.focus();
     }
    </script>
  <script>

    function selectrole(val){
     
  var role=document.getElementById('year');
  if(val == 'teacher'  || val == 'staff'){

    role.style.visibility='visible';
  }
  else{
    role.style.display='none';
  }

    }
  </script>
  

</body>

</html>