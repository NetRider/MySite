<?php /* Smarty version Smarty-3.1.18, created on 2015-06-22 09:48:39
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articlesCards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143558002055795395f2fbf5-49757772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '089f42d1e63e10c167c689607a892b026bdf43cf' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articlesCards.tpl',
      1 => 1434959315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143558002055795395f2fbf5-49757772',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_55795396049173_88544232',
  'variables' => 
  array (
    'data' => 0,
    'row' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55795396049173_88544232')) {function content_55795396049173_88544232($_smarty_tpl) {?><div class="vertical layout center">
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
" url="controllerAction=ArticleController&ArticleAction=getArticleView">
          </article-card>
          <?php } ?>
        </div>
    <?php } ?>
</div>
<?php }} ?>
