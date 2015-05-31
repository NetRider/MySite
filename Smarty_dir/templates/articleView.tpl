<HTML>
    <HEAD>
        <TITLE>Il blog di Matteo</TITLE>
    </HEAD>

    <BODY>
        <H1>{$articleTitle}</H1>
        <p>
            {$articleText}
        </p>

        <ul style="list-style-type:square">

            {foreach $comments as $comment}
                <li>
                    <p>{$comment.text}</p>
                </li>
            {/foreach}

        </ul>

        <div id="containerAddComment">
            <form form enctype="multipart/form-data" id="addComment">
                Testo: 			    <input type="text" name="nickname"/> <br>
                <input type="submit" value="Submit" id="submitButton">

            </form>
        </div>
        <a href="index.php?controllerAction=HomePage">Torna alla home</a>

    </BODY>
</HTML>