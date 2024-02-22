<?php
/* Smarty version 4.3.4, created on 2024-01-22 08:10:44
  from 'C:\xampp\htdocs\smarty-4.3.4\smartytest\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ae14f4a801c8_33511934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b2aa90b3c4730d2ba3a82ef44fc6a2c1044e51f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty-4.3.4\\smartytest\\templates\\index.tpl',
      1 => 1705907427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ae14f4a801c8_33511934 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/basic.css">
   
    <title>Login Page</title>
</head>
<body>

    <div class="container">
    
        <img class="logo" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 
        <h1> USER LOGIN </h1>
        <form id="login-form" method="post" action="index.php" class="login-form-container">
            <input id="login-name" type="text" name="name" placeholder="Enter your name."/>
            <input id="login-password" type="password" name="password" placeholder="Enter your password."/>
            <input id="login-button" type="submit" name="loginbtn" value="Login"/>
        </form>

    </div>

</body>
</html><?php }
}
