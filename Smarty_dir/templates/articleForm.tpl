<HTML>
	<HEAD>
        <script src="Library/jquery-1.11.3.min.js"></script>
        <script src="Smarty_dir/templates/javascript/newArticle.js"></script>
		<TITLE>Inserimento articolo</TITLE>
	</HEAD>

	<BODY>

		<H1>Crea l'articolo</H1>

        <div id="containerStatus">
        </div>

        <div id="containerArticleForm">
            <form form enctype="multipart/form-data" id="articleForm">
                Titolo: 			<input type="text" name="title"/> <br>
                Testo: 				<input type="text" name="text"/> <br>
                <input type="submit" value="Submit" id="submitButton">
            </form>
            <a href="index.php?controllerAction=HomePage">Torna alla home</a>
        </div>

	</BODY>
</HTML>