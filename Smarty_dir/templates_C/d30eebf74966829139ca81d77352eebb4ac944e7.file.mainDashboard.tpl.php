<?php /* Smarty version Smarty-3.1.18, created on 2015-11-06 11:59:35
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/mainDashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175329291563c881705adc3-22912815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd30eebf74966829139ca81d77352eebb4ac944e7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/MySite/Smarty_dir/templates/mainDashboard.tpl',
      1 => 1445767083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175329291563c881705adc3-22912815',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'getStatisticsPage' => 0,
    'getUsersPage' => 0,
    'getJobsPage' => 0,
    'var' => 0,
    'getProjectWritingPage' => 0,
    'getArticleWritingPage' => 0,
    'dashPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_563c8817075918_52060014',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_563c8817075918_52060014')) {function content_563c8817075918_52060014($_smarty_tpl) {?><div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">Pannello Admin</a>
        </div>

        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="index.php?controller=Dashboard&task=getProfilePage"><i class="fa fa-user fa-fw"></i> Gestione Profilo</a>
                    </li>
                    <?php if (isset($_smarty_tpl->tpl_vars['getStatisticsPage']->value)) {?>
                        <li>
                            <a href="index.php?controller=Dashboard&task=getStatisticsPage"><i class="fa fa-bar-chart fa-fw"></i> Statistiche</a>
                        </li>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['getUsersPage']->value)) {?>
                    <li>
                        <a href="index.php?controller=Dashboard&task=getUsersPage"><i class="fa fa-users fa-fw"></i> Utenti</a>
                    </li>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['getJobsPage']->value)) {?>
                    <li>
                        <a href="index.php?controller=Dashboard&task=getJobsPage"><i class="fa fa-file-text-o fa-fw"></i> Gestisci Lavori</a>
                    </li>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['var']->value)) {?>
                    <li>
                        <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Articoli</a>
                    </li>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['var']->value)) {?>
                    <li>
                        <a href="#"><i class="fa fa-paperclip fa-fw"></i> Progetti</a>
                    </li>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['var']->value)) {?>
                    <li>
                        <a href="#"><i class="fa fa-paperclip fa-fw"></i> I tuoi lavori</a>
                    </li>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['getProjectWritingPage']->value)) {?>
                    <li>
                        <a href="index.php?controller=Dashboard&task=getProjectWritingPage"><i class="fa fa-paperclip fa-fw"></i> Scrivi Progetto</a>
                    </li>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['getArticleWritingPage']->value)) {?>
                    <li>
                        <a href="index.php?controller=Dashboard&task=getArticleWritingPage"><i class="fa fa-paperclip fa-fw"></i> Scrivi Articolo</a>
                    </li>
                    <?php }?>
                    <li>
                        <a href="index.php?controller=Dashboard&task=getUserComments"><i class="fa fa-user fa-fw"></i> I tuoi commenti</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <?php echo $_smarty_tpl->tpl_vars['dashPage']->value;?>

        </div>
    </div>
</div>
<!-- /#wrapper -->
<?php }} ?>
