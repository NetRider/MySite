<HTML>
	<HEAD>
		<TITLE>Il blog di Matteo</TITLE>
	</HEAD>

	<BODY>
		<H1>Il mio blog</H1> <br>

        <a href="index.php?controllerAction=RegistrationPage&registrationAction=getRegistrationPage">Registrati</a>
        <a href="index.php?controllerAction=ArticlePage&articleAction=getNewArticlePage">Nuovo Articolo</a>

        <H6>Ultimi 3 articoli caricati recentemente </H6>

        <ul style="list-style-type:square">

            {foreach $homeArticles as $article}
                <li>
                    <a href="index.php?controllerAction=ArticlePage&articleAction=getArticleView&title={$article.title}">{$article.title}</a>
                </li>
            {/foreach}

        </ul>
	</BODY>

</HTML>