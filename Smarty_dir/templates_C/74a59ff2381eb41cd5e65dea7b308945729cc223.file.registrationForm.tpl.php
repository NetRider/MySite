<?php /* Smarty version Smarty-3.1.18, created on 2015-05-31 22:49:39
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/registrationForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7139716035457bd15e696c6-62356685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74a59ff2381eb41cd5e65dea7b308945729cc223' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/registrationForm.tpl',
      1 => 1433105310,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7139716035457bd15e696c6-62356685',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5457bd15e88929_29635686',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5457bd15e88929_29635686')) {function content_5457bd15e88929_29635686($_smarty_tpl) {?><div id="containerRegistrationForm">
    <form form enctype="multipart/form-data" id="registrationForm">
        Nickname: 			<input type="text" name="nickname"/> <br>
        Email: 				<input type="text" name="email"/> <br>
        Password:			<input type="password" name="password">
        <input type="submit" value="Submit" id="submitButton">
    </form>
    <a href="index.php?controllerAction=HomePage">Torna alla home</a>
</div>

<script src="Smarty_dir/templates/javascript/registration.js"></script>
<?php }} ?>
