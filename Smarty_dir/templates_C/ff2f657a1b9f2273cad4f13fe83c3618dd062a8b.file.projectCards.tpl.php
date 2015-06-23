<?php /* Smarty version Smarty-3.1.18, created on 2015-06-22 09:50:03
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectCards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193500039055869033487ab4-29794868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff2f657a1b9f2273cad4f13fe83c3618dd062a8b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectCards.tpl',
      1 => 1434959400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193500039055869033487ab4-29794868',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_558690334de3b3_00956083',
  'variables' => 
  array (
    'data' => 0,
    'row' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558690334de3b3_00956083')) {function content_558690334de3b3_00956083($_smarty_tpl) {?><div class="vertical layout center">
    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
      <div class="horizontal layout">
        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['row']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
          <article-card title="<?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
" authorimage="<?php echo $_smarty_tpl->tpl_vars['value']->value['image'];?>
" author="<?php echo $_smarty_tpl->tpl_vars['value']->value['author'];?>
" description="<?php echo $_smarty_tpl->tpl_vars['value']->value['description'];?>
" articleId="<?php echo $_smarty_tpl->tpl_vars['value']->value['articleId'];?>
" url="controllerAction=ProjectController&ProjectAction=getProjectView">
          </article-card>
          <?php } ?>
        </div>
    <?php } ?>
</div>
<?php }} ?>
