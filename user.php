<?php
require '../libs/Smarty.class.php';
include 'database.php';
include 'passwordHidder.class.php';

session_start();

if($_SESSION['loggedin'] && !(time() > $_SESSION['expire'])){

$_SESSION['start'] = time(); 
$_SESSION['expire'] = $_SESSION['start'] + (300); //5 minutes

$smarty = new Smarty;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from user where id=$id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $surname = $row['surname'];
    $yearofbirth = $row['yearofbirth'];
    $password = $row['password'];
    $role = $row['role'];
    $companyid = $row['companyid'];

    $sql = "select name from company where id=$companyid";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);

    $companyname = $row['name'];

    $sql = "select * from company";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)) {
        $companies[] = $row;
    }

}

if(isset($_POST['deleteuserbtn'])){
    echo "<script>alert({$id})</script>";
    $sql = "delete from user where id=" . $id;
    mysqli_query($con,$sql);
    header("Location: userList.php");
}

if(isset($_POST['name']) || isset($_POST['surname']) || isset($_POST['yearofbirth']) || isset($_POST['password'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $yearofbirth = $_POST['yearofbirth'];
    $password = $_POST['password'];

    $sql = "update user set name = '$name', surname = '$surname', yearofbirth = '$yearofbirth', password = '$password' where id = $id;";
    mysqli_query($con,$sql);
}

mysqli_close($con);

$smarty->assign('id',$id);
$smarty->assign('name',$name);
$smarty->assign('surname',$surname);
$smarty->assign('yearofbirth',$yearofbirth);
$smarty->assign('password',$password);
$smarty->assign('role',$role);
$smarty->assign('companyname',$companyname);
$smarty->assign('sessionrole',$_SESSION['role']);
$smarty->assign('companies',$companies);

$smarty->display('user.tpl'); 
}
else{
    session_destroy();
    header("Location: index.php");
}
?>