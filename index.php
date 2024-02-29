<?php
include 'database.php';
include '../libs/Smarty.class.php';

$smarty = new Smarty;

session_start(); 

if(!isset($_SESSION['attempts'])){
    $_SESSION['attempts']=1;
}

// $sql = "delete from user where surname=''";
// mysqli_query($con,$sql);

if(isset($_POST['loginbtn'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    //echo "<script>alert('{$password}')</script>";

    $sql = "select * from user where name='$name'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    //echo "<script>alert('{$row[0]}')</script>";

    if(isset($row) && $row[1] == $name && $row[4] == $password){
        // session_start(); 
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $name;
		$_SESSION['id'] = $row[0];
        $_SESSION['role'] = $row[5];
        $_SESSION['logsent'] = 0;
        $_SESSION['start'] = time(); 
        $_SESSION['expire'] = $_SESSION['start'] + (300); 
        if($_SESSION['loggedin']){
            header("Location: userList.php");
        }
    }
    else{
        $_SESSION['attempts'] += 1;
        echo "<script>alert('Incorrect user information.')</script>";
    }
}

mysqli_close($con);

$smarty->display('templates/index.tpl');
?>