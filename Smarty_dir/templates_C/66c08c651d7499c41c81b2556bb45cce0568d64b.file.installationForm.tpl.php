<?php /* Smarty version Smarty-3.1.18, created on 2015-11-11 23:32:20
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/installationForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3357195875643bb9a64b573-85853512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c08c651d7499c41c81b2556bb45cce0568d64b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/installationForm.tpl',
      1 => 1447281125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3357195875643bb9a64b573-85853512',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5643bb9a6b6434_32668332',
  'variables' => 
  array (
    'errorMessage' => 0,
    'serverDetails' => 0,
    'key' => 0,
    'val' => 0,
    'projectDetails' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5643bb9a6b6434_32668332')) {function content_5643bb9a6b6434_32668332($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title>Installazione ElectronicsHub</title>
		<link href="Library/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<div class="container">
				<div class="page-header">
			  		<div id="nameApp"><h1>ElectronicsHub<small> pagina di installazione</small></h1></div>
				</div>

				<div id="mainContainer" class="col-md-12">
					<div class="mainContent row">
						<div class="col-md-12">
							<br> <br>
							<p class="lead"> Configurazione</p>
							<p> Prima di utilizzare questa applicazione web configura le impostazioni di connessione al database : </p>
						</div>

						<div class="col-md-5">
							<form action="index.php?task=createConfigFile" method="POST">
								<div class="form-group">
							    	<label>User</label>
							    	<input type="text" name="user" class="form-control" placeholder="user del database">
								</div>

								<div class="form-group">
							    	<label>Password</label>
							    	<input type="password" name="password" class="form-control" placeholder="password">
								</div>

								<div class="form-group">
							    	<label>host</label>
							    	<input type="text" name="host" class="form-control" placeholder="es: localhost">
								</div>

								<div class="form-group">
							    	<label>Nome del database (creato in precedenza nel dbms)</label>
							    	<input type="text" name="databaseName" class="form-control" placeholder="es: ElectronicsHub">
								</div>

								<input type="submit" value="Submit">
							</form>
						</div>
					</div>

						<div class="col-md-5">
							<?php if (!empty($_smarty_tpl->tpl_vars['errorMessage']->value)) {?>
								<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['errorMessage']->value;?>
</div>
							<?php }?>
						</div>

						<div class="col-md-12">
							<br> <hr>

							<div class="alert alert-info">
								<p> Di seguito viene riportata una tabella comparativa tra le tecnologie utilizzate in fase di sviluppo di ElectrnoicsHub
								    e quelle trovate sul server su cui si sta installando l'applicazione.</p>
								<p> Se sul server c'&egrave qualche versione molto differente da quelle utilizzate in fase di sviluppo,
								    l'applicazione potrebbe non funzionare correttamente.</p>
							</div>

							<table class="table">
								<thead>
								<th>
								</th>
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['serverDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
									<th>
										<?php echo $_smarty_tpl->tpl_vars['key']->value;?>

									</th>
								<?php } ?>
								</thead>

								<tbody>
								<tr>
									<td>
										<b>Server</b>
									</td>
									<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['serverDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['val']->value;?>

										</td>
									<?php } ?>
								</tr>
								<tr>
									<td>
										<b>ElectrnoicsHub</b>
									</td>
									<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['projectDetails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['val']->value;?>

										</td>
									<?php } ?>
								</tr>
								</tbody>
							</table>
						</div>
					<div>
				</div>
			</div>
		</div>
	</body>
	<script src="Library/jquery-1.11.3.min.js"></script>
	<script src="Library/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

</html>
<?php }} ?>
