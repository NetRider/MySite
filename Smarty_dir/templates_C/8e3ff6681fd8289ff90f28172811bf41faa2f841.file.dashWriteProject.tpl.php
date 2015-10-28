<?php /* Smarty version Smarty-3.1.18, created on 2015-10-28 17:52:03
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashWriteProject.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11988246035612adefa81ed8-79851893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e3ff6681fd8289ff90f28172811bf41faa2f841' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashWriteProject.tpl',
      1 => 1446051111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11988246035612adefa81ed8-79851893',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5612adefaa8e92_44860388',
  'variables' => 
  array (
    'userid' => 0,
    'articles' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5612adefaa8e92_44860388')) {function content_5612adefaa8e92_44860388($_smarty_tpl) {?><link type="text/css" rel="stylesheet" href="Library/waitMe.css">
<script src="Library/ckeditor/ckeditor.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Scrivi Progetto</h1>
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
                        <form role="form" id="projectForm">
                            <div class="form-group">
                                <label>Titolo</label>
                                <label class="errorLabel"></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Scrivi un titolo">
                            </div>
                            <div class="form-group">
                                <label>Descrizione</label>
                                <label class="errorLabel"></label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Scrivi una descrizione">
                            </div>
                            <div class="form-group">
                                <label>Testo</label>
                                <label class="errorLabel"></label>
                                <input type="text" name="text" id="editor1">
                            </div>
                            <input type="text" name="userID" value="<?php echo $_smarty_tpl->tpl_vars['userid']->value;?>
" hidden>
                            <div class="form-group">
                                <label>Immagine Progetto</label>
                                <label class="errorLabel"></label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label>Dipendenze</label>
                                <select name="idDependencies[]" multiple class="form-control">
                                    <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>

                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default" id="saveProjectButton">Submit Button</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="Library/jquery.validate.min.js"></script>
<script src="Smarty_dir/templates/js/dashWriteProject.js"></script>
<script src="Library/waitMe.js"></script>
<?php }} ?>
