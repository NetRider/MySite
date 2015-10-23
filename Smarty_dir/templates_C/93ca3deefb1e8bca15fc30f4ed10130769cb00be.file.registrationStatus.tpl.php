<?php /* Smarty version Smarty-3.1.18, created on 2015-10-16 13:19:31
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/registrationStatus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17419423805620dcc7e979f0-01834292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ca3deefb1e8bca15fc30f4ed10130769cb00be' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/registrationStatus.tpl',
      1 => 1444994359,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17419423805620dcc7e979f0-01834292',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5620dcc7ed20d9_68184437',
  'variables' => 
  array (
    'status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5620dcc7ed20d9_68184437')) {function content_5620dcc7ed20d9_68184437($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['status']->value) {?>
		<p>Registrazione completata con successo</p>
	<?php } else { ?>
		<p>Qualcosa è andato storto. Non è stato possibile procedere con la registrazione.</p>
<?php }?>
<?php }} ?>
