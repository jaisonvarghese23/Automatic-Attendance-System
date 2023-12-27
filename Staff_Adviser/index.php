<!DOCTYPE html>
<html lang="en">

<head>
 <?php
  session_start(); 
  include "connection.php";
  $uname= $_SESSION['uname2'];
  $query="SELECT * from teachers where Temail = '$uname' AND roles='Staff Adviser'";
  $rt4=mysqli_query($con,$query);
  $rt2=mysqli_query($con,$query);
  $rt3=mysqli_query($con,$query);
  
  if(isset($_POST['submit'])){
  $csem=$_POST['csem'];
  
  while($row = mysqli_fetch_assoc($rt2))
  {
    $id = $row['Teacher_id'];
    
  
  }
  
  $query="UPDATE Student Set current_semester='$csem' where  Teacher_id = '$id' ";
  $result=mysqli_query($con,$query);
  $query="UPDATE teachers Set current_semester='$csem' where  Temail = '$uname' AND roles='Staff Adviser'";
  $result=mysqli_query($con,$query);
  $query="SELECT * from teachers where Temail = '$uname' AND roles='Staff Adviser'";
  $rt=mysqli_query($con,$query);

  }
  //
  $name= $_SESSION['uname2'];
                       $query="SELECT * from teachers where Temail = '$name' AND roles='Staff Adviser'";
                       $rt=mysqli_query($con,$query);
                       while($row = mysqli_fetch_assoc($rt))
                         {
                           $Department = $row['Department'];
                           $cs = $row['current_Semester'];
                           $bt= $row['Batch'];
                           echo $td= $row['Teacher_id'];

                         }
                      //    $query="SELECT * from student where Teacher_id = '$td' ";
                      //  $rt=mysqli_query($con,$query);
                      //  while($row = mysqli_fetch_assoc($rt))
                      //    {
                      //     $ktu= $row['ktu_id'];
                      //    }
                        
                         $query="SELECT count(*) as present_absent_count,present1,
                         case
                           when present1 = 1 then 'present'
                           when present1 = 0 then 'absent' 
                           end as present1 FROM attendance where staff='$td'  GROUP BY present1";
                         
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

$query = " SELECT * FROM teachers  where Temail='$uname' ";
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
          <span>Staff Adviser</span>
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
        <li>
        <a class="nav-link collapsed"  href="manual.php">
          <i class="bi bi-gem"></i><span>Take attendance Manually</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li>
        <a class="nav-link collapsed"  href="editattendance.php">
          <i class="bi bi-gem"></i><span>Edit attendance </span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
      <li>
        <a class="nav-link collapsed"  href="subject _to_teachers.php">
          <i class="bi bi-gem"></i><span>Subject Assign</span><i class="bi bi-chevron-right ms-auto"></i>
        </a>
        <li>
        <a class="nav-link collapsed"  href="your_subject.php">
          <i class="bi bi-gem"></i><span>Your Subject</span><i class="bi bi-chevron-right ms-auto"></i>
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
      <div class="row">

        <!-- right side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Current Semester</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <form action="" method="POST">
                    <div class="ps-3">
                   <?php while($row = mysqli_fetch_assoc($rt4))
    {
    
      
  ?>
  
                      <h6>&nbsp;&nbsp;<input type="number" name="csem" style="border:2px;"value="<?php echo $id = $row['current_Semester']; }?>" class="col-form-label" style="width:1.5cm" min=1 max=8>
                     &nbsp;<input style="Height:1.5cm" type="submit"  name="submit" class="btn btn-primary" value="Update"></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

                <!-- <div class="filter">
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
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Students</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i> 
                    </div>
                    <div class="ps-3">
                      <h6><?php
                      $row = mysqli_fetch_assoc($rt3);
                       {
                        $id=$row['Teacher_id'];
                       }
                      $query = "SELECT count(1) From student where Teacher_id='$id';";
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
<!-- table start -->
<br><br>
        <div class="row">
        <form action="" method="POST">
            <div class="col-12">
            <!-- <label  class="col-form-label">Showing &nbsp;</label> <input type="number" value=10 class="col-form-label" style="width:1.5cm" min=1 max=30><label  class="col-form-label">&nbsp;Entries </label> -->
<span style="float:right"><input type="button" class="btn btn-primary" id="btnExport" value="Download">&nbsp;&nbsp;&nbsp;<label  class="col-form-label">
</div>
</span>
</form>
<br>
<br>
<table id="tblCustomers" class="table-bordered table-striped">
        <thead>
          <tr>
            <!-- <th scope="col">#</th> -->
            <th >Student Name</th>
            <?php

$query = "SELECT count(1) From subject where semester='$cs'";
$c=mysqli_query($con,$query);
$row = mysqli_fetch_array($c);
$x= $row[0];
$j=0;
            $sq="SELECT * FROM subject where semester='$cs' ";
            $rx=mysqli_query($con,$sq);
            while($row=mysqli_fetch_assoc($rx)){
              $sname=$row['Subject_name'];
             
              $names[$j]=$row['Subject_id'];
              $j++;
            ?>
            <th  colspan="3"><?php echo $row['Subject_name']; ?></th>
           
            <?php } ?>
            <tr>
              <tr>
              <th ></th>
              <?php
              for($i=0;$i<$x;$i++){
              ?>
            <th >Total Periods</th>
            <th >Present Periods</th>
            <th >Percentage</th>
            <?php } ?>
            
            
          </tr>
        </thead>
        <tr>
          <?php
    $sql="SELECT * FROM  student where Department='$Department' AND Teacher_id='$id'";
    $sql2=mysqli_query($con,$sql);
    
   
    while($data=mysqli_fetch_assoc($sql2)){
      $ktu=$data['ktu_id'];?>
   
      <td><?php echo $data['fname']; ?></td>
      <?php for($k=0;$k<$j;$k++){
        $idk=$names[$k];
      $yy="SELECT * from subject where Subject_id='$idk'";
      $vv=mysqli_query($con,$yy);
      $data1=mysqli_fetch_assoc($vv);
      $hour=$data1['count_hour'];
      $ss="SELECT count(present1) from attendance where  ktu_id='$ktu' AND Subject_id='$idk'";
      $ww=mysqli_query($con,$ss);
      $row = mysqli_fetch_array($ww);
$cout= $row[0];
if($cout==0 || $hour==0){
  $gg='';
}
else{
  $gg=($cout/$hour)*100 ;


}
    
 ?>
 
 
  <td><?php echo $hour ?></td>
  <td><?php echo $cout ?></td>
  <td><?php echo $gg;echo "%"; ?></td>
  
 
        <?php }  ?>
      </tr>
        <?php  } ?>
        
</table>
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
  <script src="assets/js/main.js"></script>
  <script type="text/javascript" src="\AMP\Principal\assets\js\chart.js"></script>
  <script src="\AMP\Staff_Adviser\assets/js/table2excel.js"></script>
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
      },pieHole:0.3,legend:'none',slices:{1:{color:'#16924E'},0:{color:'#C21B25'}}};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
 
      
  //Attendanc report This Month
  var options2 = {pieHole:0.3,legend:'none',slices:{1:{color:'#16924E'},0:{color:'#C21B25'}}};
  var chart2 = new google.visualization.PieChart(document.getElementById('piechartmonth'));
  chart2.draw(data2, options2);
}





    </script>
      <script src="assets/js/table2excel.js"></script>

    <script  type="text/javascript">
document.getElementById('btnExport').addEventListener('click',function(){

// alert("hxdcd");

  var table2excel = new Table2Excel();
  table2excel.export(document.querySelectorAll("#tblCustomers"));


});


 </script>

</body>

</html>