<?php /* Smarty version Smarty-3.1.18, created on 2015-11-10 16:40:25
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectsCards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1943489489563de49ac26f79-45721090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17a7179a7b6e4baa02d7906af3b830d78c1eca48' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/projectsCards.tpl',
      1 => 1447170023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1943489489563de49ac26f79-45721090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563de49ac83793_11316876',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563de49ac83793_11316876')) {function content_563de49ac83793_11316876($_smarty_tpl) {?><!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista Progetti</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Cards Row -->
    <div class="grid text-center" id="mansoryContainer">
        <div class="grid-sizer"></div>
    </div>
        <img style="margin-left:50%;" src="Smarty_dir/templates/img/ajax-loader.gif" id="spinner">
</div>

<script src="Library/masonry.pkgd.min.js"></script>
<script src="Library/handlebars-v4.0.4.js"></script>
<script src="Library/imagesloaded.pkgd.min.js"></script>
<script src="Smarty_dir/templates/js/projectsCards.js"></script>
<?php }} ?>
