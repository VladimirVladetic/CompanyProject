<?php
/* Smarty version 4.3.4, created on 2024-01-22 08:11:23
  from 'C:\xampp\htdocs\smarty-4.3.4\smartytest\templates\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65ae151b1ddef6_61500639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc05fe8a811af4c01ced790290df8e6ccc368723' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty-4.3.4\\smartytest\\templates\\user.tpl',
      1 => 1705907433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65ae151b1ddef6_61500639 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="./js/changeCompany.js" defer><?php echo '</script'; ?>
>
    <title>User page</title>
</head>
<body>

    <div class="container">
    <img class="margins-needed" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 
    <table>
        <?php if ($_smarty_tpl->tpl_vars['sessionrole']->value == "admin") {?>
            <form class="margins-needed" id="update-user-form" method="post" action="http://localhost/smarty-4.3.4/smartytest/user.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" data-user-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
            <tr><td>Name: <input id="info-name" type="text" name="name" placeholder="Enter your name." <?php if ((isset($_smarty_tpl->tpl_vars['name']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php }?>></td></tr>
            <tr><td>Surname: <input id="info-surname" type="text" name="surname" placeholder="Enter your surname."<?php if ((isset($_smarty_tpl->tpl_vars['surname']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
" <?php }?>></td></tr>
            <tr><td>Year of birth: <input id="info-yearofbirth" type="number" name="yearofbirth" placeholder="Enter your year of birth."<?php if ((isset($_smarty_tpl->tpl_vars['yearofbirth']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['yearofbirth']->value;?>
" <?php }?>></td></tr>
            <tr><td>Password: <input id="info-password" type="text" name="password" placeholder="Enter your password."<?php if ((isset($_smarty_tpl->tpl_vars['password']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" <?php }?>></td></tr>
            <tr><td>Company: <?php if ((isset($_smarty_tpl->tpl_vars['companyname']->value))) {?> <?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
 <?php }?></td></tr>
            <tr><td><?php if ((isset($_smarty_tpl->tpl_vars['role']->value))) {?> Role: <?php echo $_smarty_tpl->tpl_vars['role']->value;?>
 <?php }?> </td></tr>
            <tr><td><button id="update-info-button">Update user information</button></td></tr>
            </form>
            <tr><td><button onclick="openChangeCompanyPopup()">Change company</button></td></tr>
        <form class="margins-needed" id="delete-this-user" method="post" action="http://localhost/smarty-4.3.4/smartytest/user.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
            <tr><td><input type='submit' name='deleteuserbtn' value="Delete user"/></td></tr>
        </form>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['sessionrole']->value == "user") {?>
        <tr><td>Name: <?php if ((isset($_smarty_tpl->tpl_vars['name']->value))) {?> <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php }?></td></tr>
        <tr><td>Surname: <?php if ((isset($_smarty_tpl->tpl_vars['surname']->value))) {?> <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
 <?php }?></td></tr>
        <tr><td>Year of birth: <?php if ((isset($_smarty_tpl->tpl_vars['yearofbirth']->value))) {?> <?php echo $_smarty_tpl->tpl_vars['yearofbirth']->value;?>
 <?php }?></td></tr>
        <tr><td>Password: Hidden</td></tr>
        <tr><td>Company: <?php if ((isset($_smarty_tpl->tpl_vars['companyname']->value))) {?> <?php echo $_smarty_tpl->tpl_vars['companyname']->value;?>
 <?php }?></td></tr>
        <tr><td><?php if ((isset($_smarty_tpl->tpl_vars['role']->value))) {?> Role: <?php echo $_smarty_tpl->tpl_vars['role']->value;?>
 <?php }?> </td></tr>
        <?php }?>
            <form class="margins-needed" id="go-to-userlist" method="post" action="userList.php"> 
            <tr><td><input type='submit' name='userlist' value='Go to user list'/></td></tr>
        </form>
    </table>
    </div>

    <div class="overlay" id="overlay"></div>
        <div class="popup-container" id="popup">
            <h2>Change Company</h2>
            <label for="dropdown">Select a company:</label>
            <select id="dropdown">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['companies']->value, 'company');
$_smarty_tpl->tpl_vars['company']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['company']->value) {
$_smarty_tpl->tpl_vars['company']->do_else = false;
?> 
                <option value="<?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['company']->value['name'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
            <button onclick="submitChange()">Submit</button>
            <button onclick="closePopup()">Close</button>
        </div>

</body>
</html><?php }
}
