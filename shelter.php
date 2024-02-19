<?php
include('dbConnection.php');
if(isset($_REQUEST['rSubmit'])){
  if(($_REQUEST['rName'] == "") || ($_REQUEST['lName']) == "" || ($_REQUEST['rEmail']=="") || ($_REQUEST['rCity'] == "") || ($_REQUEST['rState'] == "")){
    $regmsg='<div class="alert alert-warning mt-5 "role="alert">All Fields Are Required</div>';
  }
  else{
    $sql = "SELECT r_email FROM shelter_tb WHERE  r_email='".$_REQUEST['rEmail']."'";
    $result = $conn->query($sql);
        if($result->num_rows == 1){
            $regmsg='<div class="alert alert-success mt-2" role="alert">Email already registered</div>';
        }


        else{
          $rRName=$_REQUEST['rName'];
          $rLName=$_REQUEST['lName'];
          $rEmail=$_REQUEST['rEmail'];
        //   $rSelect=$_REQUEST['rSelect'];
        //   $rButtons=$_REQUEST['inlineRadioOptions'];
          $rCity=$_REQUEST['rCity'];
          $rState=$_REQUEST['rState'];
          $sql = "INSERT INTO shelter_tb(r_rname,r_lname,r_email,r_city,r_state) 
          VALUES ('$rRName','$rLName','$rEmail','$rCity','$rState')";
          if($conn->query($sql) == TRUE){
            $regmsg='<div class="alert alert-success mt-2" role="alert">Registered</div>';
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
    <title>Shelter</title>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a214639f37.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container pt-5">
        <h2 class="text-center">Shelter Strays 🏠</h2>
        <p class="text-center mt-2">help  us find a new home for these strays.</p>
        <div class="row mt-0 mb-2">
            <div class="col-md-6 offset-md-3">
                <form action="" method="POST" class="p-5 rounded">
                    <div class="form-group">
                        <label for="firstName" class="font-weight-bold pl-2">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First name" name="rName" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="lastName" class="font-weight-bold pl-2">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last name" name="lName" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="rEmail" required>
                    </div>
                    <div class="form-group row mt-2">
                        <div class="col">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="City" name="rCity" required>
                        </div>
                        <div class="col">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" placeholder="State" name="rState" required>
                        </div>
                    </div>                   
                    <button type="submit" class="btn btn-primary mt-5 btn-lg btn-block" name="rSubmit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
