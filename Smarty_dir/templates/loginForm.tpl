<HTML>
    <HEAD>
        <script src="Library/jquery-1.11.3.min.js"></script>

        <TITLE>Effettua il login</TITLE>
    </HEAD>

    <BODY>

        <H1>Login</H1>
        <div id="containerLoginStatus">
        </div>
        <div id="containerLoginForm">
            <form form enctype="multipart/form-data" id="loginForm">
                Nickname: 			<input type="text" name="nickname"/> <br>
                Password:			<input type="password" name="password">
                <input type="submit" value="Submit" id="submitButton">

            </form>
            <a href="index.php?controllerAction=HomePage">Torna alla home</a>
        </div>

    </BODY>
</HTML>