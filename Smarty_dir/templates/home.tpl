<div class="vertical layout">

    <div id="banner" class="horizontal layout">
        <iron-image class="flex" sizing="contain" src="Smarty_dir/templates/img/header_image.jpg"></iron-image>
    </div>

    <H5>Ultimi 3 articoli caricati </H5>

    <div class="horizontal layout">
        {foreach $homeArticles as $article}
            <article-card title="prova"></article-card>
        {/foreach}
    </div>
</div>
