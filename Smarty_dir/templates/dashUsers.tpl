<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Utenti</h1>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tabelle Utenti
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <!-- /.table-responsive -->
                    <div class="well">
                        <h4>Maggiori informazioni</h4>
                        <p>Da questa tabella è possibile eliminare gli utenti e cambiare i ruoli di ciascuno.</p>
                    </div>

                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-users">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Profile Image</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody id="rows">
                                {foreach $users as $user}
                                    <tr>
                                        <td>{$user.username}</td>
                                        <td>{$user.email}</td>
                                        <td>{$user.profileImage}</td>
                                        <td value="{$user.id}">
                                            <select class="form-control" size="1" id="row-1-office" name="row-1-office"  onchange="updateValue(this)">
                                                {foreach $options as $option}
                                                    {if $option.role_name eq $user.role_name}
                                                        <option value="{$option.id}" selected>
                                                            {$option.role_name}
                                                        </option>
                                                    {else}
                                                        <option value="{$option.id}">
                                                            {$option.role_name}
                                                        </option>
                                                    {/if}
                                                {/foreach}
                                            </select>
                                        </td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>

                    <button class="btn btn-danger" id="removeButton">Rimuovi selezionati</button>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="dashUsersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="panel-title" id="myModalDashUsersTitle">Utente eliminato correttamente</h3>
                </div>
                <div class="modal-body" id="myModalDashUsersBody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" id="buttonDashUsersForm" data-dismiss="modal">Chiudi</button>
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
