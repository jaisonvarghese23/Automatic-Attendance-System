<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  session_start(); 
  include "connection.php";
  if(isset($_POST['submit'])){

 $sem=$_POST['sem'];
 if(empty($sem)){
  $_SESSION['status'] = 'please select Semester';
  $_SESSION['status_code'] = 'error';
  
  
}
else{
  $sem=$_POST['sem'];
 $code=$_POST['code'];
 $sname=$_POST['sname'];
 $uname= $_SESSION['uname2'];
 $query="SELECT Department from hod where email1 = '$uname'";
 $rt=mysqli_query($con,$query);
 while($row = mysqli_fetch_assoc($rt))
        {
          $Department = $row['Department'];
        }
 $sql="INSERT INTO subject(Subject_id,Subject_name,semester,Department) values('$code','$sname','$sem','$Department')";
      $result = (mysqli_query($con,$sql));
      if($result){
        $_SESSION['status'] = 'Subject Added Sucessfully';
        $_SESSION['status_code'] = 'success';
       
      }

}
  }
if(isset($_POST['deletesubmit'])){
  

  $sem=$_POST['semester'];
 // $sname=$_POST['subject'];
  if(empty($sem)){
    $_SESSION['status'] = 'please select Semester';
    $_SESSION['status_code'] = 'error';
    
    
  }
  else if(empty($_POST['subject'])){
    $_SESSION['status'] = 'please select Semester';
    $_SESSION['status_code'] = 'error';
  }
  else{
    $sem=$_POST['semester'];
    $sname=$_POST['subject'];
    $query="SELECT * from subject where Subject_name = '$sname'";
    $rt=mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($rt))
           {
             $sn = $row['Subject_id'];
           }
           $sq = "DELETE  FROM attendance where Subject_id = '$sn' ";
           $de=mysqli_query($con,$sq);
  $sql = "DELETE  FROM subject where semester = $sem AND Subject_name = '$sname'";
  $del=mysqli_query($con,$sql);
  if($del){
    $_SESSION['status'] = 'Subject Deleted Sucessfully';
    $_SESSION['status_code'] = 'success';
  }
  else{
    $_SESSION['status'] = 'Some error is There';
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
  <a class="nav-link  collapsed" href="index.php">
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
  <a class="nav-link collapsed"  href="students.php">
    <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
  </a>

<li class="nav-item">
  <a class="nav-link collapsed"  href="programs.php">
    <i class="bi bi-gem"></i><span>Programs & Courses     </span><i class="bi bi-chevron-right ms-auto"></i>
  </a>
  <li class="nav-item">
  <a class="nav-link"  href="subjectadd.php">
    <i class="bi bi-gem"></i><span>Add Subects</span><i class="bi bi-chevron-right ms-auto"></i>
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
  <section class="section profile">
      <div class="row">

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Add Subjects</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Delete Subjects</button>
                </li>

              </ul>
              <div class="tab-content pt-3">

                <div class="tab-pane fade show active profile-edit" id="profile-overview">
                <div class="row">
              <form action="" method="POST">
                <div class="row mb-3">
                  <label for="yearl" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                  <div class="col-md-8 col-lg-9">
                    <br>
                        <select name="sem" class="form-control">
                                <option disabled="disabled" selected="selected" >Select Semester</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                        </select>
                  </div>
                </div>
              
                <span id="addsub"  >
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Subject Code</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="code" type="text" class="form-control" id="fullName" required >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Subject Name</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="sname" type="text" class="form-control" id="fullName" required >
                    </div>
                  </div>
                </span>
                <div>
                <label class="col-md-4 col-lg-3 col-form-label"></label>
                  <button type="submit" name="submit" class="btn btn-primary" >  Register  </button>
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
                  <select name="semester" id="dept" class="form-control"  onchange='selectrol(this.value);'>
                  <option disabled="disabled" selected="selected" >Select Semester</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                            </select>
                  </div>
              </div>
              <span id="editsub" style="display:none;" >
              <!-- <span id="editsub"  > -->
                <div class="row mb-3">
                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label" > Subject List</label>
                  <div id="state" class="col-md-8 col-lg-9">
                 <!-- <select name="state" id="state" class="form-control"> -->
                    <!-- <option value=""> select state</option> -->
              <!-- </select> -->
                 <!-- <input type="text" name="state2" id="state" class="form-control" readonly value=lklkwdlwk> -->
                  </div>
                </div>
                
                
</span>
                  </div> 
                <label class="col-md-4 col-lg-3 col-form-label"></label>
                  <button type="submit" name="deletesubmit" class="btn btn-primary" >  Delete Subject </button>
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

    url:"subjectname.php",
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