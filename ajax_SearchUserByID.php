<?php

include 'database.php'; 

session_start();

if($_SESSION['loggedin'] && !(time() > $_SESSION['expire'])){

$_SESSION['start'] = time(); 
$_SESSION['expire'] = $_SESSION['start'] + (300); //5 minutes   

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "select * from user where id='$id'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    sleep(2);

    if($row){
        echo "success";
    }
    else{
        echo "Fail";
    }
}
}
else{
    session_destroy();
    header("Location: index.php");
}


?>