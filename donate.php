<?php
include('dbConnection.php');
if(isset($_REQUEST['rSubmit'])){
  if(($_REQUEST['rName'] == "") || ($_REQUEST['lName']) == "" || ($_REQUEST['rEmail']=="") || ($_REQUEST['rSelect'] == "") ){
    $regmsg='<div class="alert alert-warning mt-5 "role="alert">All Fields Are Required</div>';
  }
  else{
    $sql = "SELECT r_email FROM donate_tb WHERE  r_email='".$_REQUEST['rEmail']."'";
    $result = $conn->query($sql);
        if($result->num_rows == 1){
            $regmsg='<div class="alert alert-success mt-2" role="alert">Email already registered</div>';
        }


        else{
          $rRName=$_REQUEST['rName'];
          $rLName=$_REQUEST['lName'];
          $rEmail=$_REQUEST['rEmail'];
          $rSelect=$_REQUEST['rSelect'];
          $rCheckbox=$_REQUEST['defaultCheck1'];
          $sql = "INSERT INTO donate_tb(r_rname,r_lname,r_email,r_select,r_checkbox) 
          VALUES ('$rRName','$rLName','$rEmail','$rSelect','$rCheckbox')";
          if($conn->query($sql) == TRUE){
            $regmsg='<div class="alert alert-success mt-2" role="alert">Account Succefully Created</div>';
        }
        else{
          $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to create account</div>';
      }

        }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a214639f37.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
    <div class="container pt-5 ">
        <h2 class="text-center mb-6">Donate to the cause of our community!🫡 </h2>
        <p class="text-center mt-2 pt-2">be an awesome person by  donating pawsome.</p>
            <div class="row mt-0 mb-4">
                <div class="col-md-6 offset-md-3">
                    <!-- <h2 class="text-center mb-6">Adopt an Stray Animal Near You! 🐾❤️</h2> -->
                    <form action="" method ="POST" class="p-5  rounded">
                            <div class="form-group">
                            <i class="fas fa-user"></i>
                            <label for="name" class="font-weight-bold pl-2">Enter Your Name</label>
                            <div class="row">
                                <div class="col">
                                <input type="text" class="form-control" placeholder="First name" name="rName">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control" placeholder="Last name" name="lName">
                                </div>
                              </div>
                        </div>
                        <div class="form-group mt-2">
                            <i class="fas fa-user"></i>
                           <label for="email" class="font-weight-bold pl-2">Email</label>
                           <input type="email" class="form-control"  placeholder="Enter your email"  name="rEmail">
                       </div>
                       <div class="input-group mt-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">₹</span></div>
                          
                          <!-- <i class="fas fa-chevron-down"></i> -->

                            <select class="form-control" id="exampleFormControlSelect1" name="rSelect">
                          
                                
                                <option selected disabled >Open this select menu <i class="fas fa-chevron-down"></i></option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                              <option value="200">200</option>
                              <option value="500">500</option>
                              <option value="1000">1000</option>
                            
                            </select>
                            
                            
                      </div>
                          <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" value="on" id="defaultCheck1" name="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1" name="defaultCheck1">
                                By checking this box, I Would Like to Donate.
                            </label>
                        </div>               
                  <button type="submit" class="btn btn-primary  mt-5 btn-lg btn-block" name="rSubmit">Submit</button>
                    </form>
                </div>
            </div>
</body>
</html>