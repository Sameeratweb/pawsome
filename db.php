<?php
// $servername="localhost";
// $username="root";
// $password="";
// // $dbname="signup";

// //coonection
// $conn=mysqli_connect($servername,$username,$password);
// if(!$conn){
//     die("NO".mysqli_connect_error());
// }
// else{
//     echo "yes";
// }


$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "signup";
$db_port =3307;

$conn = new mysqli( $db_host, $db_user, $db_password ,$db_name,$db_port);  //
if($conn->connect_error){
    die("failed");
    exit();
}
else{
//echo"CO";
}

?>