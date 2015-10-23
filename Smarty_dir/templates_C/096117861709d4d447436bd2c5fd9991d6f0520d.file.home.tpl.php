<?php /* Smarty version Smarty-3.1.18, created on 2015-10-03 11:46:57
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1289176805560bd46800e608-88880077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '096117861709d4d447436bd2c5fd9991d6f0520d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/home.tpl',
      1 => 1443865614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1289176805560bd46800e608-88880077',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560bd4680453f5_73976621',
  'variables' => 
  array (
    'homeArticles' => 0,
    'homeArticle' => 0,
    'articleCard' => 0,
    'projectArticles' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560bd4680453f5_73976621')) {function content_560bd4680453f5_73976621($_smarty_tpl) {?><!-- Page Content -->
<div class="container">
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="Smarty_dir/templates/img/header_image.jpg" alt="">
                </div>
            </div>
        </div>
    </header>

    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Ultimi Articoli</h3>
        </div>
    </div>

    <!-- Page Features -->
    <div class="row text-center">
        <?php  $_smarty_tpl->tpl_vars['homeArticle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['homeArticle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['homeArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['homeArticle']->key => $_smarty_tpl->tpl_vars['homeArticle']->value) {
$_smarty_tpl->tpl_vars['homeArticle']->_loop = true;
?>
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['homeArticle']->value['image'];?>
" alt="">
                    <div class="caption">
                        <h3><?php echo $_smarty_tpl->tpl_vars['homeArticle']->value['title'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['homeArticle']->value['description'];?>
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

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Ultimi Progetti</h3>
        </div>
    </div>

    <!-- Page Features
    <div class="row text-center">
        <?php  $_smarty_tpl->tpl_vars['projectArticle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['projectArticle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['projectArticle']->key => $_smarty_tpl->tpl_vars['projectArticle']->value) {
$_smarty_tpl->tpl_vars['projectArticle']->_loop = true;
?>
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>-->
</div>
<?php }} ?>
