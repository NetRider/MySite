<?php /* Smarty version Smarty-3.1.18, created on 2015-10-28 17:52:02
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashWriteArticle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14703802185612aa22058266-40195557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e960ad2520dd0fce7084259c2260e6b075388ed' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashWriteArticle.tpl',
      1 => 1446051119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14703802185612aa22058266-40195557',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5612aa2207b853_05640061',
  'variables' => 
  array (
    'userid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5612aa2207b853_05640061')) {function content_5612aa2207b853_05640061($_smarty_tpl) {?><link type="text/css" rel="stylesheet" href="Library/waitMe.css">
<script src="Library/ckeditor/ckeditor.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Scrivi Articolo</h1>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12" id="panelEffect">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tutti i campi sono obbiglatori
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" id="articleForm">
                            <div class="form-group">
                                <label>Titolo</label>
                                <label class="errorLabel"></label>
                                <input type="text" name="title" class="form-control" placeholder="Scrivi un titolo">
                            </div>
                            <div class="form-group">
                                <label>Descrizione</label>
                                <label class="errorLabel"></label>
                                <input type="text" name="description" class="form-control" placeholder="Scrivi una descrizione">
                            </div>
                            <div class="form-group">
                                <label>Testo</label>
                                <label class="errorLabel"></label>
                                <input type="text" name="articleText" id="editorArticle">
                            </div>
                            <input type="text" name="userId" value="<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
" hidden>
                            <div class="form-group">
                                <label>Immagine Articolo</label>
                                <label class="errorLabel"></label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-default" id="saveProjectButton" data-toggle="modal" data-target="#statusArticle">Submit Button</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="Library/jquery.validate.min.js"></script>
<script src="Smarty_dir/templates/js/dashWriteArticle.js"></script>
<script src="Library/waitMe.js"></script>
<?php }} ?>
