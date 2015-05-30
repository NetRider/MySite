<HTML>
	<HEAD>
		<TITLE>Il blog di Matteo</TITLE>
	</HEAD>

	<BODY>
		<H1>Il mio blog</H1> <br>

        <a href="index.php?controllerAction=RegistrationPage&registrationAction=getRegistrationPage">Registrati</a>
        <a href="index.php?controllerAction=NewArticlePage&articleAction=getNewArticlePage">Nuovo Articolo</a>

        <H6>Ultimi 3 articoli caricati recentemente </H6>

        <ul style="list-style-type:square">

            {foreach $homeArticles as $article}
                <li>
                    {$article.title}
                </li>
            {/foreach}

        </ul>
	</BODY>

</HTML>