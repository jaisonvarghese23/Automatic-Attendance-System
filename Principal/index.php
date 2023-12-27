<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  session_start(); 
  include "connection.php";
  //$query="SELECT present1, count(*) as number From attendance GROUP BY present1;";
  $query="SELECT count(*) as present_absent_count,present1,
  case
    when present1 = 1 then 'present'
    when present1 = 0 then 'absent' 
    end as present1 FROM attendance GROUP BY present1";
$result= mysqli_query($con,$query);
$result2= mysqli_query($con,$query);
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

    <?php

$query = " select * from Principal ";
$r = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($r)) {
?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="./image/<?php echo $data['images']; ?>" alt="Profile" class="rounded-circle">
            <!-- <img src="/AMP/Principal/image/athul.jpg" alt="Profile" class="rounded-circle"> -->
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
          <a class="dropdown-item d-flex align-items-center" href="completeprofile.php">
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
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed"   href="hod_register.php">
          <i class="bi bi-journal-text"></i><span>Register HOD</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="teachers.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Faculty</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-item">
        <a class="nav-link collapsed"  href="students.php">
          <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="programs.php">
          <i class="bi bi-gem"></i><span>Programs & Courses     </span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li class="nav-heading">Pages</li> 

      <li class="nav-item">
        <a class="nav-link collapsed" href="completeprofile.php">
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- right side columns -->
        <div class="col-lg-12">
          <div class="row">

            

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6 ">
              <div class="card info-card revenue-card">

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

                <div class="card-body">
                  <h5 class="card-title">Students</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i> 
                    </div>
                    <div class="ps-3">
                      <h6><?php
                      $query = "SELECT count(1) From student";
                      $c=mysqli_query($con,$query);
                      $row = mysqli_fetch_array($c);
                      echo $row[0];
                      ?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-6 col-md-6">

              <div class="card info-card customers-card">
 
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

                <div class="card-body">
                  <h5 class="card-title">Faculty</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-badge"></i>
                    </div>
                    <div class="ps-3">
                      <h6> <?php $query = "SELECT count(1) From teachers";
                      $c=mysqli_query($con,$query);
                      $row = mysqli_fetch_array($c);
                      echo $row[0];
                      ?></h6>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
          </div>
            <!-- Reports Today -->
            
                 <div class="col-lg-12">
                 <div class="row">
                        <div class="col-xxl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title" > Attendance Reports <span>/Today</span></h5>
                  <div class="col-12" style="height:300px" id="piechart"></div>
                </div>
              </div>
            </div>
                <!-- Reports this month -->
                <div class="col-xxl-6 col-md-6 ">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> Attendance Reports <span>/This Month</span></h5>
                  <div class="col-12" style="height:300px" id="piechartmonth"></div>
                </div>
              </div>
</div>
              <!-- Reports this Semester -->
             
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
  <script type="text/javascript" src="\AMP\Principal\assets\js\chart.js"></script>
    <script type="text/javascript">
// Load google charts

google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['attendance','Number'],
<?php
while($row = mysqli_fetch_array($result)){
echo "['".$row["present1"]."',".$row["present_absent_count"]."],";
}
?>
]);
var data2 = google.visualization.arrayToDataTable([
  ['attendance','Number'],
<?php
while($row = mysqli_fetch_array($result2)){
echo "['".$row["present1"]."',".$row["present_absent_count"]."],";
}
?>
]);


  // Optional; add a title and set the width and height of the chart
  var options = { animation: {
    animation : true,
    animationEasing : "easeOutSine",
    percentageInnerCutout: 60,
    segmentShowStroke : false
      },pieHole:0.3,legend:'none',slices:{0:{color:'#C21B25'},1:{color:'#16924E'}}};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
 
      
  //Attendanc report This Month
  var options2 = {pieHole:0.3,legend:'none',slices:{0:{color:'#C21B25'},1:{color:'#16924E'}}};
  var chart2 = new google.visualization.PieChart(document.getElementById('piechartmonth'));
  chart2.draw(data2, options2);
}





    </script>

</body>

</html>