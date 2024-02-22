<?php

include 'database.php';

session_start();

if($_SESSION['loggedin'] && !(time() > $_SESSION['expire'])){

$_SESSION['start'] = time(); 
$_SESSION['expire'] = $_SESSION['start'] + (300); //5 minutes   

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $companyName = $_POST['companyName'];

    $sql = "select * from company where name='$companyName'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $companyid = $row['id'];

    $sql = "update user set companyid = '$companyid' where id = '$id';";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    echo "success";
}
}
else{
    session_destroy();
    header("Location: index.php");
}

?>