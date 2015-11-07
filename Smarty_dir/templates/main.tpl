<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Electronics Hub</title>

        <!-- Bootstrap Core CSS -->
        <link href="Library/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="Smarty_dir/templates/css/heroic-features.css" rel="stylesheet">
        <link href="Smarty_dir/templates/css/login.css" rel="stylesheet">
        <link href="Smarty_dir/templates/css/3-col-portfolio.css" rel="stylesheet">

        <link href="Library/adminPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
        <link href="Library/adminPanel/dist/css/timeline.css" rel="stylesheet">
        <link href="Library/adminPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Library/adminPanel/dist/css/sb-admin-2.css" rel="stylesheet">

        <script src="Library/jquery-1.11.3.min.js"></script>

        <script src="Library/masonry.pkgd.min.js"></script>


    </head>

    <body>
        <noscript>
            <div style="position: fixed; top: 0px; left: 0px; z-index: 3000;
                height: 100%; width: 100%; background-color: rgba(0,0,0,0.7);" >
                <div style="margin-left:28%; margin-top:10%;">
                    <h1 style="color: #FFFFFF">Attiva Javascript nel tuo browser</h1>
                    <img style="margin-left:15%; margin-top:5%;" src="./Smarty_dir/templates/img/javascript_logo.png">
                </div>
            </div>
        </noscript>
        <div style="position: fixed; top: 0px; left: 0px; z-index: 3000;
            height: 100%; width: 100%; background-color: rgba(0,0,0,0.7);" id="cookie" hidden>
            <div style="margin-left:29%; margin-top:10%; opacity:1.0;">
                <h1 style="color: #FFFFFF">Abilita i cookie nel tuo browser</h1>
                <img style="margin-left:15%; margin-top:5%" src="./Smarty_dir/templates/img/cookie.jpg">
            </div>
        </div>
        <div class="modal fade" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="panel-title">Informativa Utilizzo Cookie</h3>
                        </div>
                        <div class="modal-body">
                            Questo sito utilizza cookie tecnici e di profilazione propri per le sue
                            funzionalità. Chiudendo questo banner all’uso dei cookie.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" id="cookieButton">Chiudi</button>
                        </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Electronics Hub</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php?controller=Article&task=getArticlesCardsPage">Articoli</a>
                        </li>
                        <li>
                            <a href="index.php?controller=Project&task=getProjectsCards">Progetti</a>
                        </li>
                    </ul>
                    <div id="rigthMenu">
                        {$rightMenu}
                    </div>
                </div>
            </div>
        </nav>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Log in</h4>
                    </div>

                    <div class="modal-body">
                        <form role="form" id="loginForm">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="uLogin" placeholder="Login">
                                    <label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="uPassword" placeholder="Password">
                                    <label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
                                </div>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="uRememberMe"> Remember me
                                </label>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="form-control btn btn-primary">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="containerPage">
            {$content}
        </div>

        <hr>
        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <i class="fa fa-laptop fa-3x"> </i>
                        <span class="footer-slogan">ElectronicsHub</span>

                    </div>
                    <div class="col-lg-6 align-right">
                        <p>&copy; 2015. All right are reserved. Created By Matteo Polsinelli.</p>
                        <a href="https://www.facebook.com/matteo.polsinelli1" class="fa fa-facebook fa-2x"></a>
                        <a href="https://github.com/NetRider" class="fa fa-github fa-2x"></a>
                        <a href="mailto:netrider91@gmail.com" class="fa fa-envelope fa-2x"></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap Core JavaScript -->
        <script src="Library/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

        <!-- JavaScript import -->
        <script src="Smarty_dir/templates/js/login.js"></script>
        <script src="Library/adminPanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <script src="Library/adminPanel/dist/js/sb-admin-2.js"></script>
        <script src="Library/jquery.cookie.js"></script>
        <script src="Smarty_dir/templates/js/main.js"></script>
    </body>
</html>
