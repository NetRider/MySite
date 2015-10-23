<?php /* Smarty version Smarty-3.1.18, created on 2015-10-02 14:41:54
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectsCards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1747486721560e75ce8c3f71-73224286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17a7179a7b6e4baa02d7906af3b830d78c1eca48' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectsCards.tpl',
      1 => 1443789707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1747486721560e75ce8c3f71-73224286',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560e75ce8ed373_18455350',
  'variables' => 
  array (
    'projectsCards' => 0,
    'projectCard' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560e75ce8ed373_18455350')) {function content_560e75ce8ed373_18455350($_smarty_tpl) {?><!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista Progetti</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Cards Row -->
    <div class="row text-center masonry-container">
        <?php  $_smarty_tpl->tpl_vars['projectCard'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['projectCard']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectsCards']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['projectCard']->key => $_smarty_tpl->tpl_vars['projectCard']->value) {
$_smarty_tpl->tpl_vars['projectCard']->_loop = true;
?>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img class="media-object cardImage" src="<?php echo $_smarty_tpl->tpl_vars['projectCard']->value['image'];?>
" alt="">
                    <div class="caption">
                        <h3><?php echo $_smarty_tpl->tpl_vars['projectCard']->value['title'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['projectCard']->value['description'];?>
</p>
                        <p>
                            <a href="index.php?controller=Project&task=getProjectView&projectId=<?php echo $_smarty_tpl->tpl_vars['projectCard']->value['id'];?>
" class="btn btn-primary">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <hr>
</div>
<?php }} ?>
