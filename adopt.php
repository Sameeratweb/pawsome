<?php
include('dbConnection.php');
if(isset($_REQUEST['rSubmit'])){
    if(($_REQUEST['rName'] == "") || ($_REQUEST['lName']) == "" || ($_REQUEST['rEmail']=="") || ($_REQUEST['rSelect'] == "") || ($_REQUEST['rCity'] == "") || ($_REQUEST['rState'] == "")){
        $regmsg='<div class="alert alert-warning mt-5 "role="alert">All Fields Are Required</div>';
    }
    else{
        $sql = "SELECT r_email FROM adopt_tb WHERE  r_email='".$_REQUEST[ 'rEmail' ]."'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $regmsg='<div class="alert alert-success mt-2" role="alert">Email already registered</div>';
        }
        else{
            $rRName=$_REQUEST['rName'];
            $rLName=$_REQUEST['lName'];
            $rEmail=$_REQUEST['rEmail'];
            $rSelect=$_REQUEST['rSelect'];
            $rCity=$_REQUEST['rCity'];
          $rState=$_REQUEST['rState'];
          $rCheckbox=$_REQUEST['defaultCheck1'];
          $sql = "INSERT INTO adopt_tb(r_rname,r_lname,r_email,r_select,r_city,r_state,r_checkbox) 
          VALUES ('$rRName','$rLName','$rEmail','$rSelect','$rCity','$rState','$rCheckbox')";
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
    <title>Adopt</title>
    
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a214639f37.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container pt-5">
        <h2 class="text-center mb-6">Adopt an Stray Animal Near You! 🐾❤️</h2>
            <div class="row mt-4 mb-4">
                <div class="col-md-6 offset-md-3">
                    <!-- <h2 class="text-center mb-6">Adopt an Stray Animal Near You! 🐾❤️</h2> -->
                    <form action="" method ="POST" class="p-5 bg-light rounded">
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
                

                        <label for="exampleFormControlSelect1">Select  the Animal you want to Adopt:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="rSelect">
                          <option selected diabled >Select what you want to Adopt</option>
                          <option value="kitten">Kittens😺</option>
                          <option value="Puppies">Puppies🐶</option>
                          <option value="calf">Calf🐮</option>
                          <option value="other">Other</option>
                          
                        </select>
      
                      
      
                    </div>
      
                   
                  <div  class="form-group mt-2">
                            <div class="row">
                            <div class="col">
                             <label>City</label>
                      <input type="text" class="form-control " id="validationCustom03" placeholder="City" required name="rCity">
                      </div>
                            <div class="col">
                             <label>State</label>
                             <input type="text" class="form-control" id="validationCustom04" placeholder="State" required name="rState">
                             </div>
                          </div></div>                   

                          <div class="form-check mt-4">
    <input class="form-check-input" type="checkbox" value="on" name="defaultCheck1">
    <label class="form-check-label" name="defaultCheck1">
        By checking this box, I agree for adoption
    </label>
</div>
                  <button type="submit" class="btn btn-primary  mt-5 btn-lg btn-block" name="rSubmit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>