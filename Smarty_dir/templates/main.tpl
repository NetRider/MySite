<HTML>
    <HEAD>
        <script src="Library/jquery-1.11.3.min.js"></script>
        <TITLE>Blog di matteo</TITLE>
    </HEAD>

    <BODY>

    <H1>Il mio blog</H1> <br>

        <div id="menu">
            <span>pulsante1</span>
            <span>pulsante2</span>
            <span>pulsante3</span>
            {if !$loggedIn}
                {include 'loginForm.tpl'}
            {else}
                {include 'signedIn.tpl'}
            {/if}
        </div>

        <div>
            {include $templateToDisplay}
        </div>

        <div id="containerPage">
        </div>

    </BODY>
</HTML>