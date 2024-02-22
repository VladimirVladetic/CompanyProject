<?php
/* Smarty version 4.3.4, created on 2024-01-22 08:14:30
  from 'C:\xampp\htdocs\smarty-4.3.4\smartytest\templates\searchUserByID.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ae15d6e8acc8_87849482',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d57d9ea4d6435ee1f1ce32e24dc7e93b9e2227a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty-4.3.4\\smartytest\\templates\\searchUserByID.tpl',
      1 => 1705907437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ae15d6e8acc8_87849482 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/users.css">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.4.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./js/spinner.js" defer><?php echo '</script'; ?>
>
    <title>Search User</title>
</head>
<body>
    
    <div class="container">

    <div class="spinner-container">
            <div class="spinner"></div>
    </div>

    <img class="margins-needed" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 

    <input class="margins-needed" type="number" placeholder="Enter ID" id="id-number">
    <input class="margins-needed" id="searchbtn" type="submit" placeholder="Search" onclick="showSpinner()">

    </div>

</body>



</html><?php }
}
