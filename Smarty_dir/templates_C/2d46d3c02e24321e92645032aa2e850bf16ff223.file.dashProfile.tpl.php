<?php /* Smarty version Smarty-3.1.18, created on 2015-10-11 16:31:31
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171615021456122e0ee47b62-08915641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d46d3c02e24321e92645032aa2e850bf16ff223' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashProfile.tpl',
      1 => 1444573889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171615021456122e0ee47b62-08915641',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56122e0ee6b276_73105837',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56122e0ee6b276_73105837')) {function content_56122e0ee6b276_73105837($_smarty_tpl) {?><div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Profilo</h1>
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
                <form id="updateForm" autocomplete="off" method="" action="" novalidate="novalidate">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Repeat Password</label>
                            <input type="password" name="password_confirm" class="form-control" id="password_confirm" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" id="email" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Immagine profilo</label>
                            <input type="file">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default" disabled id="updateButton">Aggiorna</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="Library/jquery.validate.min.js"></script>
<script src="Smarty_dir/templates/js/dashProfile.js"></script>
<?php }} ?>
