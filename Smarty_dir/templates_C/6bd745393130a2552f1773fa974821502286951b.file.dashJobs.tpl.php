<?php /* Smarty version Smarty-3.1.18, created on 2015-10-26 17:45:44
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashJobs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:738218449562caca6810af0-93659759%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6bd745393130a2552f1773fa974821502286951b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashJobs.tpl',
      1 => 1445877941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '738218449562caca6810af0-93659759',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_562caca685a2a5_45692176',
  'variables' => 
  array (
    'articles' => 0,
    'article' => 0,
    'projects' => 0,
    'project' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562caca685a2a5_45692176')) {function content_562caca685a2a5_45692176($_smarty_tpl) {?><div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Lavori</h1>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabella Articoli
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <!-- /.table-responsive -->
                <div class="well">
                    <h4>Maggiori informazioni</h4>
                    <p>Da questa tabella è possibile eliminare gli articoli.</p>
                </div>

                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTablesArticles">
                        <thead>
                            <tr>
                                <th>Autore</th>
								<th>Titolo</th>
								<th>Descrizione</th>
                            </tr>
                        </thead>
                        <tbody id="rowsArticles">
                            <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                                <tr value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">
									<td><?php echo $_smarty_tpl->tpl_vars['article']->value['username'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['article']->value['description'];?>
</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-danger" id="removeArticleButton">Rimuovi selezionati</button>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabella Progetti
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

                <!-- /.table-responsive -->
                <div class="well">
                    <h4>Maggiori informazioni</h4>
                    <p>Da questa tabella è possibile eliminare i progetti.</p>
                </div>

                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTablesProjects">
                        <thead>
                            <tr>
                                <th>Autore</th>
								<th>Titolo</th>
								<th>Descrizione</th>
                            </tr>
                        </thead>
                        <tbody id="rowsProjects">
                            <?php  $_smarty_tpl->tpl_vars['project'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['project']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['projects']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['project']->key => $_smarty_tpl->tpl_vars['project']->value) {
$_smarty_tpl->tpl_vars['project']->_loop = true;
?>
                                <tr value="<?php echo $_smarty_tpl->tpl_vars['project']->value['id'];?>
">
									<td><?php echo $_smarty_tpl->tpl_vars['project']->value['username'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['project']->value['title'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['project']->value['description'];?>
</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-danger" id="removeProjectButton">Rimuovi selezionati</button>
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

<script src="Smarty_dir/templates/js/dashJobs.js"></script>
<?php }} ?>
