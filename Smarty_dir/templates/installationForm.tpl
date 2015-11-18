<!DOCTYPE html>
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
							{if !empty($errorMessage)}
								<div class="alert alert-danger">{$errorMessage}</div>
							{/if}
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
								{foreach $serverDetails as $key=>$val}
									<th>
										{$key}
									</th>
								{/foreach}
								</thead>

								<tbody>
								<tr>
									<td>
										<b>Server</b>
									</td>
									{foreach $serverDetails as $key=>$val}
										<td>
											{$val}
										</td>
									{/foreach}
								</tr>
								<tr>
									<td>
										<b>ElectrnoicsHub</b>
									</td>
									{foreach $projectDetails as $key=>$val}
										<td>
											{$val}
										</td>
									{/foreach}
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
