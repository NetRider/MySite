<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Commenti</h1>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabella Commenti agli articoli
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>Maggiori informazioni</h4>
                        <p>Da questa tabella è possibile eliminare i commenti che hai effettuato sugli articoli.</p>
                    </div>

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTablesCommentsArticles">
                            <thead>
                                <tr>
                                    <th>Titolo</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach $articlesComments as $comment}
                                    <tr value="{$comment.id}">
                                        <td>{$comment.text}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>

                    <button class="btn btn-danger" id="removeArticlesCommentButton">Rimuovi selezionati</button>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabella Commenti ai progetti
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>Maggiori informazioni</h4>
                        <p>Da questa tabella è possibile eliminare i commenti che hai effettuato sui progetti.</p>
                    </div>

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTablesCommentsProjects">
                            <thead>
                                <tr>
                                    <th>Titolo</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach $projectsComments as $comment}
                                    <tr value="{$comment.id}">
                                        <td>{$comment.text}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-danger" id="removeProjectsCommentButton">Rimuovi selezionati</button>
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

<script src="Smarty_dir/templates/js/dashUsers.js"></script>
