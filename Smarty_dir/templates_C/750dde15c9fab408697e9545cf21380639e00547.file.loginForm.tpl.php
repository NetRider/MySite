<?php /* Smarty version Smarty-3.1.18, created on 2015-06-03 11:15:35
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/loginForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72006565556b76588bd7a9-66362357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '750dde15c9fab408697e9545cf21380639e00547' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/loginForm.tpl',
      1 => 1433322932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72006565556b76588bd7a9-66362357',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556b76588becb1_70881402',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556b76588becb1_70881402')) {function content_556b76588becb1_70881402($_smarty_tpl) {?><div id="containerLoginForm">
    <form form enctype="multipart/form-data" id="loginForm">
        Nickname: 			<input type="text" name="nickname"/> <br>
        Password:			<input type="password" name="password">
        <input type="submit" value="submit" id="submitLoginButton">
    </form>
</div>

<script src="Smarty_dir/templates/javascript/login.js"></script><?php }} ?>
