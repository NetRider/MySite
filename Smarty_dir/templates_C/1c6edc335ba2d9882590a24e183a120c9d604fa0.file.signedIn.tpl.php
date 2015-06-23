<?php /* Smarty version Smarty-3.1.18, created on 2015-06-02 14:54:02
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/signedIn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:308814041556d7adba859b6-10092347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c6edc335ba2d9882590a24e183a120c9d604fa0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/signedIn.tpl',
      1 => 1433249622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308814041556d7adba859b6-10092347',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_556d7adbaccb11_63291115',
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_556d7adbaccb11_63291115')) {function content_556d7adbaccb11_63291115($_smarty_tpl) {?><div id="logoutDiv">
    <form id="logoutForm">
        <input type="submit" value="Logout" id="logoutButton">
    </form>
    <span>Ciao <?php echo $_smarty_tpl->tpl_vars['username']->value;?>
 </span>
</div>

<script src="Smarty_dir/templates/javascript/signedIn.js"></script><?php }} ?>
