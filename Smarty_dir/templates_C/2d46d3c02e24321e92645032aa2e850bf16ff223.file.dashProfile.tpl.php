<?php /* Smarty version Smarty-3.1.18, created on 2015-11-06 11:59:35
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1523663009563c88170304b1-72392566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d46d3c02e24321e92645032aa2e850bf16ff223' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashProfile.tpl',
      1 => 1446300149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1523663009563c88170304b1-72392566',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'userEmail' => 0,
    'userImage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563c88170577a7_31174989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563c88170577a7_31174989')) {function content_563c88170577a7_31174989($_smarty_tpl) {?><div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Profilo</h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Aggiorna il tuo profilo. Digita solo sui campi che vuio modificare e premi Update.
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form id="updateForm" autocomplete="off" novalidate="novalidate">

                    <h3> Informazioni di base </h3>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
">
                        </div>
                        <div class="form-group col-lg-4 myTooltip" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?php echo $_smarty_tpl->tpl_vars['userEmail']->value;?>
">
                        </div>
                        <div class="form-group col-lg-4 myTooltip" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Immagine profilo</label> <br>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['userImage']->value;?>
" class="img-rounded" width="200px" height="150px">
                            <input name="image" id="image" type="file">
                        </div>
                        <div class="form-group col-lg-4 myTooltip" hidden>
                        </div>
                    </div>

                    <h3> Cambia Password </h3>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div>
                        <div class="form-group col-lg-4 myTooltip" hidden>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Repeat Password</label>
                            <input type="password" name="password_confirm" class="form-control" id="password_confirm" value="">
                        </div>
                        <div class="form-group col-lg-4 myTooltip" hidden>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default" id="updateButton">Aggiorna</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dashProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="panel-title" id="myModalDashProfileTitle">Utente eliminato correttamente</h3>
                    </div>
                    <div class="modal-body" id="myModalDashProfileBody">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="buttonDashProfileForm" data-dismiss="modal">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="Library/jquery.validate.min.js"></script>
<script src="Library/additional-methods.min.js"></script>
<script src="Smarty_dir/templates/js/dashProfile.js"></script>
<?php }} ?>
