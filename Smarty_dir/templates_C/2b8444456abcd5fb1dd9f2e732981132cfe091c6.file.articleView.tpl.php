<?php /* Smarty version Smarty-3.1.18, created on 2015-06-18 15:42:52
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articleView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18932422975569e05c94cda9-34437141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b8444456abcd5fb1dd9f2e732981132cfe091c6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articleView.tpl',
      1 => 1434634940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18932422975569e05c94cda9-34437141',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5569e05c96c894_57934317',
  'variables' => 
  array (
    'articleTitle' => 0,
    'articleText' => 0,
    'loggedIn' => 0,
    'userimage' => 0,
    'username' => 0,
    'authorId' => 0,
    'comments' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5569e05c96c894_57934317')) {function content_5569e05c96c894_57934317($_smarty_tpl) {?><div>
    <h1><?php echo $_smarty_tpl->tpl_vars['articleTitle']->value;?>
</h1>
    <p>
        <?php echo $_smarty_tpl->tpl_vars['articleText']->value;?>

    </p>

    <div class="vertical layout flex">
      <?php if ($_smarty_tpl->tpl_vars['loggedIn']->value) {?>
        <docomment-element authorimage="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['userimage']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
" author="<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_tmp2;?>
" authorid="<?php echo $_smarty_tpl->tpl_vars['authorId']->value;?>
"></docomment-element>
      <?php }?>
        <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
            <comment-element authorimage="<?php echo $_smarty_tpl->tpl_vars['comment']->value['image'];?>
" author="<?php echo $_smarty_tpl->tpl_vars['comment']->value['author'];?>
" text="<?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
" authorid="<?php echo $_smarty_tpl->tpl_vars['comment']->value['authorId'];?>
"></comment-element>
        <?php } ?>
    </div>
</div>
<?php }} ?>
