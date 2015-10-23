<?php /* Smarty version Smarty-3.1.18, created on 2015-10-10 23:59:52
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articlesCards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1516083543560bd461a78950-33543303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '089f42d1e63e10c167c689607a892b026bdf43cf' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/articlesCards.tpl',
      1 => 1444514378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1516083543560bd461a78950-33543303',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560bd461aa79b1_49983440',
  'variables' => 
  array (
    'articlesCards' => 0,
    'articleCard' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560bd461aa79b1_49983440')) {function content_560bd461aa79b1_49983440($_smarty_tpl) {?><!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista Articoli</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Cards Row -->
    <div class="grid">
        <div class="grid-sizer"></div>
        <?php  $_smarty_tpl->tpl_vars['articleCard'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['articleCard']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articlesCards']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['articleCard']->key => $_smarty_tpl->tpl_vars['articleCard']->value) {
$_smarty_tpl->tpl_vars['articleCard']->_loop = true;
?>
            <div class="grid-item">
                    <div class="thumbnail">
                    <img class="media-object cardImage" src="<?php echo $_smarty_tpl->tpl_vars['articleCard']->value['image'];?>
" alt="">
                    <div class="caption">
                        <h3><?php echo $_smarty_tpl->tpl_vars['articleCard']->value['title'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['articleCard']->value['description'];?>
</p>
                        <p>
                            <a href="index.php?controller=Article&task=getArticleView&Id=<?php echo $_smarty_tpl->tpl_vars['articleCard']->value['id'];?>
" class="btn btn-primary">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <hr>
</div>
<script>
$(document).ready( function() {

  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    gutter: 20,
    percentPosition: true
  });

});
</script>
<?php }} ?>
