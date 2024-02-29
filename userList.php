<?php
require '../libs/Smarty.class.php';
include 'database.php';

$smarty = new Smarty;

session_start();

if($_SESSION['loggedin'] && !(time() > $_SESSION['expire'])){

$_SESSION['start'] = time(); 
$_SESSION['expire'] = $_SESSION['start'] + (300); //5 minutes
$_SESSION['logsent'] += 1;

// if(isset($_POST['homepagebtn'])){
//     header("Location: index.php");
//     exit;
// }
$sql = "select * from user order by id asc";

$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_assoc($result)) {
    $id[] = $row['id'];
    $data[] = $row;
    }

$sql = "select * from company";

$result = mysqli_query($con,$sql);
    
while($row = mysqli_fetch_assoc($result)) {
    $companydata[] = $row;
    }

$deleteid = array();

if(isset($_POST['deleteusersbtn']) && $_SESSION['role'] == "admin"){
    foreach($id as $i){
        $checkBoxID = "checkbox" . $i;
        //echo $checkBoxID;
        if(isset($_POST[$checkBoxID]) && $_POST[$checkBoxID]=='on'){
            $deleteid[] = $i;
        }
    }
    if($deleteid){
    foreach($deleteid as $i){
        $sql = "delete from user where id=" . $i;
        mysqli_query($con,$sql);
    }}
    else{
        echo "<script>alert('Select some users.')</script>";
    }
    header("Refresh:0");
}

if(isset($_POST['logoutbtn'])){
    session_destroy();
    header("Location: index.php");
}

mysqli_close($con);

$smarty->assign('sessionrole', $_SESSION['role']);
$smarty->assign('logsent', $_SESSION['logsent']);
$smarty->assign('sessionname', $_SESSION['name']);
$smarty->assign('attempts', $_SESSION['attempts']);

$smarty->assign('companydata', $companydata); 
$smarty->assign('data', $data); 
$smarty->display('userList.tpl'); 
}
else{
    session_destroy();
    header("Location: index.php");
}
?>