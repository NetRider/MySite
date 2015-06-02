<?php /* Smarty version Smarty-3.1.18, created on 2015-05-31 22:43:36
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:82909770654579f78d3dcc7-94155704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '096117861709d4d447436bd2c5fd9991d6f0520d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl',
      1 => 1433105014,
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
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54579f78dafdf9_53140717')) {function content_54579f78dafdf9_53140717($_smarty_tpl) {?><div>
    <a href="index.php?controllerAction=RegistrationPage&registrationAction=getRegistrationPage">Registrati</a>
    <a href="index.php?controllerAction=ArticlePage&articleAction=getNewArticlePage">Nuovo Articolo</a>

    <H6>Ultimi 3 articoli caricati recentemente </H6>

    <ul style="list-style-type:square">

        <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['homeArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
            <li>
                <a href="index.php?controllerAction=ArticlePage&articleAction=getArticleView&title=<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a>
            </li>
        <?php } ?>

    </ul>

</div>
<?php }} ?>
