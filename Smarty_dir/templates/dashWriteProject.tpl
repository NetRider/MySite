<link type="text/css" rel="stylesheet" href="Library/waitMe.css">
<script src="Library/ckeditor/ckeditor.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Scrivi Progetto</h1>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12" id="panelEffect">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tutti i campi sono obbiglatori
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" id="projectForm">
                            <div class="form-group">
                                <label>Titolo</label>
                                <label></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Scrivi un titolo">
                            </div>
                            <div class="form-group">
                                <label>Descrizione</label>
                                <label></label>
                                <input type="text" name="description" id="description" class="form-control" placeholder="Scrivi una descrizione">
                            </div>
                            <div class="form-group">
                                <label>Testo</label>
                                <label></label>
                                <input type="text" name="text" id="editor1">
                            </div>
                            <input type="text" name="userID" value="{$userid}" hidden>
                            <div class="form-group">
                                <label>Immagine Progetto</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label>Dipendenze</label>
                                <select name="idDependencies[]" multiple class="form-control">
                                    {foreach $articles as $article}
                                        <option value="{$article.id}">
                                            {$article.title}
                                        </option>
                                    {/foreach}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default" id="saveProjectButton">Submit Button</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="Library/jquery.validate.min.js"></script>
<script src="Smarty_dir/templates/js/dashWriteProject.js"></script>
<script src="Library/waitMe.js"></script>
