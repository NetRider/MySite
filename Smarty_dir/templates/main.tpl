<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1, user-scalable=yes">

        <title>Electronic hub</title>


        <script src="Library/polymer/bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
        <script src="Library/jquery-1.11.3.min.js"></script>

        <!-- Polymer library -->
        <link rel="import" href="Library/polymer/bower_components/paper-button/paper-button.html">
        <link rel="import" href="Library/polymer/bower_components/iron-image/iron-image.html">
        <link rel="import" href="Library/polymer/bower_components/iron-flex-layout/iron-flex-layout.html">
        <link rel="import" href="Library/polymer/bower_components/iron-icon/iron-icon.html">

        <!-- Polymer Custom-Element -->
        <link rel="import" href="Smarty_dir/templates/custom_elements/login-dialog.html">
        <link rel="import" href="Smarty_dir/templates/custom_elements/signin-dialog.html">
        <link rel="import" href="Smarty_dir/templates/custom_elements/article-card.html">



        <!-- Css imports
        <link rel="stylesheet" type="css" href="Smarty_dir/templates/css/main.css"> -->


    </head>

    <body unresolved class="vertical layout">

      <div id="tabMenu" class="horizontal layout">

        <iron-icon class="big" src="Smarty_dir/templates/img/electronic-icons.png"></iron-icon>

        <div id="rigthMenu" class="horizontal layout flex">
          <paper-button>Articoli</paper-button>
          <paper-button>Progetti</paper-button>
        </div>

        <div id="leftMenu" class="horizontal layout">
          <paper-button id="loginButton">Login</paper-button>
          <paper-button id="signinButton">SignIn</paper-button>
        </div>

      </div>

      <div style="height: 35em;" id="image" class="horizontal layout">
        <iron-image flex src="Smarty_dir/templates/img/header_image.jpg"></iron-image>
      </div>

      <login-dialog id="login" modal role="alertdialog">
      </login-dialog>

      <signin-dialog id="signin" modal role="alertdialog">
      </signin-dialog>

      <div id="containerPage" class="horizontal layout">
        <article-card> </article-card>
        <article-card> </article-card>
        <article-card> </article-card>

      </div>

      <script src="Smarty_dir/templates/javascript/main.js"></script>
    </body>
</html>
