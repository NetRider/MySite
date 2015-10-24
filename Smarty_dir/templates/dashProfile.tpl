<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gestione Profilo</h1>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Aggiorna il tuo profilo. Digita solo sui campi che vuio modificare e premi Update.
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form id="updateForm" autocomplete="off" method="" action="" novalidate="novalidate">

                    <h3> Informazioni di base </h3>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="{$username}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Email Address</label>
                            <input type="text" name="email" class="form-control" id="email" value="{$userEmail}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Immagine profilo</label>
                            <img src="{$userImage}" class="img-rounded" width="200px" height="150px">
                            <input name="image" type="file">
                        </div>
                    </div>

                    <h3> Cambia Password </h3>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label>Repeat Password</label>
                            <input type="password" name="password_confirm" class="form-control" id="password_confirm" value="">
                        </div>
                        <div class="form-group col-lg-6">
                            <label></label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-default" id="updateButton">Aggiorna</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="Library/jquery.validate.min.js"></script>
<script src="Smarty_dir/templates/js/dashProfile.js"></script>
