<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "pawsome";
$db_port =3307;

$conn = new mysqli( $db_host, $db_user, $db_password ,$db_name,$db_port);  //
if($conn->connect_error){
    die("failed");
}
else{
//echo"CO";
}
?>