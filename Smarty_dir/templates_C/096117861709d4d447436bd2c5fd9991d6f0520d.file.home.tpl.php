<?php /* Smarty version Smarty-3.1.18, created on 2015-05-25 17:22:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82909770654579f78d3dcc7-94155704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '096117861709d4d447436bd2c5fd9991d6f0520d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl',
      1 => 1432567373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82909770654579f78d3dcc7-94155704',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54579f78dafdf9_53140717',
  'variables' => 
  array (
    'art1' => 0,
    'art2' => 0,
    'art3' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54579f78dafdf9_53140717')) {function content_54579f78dafdf9_53140717($_smarty_tpl) {?><HTML>
	<HEAD>
		<TITLE>Il blog di Matteo</TITLE>
	</HEAD>

	<BODY>
		<H1>Il mio blog</H1> <br>

        <a href="index.php?controllerAction=RegistrationPage&registrationAction=getRegistrationPage">Registrati</a>

        <H6>Ultimi 3 articoli caricati recentemente </H6>

        <ul style="list-style-type:square">
            <li><?php echo $_smarty_tpl->tpl_vars['art1']->value;?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['art2']->value;?>
</li>
            <li><?php echo $_smarty_tpl->tpl_vars['art3']->value;?>
</li>

        </ul>
	</BODY>

</HTML><?php }} ?>
