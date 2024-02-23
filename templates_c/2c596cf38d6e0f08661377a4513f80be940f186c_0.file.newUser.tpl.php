<?php
/* Smarty version 4.3.4, created on 2024-02-23 08:47:16
  from 'C:\xampp\htdocs\smarty-4.3.4\CompanyProject\templates\newUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65d84d8485a794_44240082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c596cf38d6e0f08661377a4513f80be940f186c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty-4.3.4\\CompanyProject\\templates\\newUser.tpl',
      1 => 1705907442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65d84d8485a794_44240082 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/users.css">
    <title>New user</title>
</head>
<body>

    <div class="container">
    <img class="margins-needed" src="./images/Atos-Symbol.png" alt="Atos logo"  width="200" height="100"> 
    <table>
        <form class="margins-needed" id="insert-user" method="post" action="newUser.php">
            <tr><td><input id="info-name" type="text" name="name" placeholder="Enter your name." <?php if ((isset($_smarty_tpl->tpl_vars['name']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php }?>></td></tr>
            <tr><td><input id="info-surname" type="text" name="surname" placeholder="Enter your surname."<?php if ((isset($_smarty_tpl->tpl_vars['surname']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
" <?php }?>></td></tr>
            <tr><td><input id="info-yearofbirth" type="number" name="yearofbirth" placeholder="Enter your year of birth."<?php if ((isset($_smarty_tpl->tpl_vars['yearofbirth']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['yearofbirth']->value;?>
" <?php }?>></td></tr>
            <tr><td><input id="info-password" type="text" name="password" placeholder="Enter your password."<?php if ((isset($_smarty_tpl->tpl_vars['password']->value))) {?> value="<?php echo $_smarty_tpl->tpl_vars['password']->value;?>
" <?php }?>></td></tr>
            <tr><td>
            <select name="company" id="info-company">
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
            </td></tr>
            <tr><td><button id="enter-info-button">Enter Information</button></td></tr>
        </form>
        <form class="margins-needed" id="go-to-userlist" method="post" action="userList.php"> 
            <tr><td><input type='submit' name='userlist' value='Go to user list'/></td></tr>
        </form>
    </table>
    </div>

</body>
</html><?php }
}
