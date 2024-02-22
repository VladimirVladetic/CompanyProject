<?php

require '../libs/Smarty.class.php';
include 'database.php';

$smarty = new Smarty;

session_start();

if($_SESSION['loggedin'] && !(time() > $_SESSION['expire'])){

    $_SESSION['start'] = time(); 
    $_SESSION['expire'] = $_SESSION['start'] + (300); //5 minutes

    $smarty->display('searchUserByID.tpl'); 
}
else{
    session_destroy();
    header("Location: index.php");
}

?>