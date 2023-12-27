<?php
include "connection.php";
session_start();
$output = '';
$name= $_SESSION['uname2'];
$query="SELECT * from teachers where Temail = '$name'";
$rt=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($rt))
  {
    $id = $row['Teacher_id'];
  }
$sql = "SELECT * FROM Teachers where Teacher_id = '$id' ORDER BY T_Name";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
    // Profile page
 
    //edit form
    $output .= '<div  class="row mb-3">';
    $output .= ' <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>';
    $output .= '       <div class="col-md-8 col-lg-9">';
    $output .= '         <img src="./image/'.$row['images'].'"  alt="Profile" id="preview">';
    $output .= '          <div class="pt-2">';
    // $output .= '            <input type="file" value="'.$row["fname"].'">';
     $output .= '            <input type="file"  name="p" id="a" class="btn btn-primary btn-sm" onchange="getImagepreview(event)" >';
    $output .= '             <!-- <input class="form-control" type="file" name="uploadfile" value="" /> -->';
    $output .= '     <span class="btn btn-danger btn-sm" onclick="getremovee()" title="Remove my profile image"><i class="bi bi-trash"></i></span>';

    $output .= '  </div>';
    $output .= '             </div>';
    $output .= '    </div>';
    $output .= '   <div class="row mb-3">';
    $output .= '      <label for="fullname" class="col-md-4 col-lg-3 col-form-label">Full Name</label>';
    $output .= '     <div class="col-md-8 col-lg-9">';
    $output .= '       <input name="fullname" value="'.$row["T_Name"].'" type="text" class="form-control" id="fullName" >';
    $output .= '     </div>';
    $output .= '   </div>';
    $output .= '               <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Age</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Age" value="'.$row["age"].'" type="text" class="form-control" id="company" required>
                      </div>
                    </div>';

   $output .= '          <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" value="'.$row["phone"].'"  type="text" class="form-control" id="Phone" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email"  value="'.$row["Temail"].'"  type="email" class="form-control" id="Email" >
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram"  value="'.$row["instagram1"].'" type="text" class="form-control" id="Instagram" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin"  value="'.$row["facebook1"].'" type="text" class="form-control" id="Linkedin" >
                      </div>
                    </div>
                    

                    <div class="text-center">
                      <button name="editsubmit" type="submit" class="btn btn-primary">Save Changes</button>
                    </div>';
}
// echo $c.value = "kjkjhkj";  
echo $output;
?>