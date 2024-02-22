<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "companydb";
$con = mysqli_connect($servername,$username,
$password,$database);
if(!$con){
    die("Error".mysqli_error($con));
}
else{
    //echo "Connection established";
}
?>