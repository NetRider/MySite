<?php /* Smarty version Smarty-3.1.18, created on 2015-06-17 18:05:22
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82909770654579f78d3dcc7-94155704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '096117861709d4d447436bd2c5fd9991d6f0520d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl',
      1 => 1434557116,
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
    'homeArticles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54579f78dafdf9_53140717')) {function content_54579f78dafdf9_53140717($_smarty_tpl) {?><div class="vertical layout">

    <div id="banner" class="horizontal layout">
        <iron-image class="flex" sizing="contain" src="Smarty_dir/templates/img/header_image.jpg"></iron-image>
    </div>

    <H5>Ultimi 3 articoli caricati </H5>

    <div class="horizontal layout">
        <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['homeArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
            <article-card title="prova"></article-card>
        <?php } ?>
    </div>
</div>
<?php }} ?>
