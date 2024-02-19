<?php
include('dbConnection.php');
if(isset($_REQUEST['rSubmit'])){
  if(($_REQUEST['rName'] == "") || ($_REQUEST['lName']) == "" || ($_REQUEST['rEmail']=="") || ($_REQUEST['rSelect'] == "") || ($_REQUEST['rCity'] == "") || ($_REQUEST['rState'] == "")){
    $regmsg='<div class="alert alert-warning mt-5 "role="alert">All Fields Are Required</div>';
  }
  else{
    $sql = "SELECT r_email FROM volunteer_tb WHERE  r_email='".$_REQUEST['rEmail']."'";
    $result = $conn->query($sql);
        if($result->num_rows == 1){
            $regmsg='<div class="alert alert-success mt-2" role="alert">Email already registered</div>';
        }


        else{
          $rRName=$_REQUEST['rName'];
          $rLName=$_REQUEST['lName'];
          $rEmail=$_REQUEST['rEmail'];
          $rSelect=$_REQUEST['rSelect'];
          $rButtons=$_REQUEST['inlineRadioOptions'];
          $rCity=$_REQUEST['rCity'];
          $rState=$_REQUEST['rState'];
          $sql = "INSERT INTO volunteer_tb(r_rname,r_lname,r_email,r_select,r_gender,r_city,r_state) 
          VALUES ('$rRName','$rLName','$rEmail','$rSelect','$rButtons','$rCity','$rState')";
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
    <title>Volunteer</title>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a214639f37.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="container pt-5">
        <h2 class="text-center">Be a Volunteer </h2>
        <p class="text-center mt-2 pt-2">Be An Member of our Awesome community</p>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
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
               <div class="form-group mt-2">
                

                  <label for="exampleFormControlSelect1">Select Your Role</label>
                  <select class="form-control" id="exampleFormControlSelect1" name="rSelect">
                    <option selected diabled >Open this select menu</option>
                    <option value="government-servant">Government-Employee</option>
                    <option value="private-employee">Private-Employee</option>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                    <option value="buisness">Buisness</option>
                    <option value="other">Other</option>
                    
                  </select>

                

              </div>
              <div name="rButtons">
              <legend class="col-form-label col-sm-2 pt-0 mt-2" >Gender:</legend>
              <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male">
                <label class="form-check-label" for="inlineRadio1">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female">
                <label class="form-check-label" for="inlineRadio2">Female</label>
              </div>
              
</div>
              <div  class="form-group row mt-2">
                        <div class="row">
                        <div class="col">
                         <label>City</label>
                  <input type="text" class="form-control pt-2" id="validationCustom03" placeholder="City" required name="rCity">
                  </div>
                        <div class="col">
                         <label>State</label>
                         <input type="text" class="form-control" id="validationCustom04" placeholder="State" required name="rState">
                         </div>
                      </div></div>                   
              <button type="submit" class="btn btn-primary  mt-5 btn-lg btn-block" name="rSubmit">Submit</button>
                </form>
            </div>
        </div>
    </div>
<script>
  // alert("This  is a test " );
</script>

</body>
</html>

<!--  -->