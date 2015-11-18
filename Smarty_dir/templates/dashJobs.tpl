<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Lavori</h1>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabella Articoli
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>Maggiori informazioni</h4>
                        <p>Da questa tabella è possibile eliminare gli articoli.</p>
                    </div>

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTablesArticles">
                            <thead>
                                <tr>
                                    <th>Autore</th>
    								<th>Titolo</th>
    								<th>Descrizione</th>
                                </tr>
                            </thead>
                            <tbody id="rowsArticles">
                                {foreach $articles as $article}
                                    <tr value="{$article.id}">
    									<td>{$article.username}</td>
                                        <td>{$article.title}</td>
    									<td>{$article.description}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>

                    <button class="btn btn-danger" id="removeArticleButton">Rimuovi selezionato</button>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabella Progetti
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>Maggiori informazioni</h4>
                        <p>Da questa tabella è possibile eliminare i progetti.</p>
                    </div>

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTablesProjects">
                            <thead>
                                <tr>
                                    <th>Autore</th>
    								<th>Titolo</th>
    								<th>Descrizione</th>
                                </tr>
                            </thead>
                            <tbody id="rowsProjects">
                                {foreach $projects as $project}
                                    <tr value="{$project.id}">
    									<td>{$project.username}</td>
    									<td>{$project.title}</td>
                                        <td>{$project.description}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-danger" id="removeProjectButton">Rimuovi selezionato</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dashJobsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h3 class="panel-title" id="myModalDashJobsTitle">Utente eliminato correttamente</h3>
                </div>
                <div class="modal-body" id="myModalDashJobsBody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="buttonDashJobsForm" data-dismiss="modal">Chiudi</button>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="Library/adminPanel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
<link href="Library/adminPanel/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
<link href="Library/adminPanel/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet">

<script src="Library/adminPanel/bower_components/jquery/dist/jquery.min.js"></script>
<script src="Library/adminPanel/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="Library/adminPanel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script src="Smarty_dir/templates/js/dashJobs.js"></script>
