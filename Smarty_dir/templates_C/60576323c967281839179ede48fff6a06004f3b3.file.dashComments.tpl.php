<?php /* Smarty version Smarty-3.1.18, created on 2015-10-20 19:12:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashComments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1483437807562675f1b83ae6-78663328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60576323c967281839179ede48fff6a06004f3b3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashComments.tpl',
      1 => 1445360943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1483437807562675f1b83ae6-78663328',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'articlesComments' => 0,
    'comment' => 0,
    'projectsComments' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_562675f1bb6333_76365373',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562675f1bb6333_76365373')) {function content_562675f1bb6333_76365373($_smarty_tpl) {?><div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Commenti</h1>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabella Commenti agli articoli
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <!-- /.table-responsive -->
                <div class="well">
                    <h4>Maggiori informazioni</h4>
                    <p>Da questa tabella è possibile eliminare i commenti che hai effettuato sugli articoli.</p>
                </div>

                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                        <thead>
                            <tr>
                                <th>Titolo</th>
                            </tr>
                        </thead>
                        <tbody id="rows">
                            <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articlesComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
                                <tr value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
">
                                    <td><?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-danger" id="removeArticlesCommentButton">Rimuovi selezionati</button>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabella Commenti ai progetti
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <!-- /.table-responsive -->
                <div class="well">
                    <h4>Maggiori informazioni</h4>
                    <p>Da questa tabella è possibile eliminare i commenti che hai effettuato sui progetti.</p>
                </div>

                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                        <thead>
                            <tr>
                                <th>Titolo</th>
                            </tr>
                        </thead>
                        <tbody id="rows">
                            <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projectsComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
                                <tr value="<?php echo $_smarty_tpl->tpl_vars['comment']->value['id'];?>
">
                                    <td><?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-danger" id="removeProjectsCommentButton">Rimuovi selezionati</button>
            </div>
        </div>
    </div>
</div>

<link href="Library/adminPanel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link href="Library/adminPanel/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link href="Library/adminPanel/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="Library/adminPanel/bower_components/jquery/dist/jquery.min.js"></script>
<script src="Library/adminPanel/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="Library/adminPanel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script src="Smarty_dir/templates/js/dashUsers.js"></script>
<?php }} ?>
