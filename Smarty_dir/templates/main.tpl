<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=yes">

        <title>Electronic hub</title>

        <script src="Library/polymer/bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
        <script src="Library/jquery-1.11.3.min.js"></script>
        <script src="Library/url.js"></script>
        <script src="Library/ckeditor/ckeditor.js"></script>
        <link rel="import" href="Library/polymer/bower_components/polymer/polymer.html">

        <!-- Polymer 1.0 library iron-elements -->
        <link rel="import" href="Library/polymer/bower_components/iron-icon/iron-icon.html">
        <link rel="import" href="Library/polymer/bower_components/iron-icons/iron-icons.html">
        <link rel="import" href="Library/polymer/bower_components/iron-selector/iron-selector.html">
        <link rel="import" href="Library/polymer/bower_components/iron-form/iron-form.html">
        <link rel="import" href="Library/polymer/bower_components/iron-flex-layout/iron-flex-layout.html">
        <link rel="import" href="Library/polymer/bower_components/iron-image/iron-image.html">

        <!-- Polymer 1.0 library paper-elements-->
        <link rel="import" href="Library/polymer/bower_components/paper-styles/demo-pages.html">
        <link rel="import" href="Library/polymer/bower_components/paper-button/paper-button.html">
        <link rel="import" href="Library/polymer/bower_components/paper-dialog/paper-dialog.html">
        <link rel="import" href="Library/polymer/bower_components/paper-input/paper-input.html">
        <link rel="import" href="Library/polymer/bower_components/paper-styles/classes/typography.html">
        <link rel="import" href="Library/polymer/bower_components/paper-dialog-scrollable/paper-dialog-scrollable.html">
        <link rel="import" href="Library/polymer/bower_components/paper-menu/paper-menu.html">
        <link rel="import" href="Library/polymer/bower_components/paper-item/paper-icon-item.html">
        <link rel="import" href="Library/polymer/bower_components/paper-icon-button/paper-icon-button.html">
        <link rel="import" href="Library/polymer/bower_components/paper-item/paper-item.html">
        <link rel="import" href="Library/polymer/bower_components/paper-item/paper-item-body.html">
        <link rel="import" href="Library/polymer/bower_components/paper-drawer-panel/paper-drawer-panel.html">
        <link rel="import" href="Library/polymer/bower_components/paper-tabs/paper-tab.html">
        <link rel="import" href="Library/polymer/bower_components/paper-tabs/paper-tabs.html">
        <link rel="import" href="Library/polymer/bower_components/paper-material/paper-material.html">
        <link rel="import" href="Library/polymer/bower_components/paper-input/paper-textarea.html">
        <link rel="import" href="Library/polymer/bower_components/paper-header-panel/paper-header-panel.html">
        <link rel="import" href="Library/polymer/bower_components/paper-scroll-header-panel/paper-scroll-header-panel.html">
        <link rel="import" href="Library/polymer/bower_components/paper-toolbar/paper-toolbar.html">
        <link rel="import" href="Library/polymer/bower_components/paper-icon-button/paper-icon-button.html">

        <!-- Polymer 1.0 library neon-elements-->
        <link rel="import" href="Library/polymer/bower_components/neon-animation/neon-animated-pages.html">
        <link rel="import" href="Library/polymer/bower_components/neon-animation/neon-animatable.html">
        <link rel="import" href="Library/polymer/bower_components/neon-animation/neon-animations.html">

        <!-- Polymer Custom-Element -->
        <link rel="import" href="Smarty_dir/templates/custom_elements/article-card.html">
        <link rel="import" href="Smarty_dir/templates/custom_elements/comment-element.html">
        <link rel="import" href="Smarty_dir/templates/custom_elements/docomment-element.html">

        <!-- Css imports -->
        <link rel="stylesheet" type="css" href="Smarty_dir/templates/css/main.css">
        <link rel="import" href="Smarty_dir/templates/css/polymer_styles.html">

    </head>

    <body class="layout vertical">

        <div id="menu" class="horizontal layout">

            <div class="horizontal layout flex" id="leftMenu">
                <div>
                    <a href="index.php"><iron-icon id="homeIcon" src="Smarty_dir/templates/img/electronic-icons.png"></iron-icon></a>
                </div>

                <div class="horizontal layout flex hvr-underline-reveal">
                    <a class="menulink paddingleft flex" href="index.php?controllerAction=ArticleController&ArticleAction=getArticlesCards">Articoli</a>
                </div>

                <div class="horizontal layout flex hvr-underline-reveal">
                    <a class="menulink paddingleft flex" href="index.php?controllerAction=ProjectController&ProjectAction=getProjectsCards">Progetti</a>
                </div>

                <div class="flex two"></div>
            </div>

            <div id="rigthMenu">
                {if $loggedIn}
                {include 'logged.tpl'}
                {else}
                {include 'notLogged.tpl'}
                {/if}
            </div>

        </div>

        <paper-dialog id="registrationDialog" modal>
            <div id="header"><h2>Form registrazione</h2></div>
            <form id="registrationForm" enctype="multipart/form-data" method="POST" action="index.php?controllerAction=RegistrationController&RegistrationAction=addNewUser">
                <paper-input name="nickname" label="Username" required> </paper-input>
                <paper-input name="email" label="Email" required> </paper-input>
                <paper-input name="password" type="password" label="Password" required> </paper-input>
                <input type="file" name="image">
                <paper-button onclick="clickHandler(event)">Registrati</paper-button>
            </form>
        </paper-dialog>

        <paper-dialog id="loginDialog" modal>
            <div id="header">
                <h2>Loggati</h2>
            </div>
            <form id="loginForm" method="POST" action="index.php?controllerAction=LogController&sessionAction=login">
                <paper-input name="username" label="username" require> </paper-input>
                <paper-input name="password" type="password" label="Password" require> </paper-input>
                <paper-button onclick="clickHandler(event)">Login!</paper-button>
            </form>
        </paper-dialog>

        <div id="containerPage" class="layout vertical">
            {include $templateToDisplay}
        </div>

        <script src="Smarty_dir/templates/javascript/main.js"></script>
    </body>
</html>
