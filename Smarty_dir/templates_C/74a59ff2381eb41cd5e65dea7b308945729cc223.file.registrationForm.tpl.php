<?php /* Smarty version Smarty-3.1.18, created on 2015-10-28 18:45:35
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/registrationForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:569938096560fa38fc6aaf0-44872843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74a59ff2381eb41cd5e65dea7b308945729cc223' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/registrationForm.tpl',
      1 => 1446054331,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '569938096560fa38fc6aaf0-44872843',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560fa38fc90706_93025620',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560fa38fc90706_93025620')) {function content_560fa38fc90706_93025620($_smarty_tpl) {?><!-- Page Content -->
<div class="container" id="registrationContainer">
    <div class="container-page">
        <h3 class="dark-grey">Registrazione</h3>
        <hr>
            <form id="registrationForm" autocomplete="off" novalidate="novalidate">
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label>Nome Utente</label>
        			    <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group col-lg-4 myTooltip" hidden>
                   </div>
               </div>
               <div class="row">
                   <div class="form-group col-lg-5">
                       <label>Password</label>
                       <input type="password" name="password" class="form-control" id="password">
                  </div>
                  <div class="form-group col-lg-4 myTooltip" hidden>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-5">
                      <label>Ripeti Password</label>
                      <input type="password" name="password_confirm" class="form-control" id="password_confirm">
                 </div>
                 <div class="form-group col-lg-4 myTooltip" hidden>
                </div>
             </div>
             <div class="row">
                 <div class="form-group col-lg-5">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group col-lg-4 myTooltip" hidden>
               </div>
            </div>
           <div class="row">
               <div class="form-group col-lg-5">
                   <label>Immagine profilo</label>
                   <input type="file" name="image" id="image">
               </div>
               <div class="form-group col-lg-4 myTooltip" hidden>
              </div>
           </div>
           <button type="submit" class="btn btn-primary" id="registrationButton">Registrati</button>
       </form>
	</div>
    <hr>
    <div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="panel" id="panelRegistrationForm">
                    <div class="panel-heading">
                        <h3 class="panel-title" id="myModalRegistrationTitle"></h3>
                    </div>
                    <div class="panel-body" id="myModalRegistrationBody">
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn" id="buttonRegistraionForm" data-dismiss="modal">Chiudi</button>
                    </div>
            </div>
        </div>
      </div>
    </div>
</div>
<script src="Library/jquery.validate.min.js"></script>
<script src="Library/additional-methods.min.js"></script>
<script src="Smarty_dir/templates/js/registration.js"></script>
<?php }} ?>
