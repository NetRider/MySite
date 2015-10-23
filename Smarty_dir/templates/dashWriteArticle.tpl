<link type="text/css" rel="stylesheet" href="Library/waitMe.css">
<script src="Library/ckeditor/ckeditor.js"></script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Scrivi Articolo</h1>
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
                        <form role="form" id="articleForm">
                            <div class="form-group">
                                <label>Titolo</label>
                                <label></label>
                                <input type="text" name="title" class="form-control" placeholder="Scrivi un titolo">
                            </div>
                            <div class="form-group">
                                <label>Descrizione</label>
                                <label></label>
                                <input type="text" name="description" class="form-control" placeholder="Scrivi una descrizione">
                            </div>
                            <div class="form-group">
                                <label>Testo</label>
                                <label></label>
                                <input type="text" name="articleText" id="editorArticle">
                            </div>
                            <input type="text" name="userId" value="{$userid}" hidden>
                            <div class="form-group">
                                <label>Immagine Articolo</label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-default" id="saveProjectButton" data-toggle="modal" data-target="#statusArticle">Submit Button</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="Library/jquery.validate.min.js"></script>
<script src="Smarty_dir/templates/js/dashWriteArticle.js"></script>
<script src="Library/waitMe.js"></script>
