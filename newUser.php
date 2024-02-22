<?php
require '../libs/Smarty.class.php';
include 'database.php';
include 'passwordHidder.class.php';
include 'parameterChecker.class.php';

session_start();

if($_SESSION['loggedin'] && !(time() > $_SESSION['expire'])){

$_SESSION['start'] = time(); 
$_SESSION['expire'] = $_SESSION['start'] + (300); //5 minutes   

$smarty = new Smarty;
$passwordHidder = new PasswordHidder;
$parameterChecker = new ParameterChecker;

$error = false;

// $sql = "delete from user where surname=''";
// mysqli_query($con,$sql);

// if(isset($_POST['userlist'])){
//     header("Location: userList.php");
//     exit;
// }

if((isset($_POST['name']) && $_POST['name'] != "") || (isset($_POST['surname']) && $_POST['surname'] != "") || (isset($_POST['yearofbirth']) && $_POST['yearofbirth'] != "") || (isset($_POST['password']) && $_POST['password'] != "")){

    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $yearofbirth = $_POST['yearofbirth'] ?? '';
    $password = $_POST['password'] ?? '';

    $companyname = $_POST['company'];

    $sql = "select max(id) from user";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $id = ($row[0] + 1) ?? '';

    $role = "user";

    $hiddenPassword = "";

    $error = $parameterChecker->checkParameters($name,$surname,$yearofbirth,$password);

    $sql = "select * from company where name='$companyname'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($result);
    $companyid = $row['id'];

    if(!$error){
        $sql = "insert into user(id,name,surname,yearofbirth,password,role,companyid)values('$id','$name','$surname','$yearofbirth','$password','$role','$companyid')";
        if(mysqli_query($con,$sql)){
            echo "<script>alert('Success!')</script>";
            header("Location: userList.php");
        }else{
            echo "<script>alert('Failure!')</script>";
        }
        // $hiddenPassword = $passwordHidder->hidePassword($password);
        
    }

    // $smarty->assign('id', $id);
    // $smarty->assign('name', $name);
    // $smarty->assign('surname', $surname);
    // $smarty->assign('yearofbirth', $yearofbirth);
    // $smarty->assign('password', $hiddenPassword);
    // $smarty->assign('role',$role);
}

$sql = "select * from company";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_assoc($result)) {
    $companies[] = $row;
}

$smarty->assign('companies',$companies);

mysqli_close($con);

$smarty->display('templates/newUser.tpl');

}
else{
    session_destroy();
    header("Location: index.php");
}
?>