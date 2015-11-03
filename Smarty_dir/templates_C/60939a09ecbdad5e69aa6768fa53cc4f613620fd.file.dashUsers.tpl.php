<?php /* Smarty version Smarty-3.1.18, created on 2015-11-03 17:19:37
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashUsers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9312099055610fc68973a36-64714241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60939a09ecbdad5e69aa6768fa53cc4f613620fd' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashUsers.tpl',
      1 => 1446567460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9312099055610fc68973a36-64714241',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5610fc689b8637_09072411',
  'variables' => 
  array (
    'users' => 0,
    'user' => 0,
    'options' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5610fc689b8637_09072411')) {function content_5610fc689b8637_09072411($_smarty_tpl) {?><div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Utenti</h1>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabelle Utenti
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>Maggiori informazioni</h4>
                        <p>Da questa tabella è possibile eliminare gli utenti e cambiare i ruoli di ciascuno.</p>
                    </div>

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Profile Image</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody id="rows">
                                <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
                                    <tr>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['user']->value['profileImage'];?>
</td>
                                        <td value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                                            <select class="form-control" size="1" id="row-1-office" name="row-1-office"  onchange="updateValue(this)">
                                                <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['options']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
                                                    <?php if ($_smarty_tpl->tpl_vars['option']->value['role_name']==$_smarty_tpl->tpl_vars['user']->value['role_name']) {?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
" selected>
                                                            <?php echo $_smarty_tpl->tpl_vars['option']->value['role_name'];?>

                                                        </option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
">
                                                            <?php echo $_smarty_tpl->tpl_vars['option']->value['role_name'];?>

                                                        </option>
                                                    <?php }?>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <button class="btn btn-danger" id="removeButton">Rimuovi selezionati</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dashUsersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="panel-title" id="myModalDashUsersTitle">Utente eliminato correttamente</h3>
                </div>
                <div class="modal-body" id="myModalDashUsersBody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="buttonDashUsersForm" data-dismiss="modal">Chiudi</button>
                </div>
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
