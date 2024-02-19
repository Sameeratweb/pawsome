<?php
include('dbConnection.php');
session_start();
if(!isset( $_SESSION['is_login'])){
if(isset($_REQUEST['rEmail'])){


$rEmail = mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
$rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
$sql = "SELECT r_email, r_password FROM requesterlogin_tb WHERE r_email='".$rEmail."' AND r_password= '".$rPassword."' limit 1";
$result = $conn->query($sql);
if($result->num_rows==1){
    $_SESSION['is_login'] = true;
    $_SESSION['rEmail'] = $rEmail;
    echo "<script>location.href='requesterprofile.php';</script>";
    exit;
}
else{
    $msg = '<div class="alert alert-warning mt-2">Enter Valid Email and Password</div>
    ';
}
}}
else{
    echo "<script>location.href='requesterprofile.php'</script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>
</style> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/95092686e4.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="mb-3 mt-5 text-center" style="font-sixe:50px;">
    <!-- <i classs=></i>          paws -->
    <span>Online Services</span></div>
    <p class="text-center" style="font: size 20px;"><i class="fas fa-user-secret"></i>Login</p>
    <div class="container-fluid">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" class="pd-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i> <label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" class="form-control" placeholder="enter your email" name="rEmail">

                    </div >
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
                        <input type="password" class="form-control" placeholder="enter password" name="rPassword">
                    </div>
                    <?php
                    if(isset($msg)){
                        echo $msg;
                    }
                    ?>
                    <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn -block">Login</button>
                </form>
                <div class="mt-2"><a href="index.php">Back to Home</a></div>
            </div>
        </div>
    </div>
</body>
</html>