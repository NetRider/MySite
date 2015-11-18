<?php /* Smarty version Smarty-3.1.18, created on 2015-11-14 03:40:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/installationCompleted.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1008429645643ce3ac9da07-34983783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d6192c46016c182a2279e1a3a8cead682339682' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/installationCompleted.tpl',
      1 => 1447468744,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1008429645643ce3ac9da07-34983783',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5643ce3aca1fb8_89574284',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5643ce3aca1fb8_89574284')) {function content_5643ce3aca1fb8_89574284($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title>
		Installazione completata
	</title>
	<link href="Library/bootstrap-3.1.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="Smarty_dir/templates/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container">
		<div class="page-header">
	  		 <div id="nameApp"><h1>ElectronicsHub<small> pagina di installazione</small></h1></div>
		</div>

		<div id="mainContainer" class="col-md-12">

			<div class="mainContent">
				<br><br>
				<div class="alert alert-success"> Installazione completata con successo <span class="glyphicon glyphicon-ok"></span></div>
				<br>
				<p> Dal prossimo accessso potrai utilizzare ElectronicsHub.</p>
				<p> Se vuoi accedere al sito ti basta aggiornare la pagina premendo <kbd>F5</kbd></p>

				<p> Se incontri problemi, controlla che il file <code>./Configuration Files/databaseConfig.php</code> contenga i valori corretti per la connessione al database.
				    Se vuoi ripetere l'installazione cancella <code>./Configuration Files/databaseConfig.php</code>
				</p>
			</div>

	</div>
</body>
</html>
<?php }} ?>
