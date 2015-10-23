<?php /* Smarty version Smarty-3.1.18, created on 2015-10-06 17:52:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashPermissionDenied.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5507262285613edf476e8e3-19679746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '5507262285613edf476e8e3-19679746',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5613edf47a8732_48528219',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5613edf47a8732_48528219')) {function content_5613edf47a8732_48528219($_smarty_tpl) {?><script src="Library/ckeditor/ckeditor.js"></script>

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
