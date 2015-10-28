<?php /* Smarty version Smarty-3.1.18, created on 2015-10-28 15:27:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/logged.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2101812646560f9b548bd4c3-73868903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1fef12379daf47d650a3025a5926980d08ce4e1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/logged.tpl',
      1 => 1446042425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2101812646560f9b548bd4c3-73868903',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560f9b54906405_80670480',
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560f9b54906405_80670480')) {function content_560f9b54906405_80670480($_smarty_tpl) {?><ul class="nav navbar-nav navbar-right">
    <li>
        <a href="index.php?controller=Dashboard&task=getProfilePage"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a>
    </li>
    <li>
        <a href="index.php?controller=UserAccess&task=logout">Logout</a>
    </li>
</ul>
<?php }} ?>
