
<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  session_start(); 


  include "connection.php";
  $name= $_SESSION['uname2'];
  $query="SELECT * FROM student where email1='$name'";
  $sql1= mysqli_query($con,$query);
  while($row=mysqli_fetch_assoc($sql1)){

   $ktu=$row['ktu_id'];
   $current=$row['current_Semester'];

  }





//   $query="SELECT count(*) as present_absent_count,present1,
//          case
//            when present1 = 1 then 'present'
//            when present1 = 0 then 'absent' 
//            end as present1 FROM attendance GROUP BY present1;";
// $result= mysqli_query($con,$query);
$i=0;





  ?> 
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Automated Attendance System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="\AMP\Principal\assets\js\chart.js"></script>
   
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
  <link rel="stylesheet" href="sty.css">
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
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed"  href="students.php">
          <i class="bi bi-bar-chart"></i><span>Students</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li class="nav-item">
        <a class="nav-link collapsed"  href="internal.php">
          <i class="bi bi-layout-text-window-reverse"></i><span>Internal Mark</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed"  href="time_table.php">
          <i class="bi bi-gem"></i><span>Your Time Table </span><i class="bi bi-chevron-right ms-auto"></i>
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div><!-- End Page Title -->
   
    
  
   
    <section class="section dashboard">
    <div class="col-lg-12" >
                 <div class="row">
      <?php
     $query="SELECT * FROM subject where semester='$current'";
     $sql2= mysqli_query($con,$query);
     while($row=mysqli_fetch_assoc($sql2)){
   
      $sub=$row['Subject_name'];
      $id=$row['Subject_id'];
   
     

    

      $i=1;
      $j=2;
      // while($i<$j){
       $query='';
      $result='';
        $query="SELECT count(*) as present_absent_count,present1,
        case
          when present1 = 1 then 'present'
          when present1 = 0 then 'absent' 
          end as present1 FROM attendance where ktu_id='$ktu' AND Subject_id='$id'   GROUP BY present1;";
$result= mysqli_query($con,$query);
 //echo '<script type="text/javascript">','drawChart();','</script>';

   ?> 
        <!-- right side columns -->
        <!-- <div class="col-lg-12">
          <div class="row"> -->
         
    
            <!-- subject view card -->
            <!-- Reports Today -->
            
            
            <div class="col-xxl-4 col-md-4">
            <div class="card" >
                <div class="card-body">
                  <h5 class="card-title" ><?php echo $sub ?> </h5>
                  <div   class="col-12" style="height:250px" id="<?php  echo $id;?>"></div>
                </div>
              </div>
            </div>
            
        
    <?php
  
    $i++;
    $pi=$id;
   
?>

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



  // Optional; add a title and set the width and height of the chart
  var options = { animation: {
    animation : true,
    animationEasing : "easeOutSine",
    percentageInnerCutout: 60,
    segmentShowStroke : false
      },pieHole:0.3,legend:'none',slices:{color:'#16924E'}};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('<?php echo $pi?>'));
  chart.draw(data, options);
    }



    </script>   










<?php
      }
      ?>
      <!-- <script>setOnLoadCallback(drawChart);</script> -->
  
        <!---php end for carview ------->
        </div>
        <br><br>
        <div class="row">
        <form action="" method="POST">
            <div class="col-12">
            <label  class="col-form-label">Showing &nbsp;</label> <input type="number" value=10 class="col-form-label" style="width:1.5cm" min=1 max=30><label  class="col-form-label">&nbsp;Entries </label>
<span style="float:right"><label  class="col-form-label">From &nbsp;</label><input type="date" class="col-form-label" name="from" id="from">
<label  class="col-form-label">To &nbsp;</label><input type="date"  class="col-form-label"name="from" id="from">&nbsp;
<input type="button" onclick="drawChart();" class="btn btn-primary" name="submit" id="submit" value="Apply">
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
            <th scope="col">Subject Name</th>
            <th scope="col">Date</th>
            <th scope="col">Date</th>
            <th scope="col">Date</th>
            <th scope="col">Date</th>
            <th scope="col">Date</th>
            <th scope="col">Date</th>
            <th scope="col">Date</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
      
      </table>
      <!-- End Table with stripped rows -->

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
 
  

</body>
</html>