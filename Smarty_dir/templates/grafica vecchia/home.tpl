<div class="vertical layout">

    <div id="banner" class="horizontal layout">
        <iron-image class="flex" sizing="contain" src="Smarty_dir/templates/img/header_image.jpg"></iron-image>
    </div>

    <H2>Ultimi 3 articoli caricati </H2>

    <div class="horizontal layout">
        {foreach $homeArticles as $homeArticle}
          <article-card title="{$homeArticle.title}" authorimage="{$homeArticle.image}" author="{$homeArticle.author}" description="{$homeArticle.description}" articleId="{$homeArticle.articleId}" url="controllerAction=ArticleController&ArticleAction=getArticleView">
          </article-card>
        {/foreach}
    </div>
</div>
