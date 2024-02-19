<?php
include('dbConnection.php');
if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'])=="" || $_REQUEST['rPassword'] ==""  ){
        $regmsg='<div class="alert alert-warning mt-5 "role="alert">All Fields Are Required</div>';
    }
    else{
        $sql ="SELECT r_email FROM requesterlogin_tb WHERE r_email = '".$_REQUEST['rEmail']."' ";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $regmsg='<div class="alert alert-success mt-2" role="alert">Email already registered</div>';
        }
        else{
        $rName=$_REQUEST['rName'];
        $rEmail=$_REQUEST['rEmail'];
        $rPassword=$_REQUEST['rPassword'];
        $sql = "INSERT INTO requesterlogin_tb(r_name,r_email,r_password) VALUES ('$rName','$rEmail','$rPassword')";
    if($conn->query($sql) == TRUE){
        $regmsg='<div class="alert alert-success mt-2" role="alert">Account Succefully Created</div>';
    }else{
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
    <title>SignIn</title>
    
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/a214639f37.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container pt-5">
        <h2 class="text-center">Create an Account</h2>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
                <form action="" method ="POST" class="p-5 bg-dark rounded">
                    <div class="form-group">
                         <i class="fas fa-user"></i>
                        <label for="name" class="font-weight-bold pl-2">Name</label>
                        <input type="text" class="form-control"  placeholder="Enter your name"  name="rName">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-user"></i>
                       <label for="email" class="font-weight-bold pl-2">Email</label>
                       <input type="email" class="form-control"  placeholder="Enter your email"  name="rEmail">
                   </div>
                   <div class="form-group">
                    <i class="fas fa-key"></i>
                   <label for="pass" class="font-weight-bold pl-2 ">Password</label>
                   <input type="password" class="form-control"  placeholder="Enter your Password"  name="rPassword">
               </div>
               <button type="submit" class="btn btn-primary  mt-5 btn-lg btn-block" name="rSignup">Submit</button>
               <?php if(isset($regmsg)){echo $regmsg;}?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>