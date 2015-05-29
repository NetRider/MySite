<HTML>
	<HEAD>
        <script src="Library/jquery-1.11.3.min.js"></script>
        <script src="Smarty_dir/templates/javascript/registration.js"></script>
        <TITLE>Area Registrazione</TITLE>
	</HEAD>

	<BODY>

        <H1>Registrazione</H1>
        <div id="containerRegistrationStatus">

        </div>
        <div id="containerRegistrationForm">
            <form form enctype="multipart/form-data" id="registrationForm">
                Nickname: 			<input type="text" name="nickname"/> <br>
                Email: 				<input type="text" name="email"/> <br>
                Password:			<input type="password" name="password"> </select>
                <input type="submit" value="Submit" id="submitButton">

            </form>
            <a href="index.php?controllerAction=HomePage">Torna alla home</a>
        </div>
	</BODY>
</HTML>