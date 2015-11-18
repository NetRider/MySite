<?php /* Smarty version Smarty-3.1.18, created on 2015-11-07 19:20:58
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashPermissionDenied.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1353404972563e410a3fec42-39823383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c13ee1cc200d4e48089292eb898203700ad4e820' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashPermissionDenied.tpl',
      1 => 1444146764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1353404972563e410a3fec42-39823383',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563e410a42e538_14892835',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563e410a42e538_14892835')) {function content_563e410a42e538_14892835($_smarty_tpl) {?><script src="Library/ckeditor/ckeditor.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Accesso Negato</h1>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Non sei autorizzato ad accedere a questa pagina!
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-responsive" src="Smarty_dir/templates/img/mrRobot.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1');
</script>
<?php }} ?>
