 <!DOCTYPE html>
<html lang="en">

<head>
    <?php
     include "connection.php";
    session_start();
     if(isset($_POST['submit'])){
        
        $uname = $_POST['uname2'];
        $pass = $_POST['password2'];
        if(empty($_POST['role'])){
            $_SESSION['status'] = 'please select role';
            $_SESSION['status_code'] = 'error';
            $role="";
        }
            else{
        $role = $_POST['role'];
            }
        if($role === 'Principal'){
            $sq = " SELECT * FROM principal WHERE email1 ='$uname' AND password1 ='$pass'";
            $result=mysqli_query($con,$sq);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             $count = mysqli_num_rows($result);
             if($count==1){
               
                $_SESSION['uname2'] = $uname; 
                $_SESSION['status'] = 'Login Sucessfully';
                $_SESSION['status_code'] = 'success';
                header("Location:\AMP\Principal\index.php"   );
            }
            else{
                $_SESSION['status'] = 'Invalid login Credentials';
                $_SESSION['status_code'] = 'error';
                echo "unsuccess";
            }
        }
        elseif($role === 'HOD'){
            $sq = " SELECT * FROM hod WHERE email1 ='$uname' AND Password1 ='$pass'";
            $result=mysqli_query($con,$sq);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             $count = mysqli_num_rows($result);
             if($count==1){
               
                $_SESSION['uname2'] = $uname; 
                $_SESSION['status'] = 'Login Sucessfully';
                $_SESSION['status_code'] = 'success';
                header("Location:\AMP\HOD\index.php"   );
            }
            else{
                $_SESSION['status'] = 'Invalid login Credentials';
                $_SESSION['status_code'] = 'error';
                echo "unsuccess";

        }
    }
        elseif($role === 'Teacher'){
            $sq = " SELECT * FROM teachers WHERE Temail ='$uname' AND Tpassword ='$pass' AND roles='Staff Adviser'" ;
            $result=mysqli_query($con,$sq);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             $count = mysqli_num_rows($result);
             //
              $sq2 = " SELECT * FROM teachers WHERE Temail ='$uname' AND Tpassword ='$pass' AND roles='Teacher'" ;
            $result3=mysqli_query($con,$sq2);
            $row = mysqli_fetch_array($result3,MYSQLI_ASSOC);
             $countt = mysqli_num_rows($result3);
             if($count==1){
               
                $_SESSION['uname2'] = $uname; 
                $_SESSION['status'] = 'Login Sucessfully';
                $_SESSION['status_code'] = 'success';
                header("Location:\AMP\Staff_Adviser\index.php"   );
            }
            elseif($countt==1){
                $_SESSION['uname2'] = $uname; 
                $_SESSION['status'] = 'Login Sucessfully';
                $_SESSION['status_code'] = 'success';
                header("Location:\AMP\Teacher\index.php"   );

            }
            
            else{
                $_SESSION['status'] = 'Invalid login Credentials';
                $_SESSION['status_code'] = 'error';
                echo "unsuccess";

        }
    }
        elseif($role === 'Student'){
            $sq = " SELECT * FROM student WHERE Email1 ='$uname' AND Password1 ='$pass'";
            $result=mysqli_query($con,$sq);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
             $count = mysqli_num_rows($result);
             if($count==1){
               
                $_SESSION['uname2'] = $uname; 
              header("Location:\AMP\student\index.php"   );
        }
    }
        else{
            echo "bad";
        }
    }
     
    

    ?>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Automatic Attendance System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="\Mainproject\principal\assets\img\details-1.png" rel="icon">

    <!-- Icons font CSS-->
    <!-- <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all"> -->
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
  <div class=" col-12 page-wrapper bg-blue p-t-100 p-b-100 font-robo"  >
        <div class="wrapper wrapper--w680">
            <div class="card card-1 col-12">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
                <div class="card-heading " style=""></div>
                <div class="card-body col-6">
                    <!-- <h2 class="title">Login</h2> -->

                    <form action="" method="POST">
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="role">
                                    <option disabled="disabled" selected="selected">Select Your Role</option>
                                    <option>Principal</option>
                                    <option>HOD</option>
                                    <option>Teacher</option>
                                    <option>Student</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="User name" name="uname2" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Password" name="password2" required>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Login</button>
                        
                                <a href="#" class="txt1">
                                    Forgot Password?
                                </a>
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script src="js/sweet.js"></script>
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
   

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
