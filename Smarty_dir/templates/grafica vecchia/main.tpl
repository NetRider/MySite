<html>
    <head>

    <body class="layout vertical">

        <div id="menu" class="horizontal layout">

            <div class="horizontal layout flex" id="leftMenu">
                <div>
                    <a href="index.php"><iron-icon id="homeIcon" src="Smarty_dir/templates/img/electronic-icons.png"></iron-icon></a>
                </div>

                <div class="horizontal layout flex hvr-underline-reveal">
                    <a class="menulink paddingleft flex" href="index.php?controller=Article&task=getArticlesCards">Articoli</a>
                </div>

                <div class="horizontal layout flex hvr-underline-reveal">
                    <a class="menulink paddingleft flex" href="index.php?controller=Project&task=getProjectsCards">Progetti</a>
                </div>

                <div class="flex two"></div>
            </div>

            <div id="rigthMenu">
                {$rightMenu}
            </div>

        </div>

        <paper-dialog id="registrationDialog" modal>
            <div id="header"><h2>Form registrazione</h2></div>
            <form id="registrationForm" enctype="multipart/form-data" method="POST" action="index.php?controller=Registration&task=addNewUser">
                <paper-input name="nickname" label="Username" required> </paper-input>
                <paper-input name="email" label="Email" required> </paper-input>
                <paper-input name="password" type="password" label="Password" required> </paper-input>
                <input type="file" name="image">
                <paper-button class="paperButtonConfirm" onclick="clickHandler(event)">Registrati</paper-button>
                <paper-button class="paperButtonAbort" dialog-confirm autofocus>Chiudi</paper-button>
            </form>
        </paper-dialog>

        <paper-dialog id="loginDialog" modal>
            <div id="header">
                <h2>Loggati</h2>
            </div>
            <form id="loginForm" method="post" action="index.php?controller=UserAccess&task=login">
                <paper-input name="username" label="username" required> </paper-input>
                <paper-input name="password" type="password" label="Password" required> </paper-input>
                <paper-button class="paperButtonConfirm" onclick="clickHandler(event)">Login</paper-button>
                <paper-button class="paperButtonAbort" dialog-confirm autofocus>Chiudi</paper-button>
            </form>
        </paper-dialog>

        <div id="containerPage" class="layout vertical">
            {$content}
        </div>

        <script src="Smarty_dir/templates/javascript/main.js"></script>
    </body>
</html>
