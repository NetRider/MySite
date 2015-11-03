<?php /* Smarty version Smarty-3.1.18, created on 2015-11-03 17:36:09
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashStatistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17318967456103f42d61ea8-56655066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf3a76df5ffbc4e0e4de3d47cc850ec47860e46a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/dashStatistics.tpl',
      1 => 1446568567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17318967456103f42d61ea8-56655066',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56103f42d8c742_66303855',
  'variables' => 
  array (
    'numComments' => 0,
    'numArticles' => 0,
    'numProjects' => 0,
    'numUsers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56103f42d8c742_66303855')) {function content_56103f42d8c742_66303855($_smarty_tpl) {?><link href="Library/adminPanel/bower_components/morrisjs/morris.css" rel="stylesheet">
<script src="Library/adminPanel/bower_components/raphael/raphael-min.js"></script>
<script src="Library/adminPanel/bower_components/morrisjs/morris.min.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Statistiche</h1>
    </div>
</div>
<div class="row">
    <div class="panel panel-default">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $_smarty_tpl->tpl_vars['numComments']->value;?>
</div>
                            <div>Commenti</div>
                        </div>
                    </div>
                </div>
                <a href="#commentsAnchor">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-file-text-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $_smarty_tpl->tpl_vars['numArticles']->value;?>
</div>
                            <div>Articoli</div>
                        </div>
                    </div>
                </div>
                <a href="#articlesAnchor">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-paperclip fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $_smarty_tpl->tpl_vars['numProjects']->value;?>
</div>
                            <div>Progetti</div>
                        </div>
                    </div>
                </div>
                <a href="#projectsAnchor">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $_smarty_tpl->tpl_vars['numUsers']->value;?>
</div>
                            <div>Utenti</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        </div>
</div>
        <div class="row" id="commentsAnchor">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Grafico Commenti
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div id="commentsChart" style="height: 250px;"></div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        </div>
    </>

        <div class="row" id="articlesAnchor">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Grafico Articoli
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="articlesChart" style="height: 250px;"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>

        <div class="row" id="projectsAnchor">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Grafico Progetti
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div id="projectsChart" style="height: 250px;"></div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </div>


<script src="Smarty_dir/templates/js/dashStatistics.js"></script>
<?php }} ?>
