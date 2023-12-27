<!DOCTYPE html>
<html lang="en">

<head>
<?php

session_start();
    include "connection.php";
    // if(isset($_POST['dept'])){
    // $queryd= " SELECT * FROM hod_login where Department= 'Information Technology' ";
    // $q = mysqli_query($con,$queryd);
    // }
    $str="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.,@!#$%^&*";
      if(isset($_POST['submit'])){
        $str=str_shuffle(($str));
        $str=substr($str,0,8);
        $Name = $_POST['name'];
        $flag=0;
        if(empty($_POST['department'])){
          $_SESSION['status'] = 'please select role';
          $_SESSION['status_code'] = 'error';
          $role="";
          $flag=1;
      }
      //      else{
      //  $Department = $_POST['department'];
      //      }
        else if(preg_match('/^[0-9]{10}+$/',$_POST['phone']))
        {
          $Phone = $_POST['phone'];
         
        }
        else{
          
          $_SESSION['status'] ='Invalid Phone Number';
        $_SESSION['status_code'] = 'error';
         $flag = 1;
        }
        $Department = $_POST['department'];
        $Email= $_POST['email'];
        $p="SELECT p_id from principal";
        $pp=mysqli_query($con,$p);
        $result = mysqli_fetch_array($pp);
        $p=$result["p_id"];

       if($flag==0){
        $query= " SELECT * FROM HOD WHERE department='$Department'";
  $resultt = mysqli_query($con,$query);
  
  if(mysqli_num_rows($resultt) == 0){
         
          $sql="INSERT INTO HOD(fname,department,phone,email1,password1,p_id) values('$Name','$Department','$Phone','$Email','$str','$p')";
          $result = (mysqli_query($con,$sql));
      if($result){

       
       include 'mail.php';
      // Mail Start
     $mail->addAddress($Email);
  //   //Content
     $mail->isHTML(true);                                  //Set email format to HTML
     $mail->Subject = 'You are Registered to smart Attendance System';
     $mail->Body    = 'Your Username: '.$Email."\n Your Password:".$str;
     $mail->AltBody = 'This is a registration mail from Smart Attendance Sytem';

    if( $mail->send()){
  //   echo 'Message has been sent';
    }else{
  //   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
      // mail end
        //echo '<script>alert("inserted successfull")</script>';
        $_SESSION['status'] = 'Registration Sucessfull';
        $_SESSION['status_code'] = 'success';
       
      }
    }
    
      else{
        $_SESSION['status'] ='Registration Failed.HOD already exist';
        $_SESSION['status_code'] = 'error';
      }
     
     }
     if(isset($_POST['csubmit'])){
      $str=str_shuffle(($str));
      $str=substr($str,0,8);
      $cName = $_POST['cname'];
      $Phone = $_POST['cphone'];
      $Department = $_POST['dept'];
      $Email= $_POST['cemail'];
    // $query = " UPDATE hod_login SET Fname='$cName' where Department='$Department'";

     $query = " UPDATE hod_login SET Fname='$cName',phone='$Phone',Email1='$Email',Password1='$str' where Department='$Department'";
      $result=mysqli_query($con,$query);
      if($result){
        $_SESSION['status'] ='New HOD Updated';
        $_SESSION['status_code'] = 'success';
      }else{
        $_SESSION['status'] ='Not Success';
        $_SESSION['status_code'] = 'error';
      }
     
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
        <a class="nav-link "  href="hod_register.php">
          <i class="bi bi-journal-text"></i><span>Register HOD</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="teachers.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Faculty</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed" href="students.php">
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

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>LogOut</span>
        </a> 
       </li>

    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">
  <section class="section profile">
      <div class="row">

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Register HOD</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Change HOD</button>
                </li>

              </ul>
              <div class="tab-content pt-3">

                <div class="tab-pane fade show active profile-edit" id="profile-overview">
                <div class="row">
                <form action="" method="POST">

<div class="row mb-3">
  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
  <div class="col-md-8 col-lg-9">
    <input name="name" type="text" class="form-control" id="fullName" required >
  </div>
</div>
<div class="row mb-3">
  <label for="company" class="col-md-4 col-lg-3 col-form-label">Department</label>
  <div class="col-md-8 col-lg-9">
    <!-- <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
 --><select name="department" class="form-control">
 <option disabled="disabled" selected="selected"  required>Select Department</option>
                <option>Computer Science</option>
                <option>Electrical and Electronics Engineering</option>
                <option>Electronics Engineering</option>
                <option>Information Technology</option>
                <option>Mechanical Engineering</option>
            </select>
  </div>
</div>

<div class="row mb-3">
  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
  <div class="col-md-8 col-lg-9">
    <input name="phone" type="text" class="form-control" id="Phone"  required>
  </div>
</div>

<div class="row mb-3">
  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
  <div class="col-md-8 col-lg-9">
    <input name="email" type="email" class="form-control" id="Email"  required >
  </div>
</div>
<div>
<label for="Phone" class="col-md-4 col-lg-3 col-form-label"></label>
  <button type="submit" name="submit" class="btn btn-primary" >Register HOD</button>
</div>

</form>          
 

            </div>
             </div>

              <!---------Suub add Form end -->
                <div class="tab-pane fade profile-edit pt-2" id="profile-edit">

                  <!-- Edit Subject Form -->
                  <div class="row">
                  <form action="" method="POST">
              <div class="row mb-3">
                  <label for="yearl" class="col-md-4 col-lg-3 col-form-label">Department</label>
                  <div class="col-md-8 col-lg-9">
                  <!-- <select name="dept" id="country" class="form-control"  onchange='selectrol(this.value);'> -->
                  <select name="dept" id="dept" class="form-control"  onchange='selectrol(this.value);'>
                 <option disabled="disabled" selected="selected" >Select Department</option>
                 <option>Computer Science</option>
                <option>Electrical and Electronics Engineering</option>
                <option>Electronics Engineering</option>
                <option>Information Technology</option>
                <option>Mechanical Engineering</option>
                            </select>
                  </div>
              </div>
              <span id="editsub" style="display:none;" >
              <!-- <span id="editsub"  > -->
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label" > Current HOD</label>
                  <div id="state" class="col-md-8 col-lg-9">
                 <!-- <select name="state" id="state" class="form-control"> -->
                    <!-- <option value=""> select state</option> -->
              <!-- </select> -->
                 <!-- <input type="text" name="state2" id="state" class="form-control" readonly value=lklkwdlwk> -->
                  </div>
                </div>
                <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">New HOD Full Name</label>
  <div class="col-md-8 col-lg-9">
    <input name="cname" type="text" class="form-control" id="fullName" required >
  </div>
    </div>
                <div class="row mb-3">
  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
  <div class="col-md-8 col-lg-9">
    <input name="cphone" type="text" class="form-control" id="Phone"  required>
  </div>
</div>

<div class="row mb-3">
  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
  <div class="col-md-8 col-lg-9">
    <input name="cemail" type="email" class="form-control" id="Email"  required >
  </div>
</div>
<div>
                
</span>
                  </div> 
                <label class="col-md-4 col-lg-3 col-form-label"></label>
                  <button type="submit" name="csubmit" class="btn btn-primary" >  Save Changes </button>
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
  <!-- End #main -->

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
    function selectrol(val){

var a=document.getElementById('editsub');
a.style.display='block';

}
</script>
<script>
  $(document).ready(function(){
    
 $('#dept').change(function(){
  var country_id=$(this).val();
  $.ajax({

    url:"hodname.php",
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

</body>

</html>