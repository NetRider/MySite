<div id="wrapper">
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
                    {if isset($getStatisticsPage)}
                        <li>
                            <a href="index.php?controller=Dashboard&task=getStatisticsPage"><i class="fa fa-bar-chart fa-fw"></i> Statistiche</a>
                        </li>
                    {/if}
                    {if isset($getUsersPage)}
                    <li>
                        <a href="index.php?controller=Dashboard&task=getUsersPage"><i class="fa fa-users fa-fw"></i> Utenti</a>
                    </li>
                    {/if}
                    {if isset($getJobsPage)}
                    <li>
                        <a href="index.php?controller=Dashboard&task=getJobsPage"><i class="fa fa-file-text-o fa-fw"></i> Gestisci Lavori</a>
                    </li>
                    {/if}
                    {if isset($var)}
                    <li>
                        <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Articoli</a>
                    </li>
                    {/if}
                    {if isset($var)}
                    <li>
                        <a href="#"><i class="fa fa-paperclip fa-fw"></i> Progetti</a>
                    </li>
                    {/if}
                    {if isset($var)}
                    <li>
                        <a href="#"><i class="fa fa-paperclip fa-fw"></i> I tuoi lavori</a>
                    </li>
                    {/if}
                    {if isset($getProjectWritingPage)}
                    <li>
                        <a href="index.php?controller=Dashboard&task=getProjectWritingPage"><i class="fa fa-paperclip fa-fw"></i> Scrivi Progetto</a>
                    </li>
                    {/if}
                    {if isset($getArticleWritingPage)}
                    <li>
                        <a href="index.php?controller=Dashboard&task=getArticleWritingPage"><i class="fa fa-paperclip fa-fw"></i> Scrivi Articolo</a>
                    </li>
                    {/if}
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
            {$dashPage}
        </div>
    </div>
</div>
<!-- /#wrapper -->
