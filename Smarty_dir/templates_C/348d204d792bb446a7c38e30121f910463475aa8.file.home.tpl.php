<?php /* Smarty version Smarty-3.1.18, created on 2014-08-27 11:13:12
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/blog/Smarty_dir/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152414739953fda088b67f74-79613535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '348d204d792bb446a7c38e30121f910463475aa8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/blog/Smarty_dir/templates/home.tpl',
      1 => 1409130790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152414739953fda088b67f74-79613535',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53fda088b95510_20237514',
  'variables' => 
  array (
    'results' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fda088b95510_20237514')) {function content_53fda088b95510_20237514($_smarty_tpl) {?><HTML>
	<HEAD>
		<TITLE>Il blog di Matteo</TITLE>
	</HEAD>

	<BODY>
		<H1>Il mio blog</H1> <br>
		<a href="registrationForm.html">Registrati</a> <br> <br>
		<table>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['results']->value[0]['title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['results']->value[0]['textArticle'];?>
</td>

			</tr>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['results']->value[1]['title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['results']->value[1]['textArticle'];?>
</td>
				
			</tr>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['results']->value[2]['title'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['results']->value[2]['textArticle'];?>
</td>
				
			</tr>
		</table>

	</BODY>

</HTML><?php }} ?>
