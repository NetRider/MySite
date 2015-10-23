<!-- Page Content -->
<div class="container">
    <header class="business-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="Smarty_dir/templates/img/header_image.jpg" alt="">
                </div>
            </div>
        </div>
    </header>

    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Ultimi Articoli</h3>
        </div>
    </div>

    <!-- Page Features -->
    <div class="row text-center">
        {foreach $homeArticles as $homeArticle}
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img class="img-responsive" src="{$homeArticle.image}" alt="">
                    <div class="caption">
                        <h3>{$homeArticle.title}</h3>
                        <p>{$homeArticle.description}</p>
                        <p>
                            <a href="index.php?controller=Article&task=getArticleView&Id={$articleCard.id}" class="btn btn-primary">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Ultimi Progetti</h3>
        </div>
    </div>

    <!-- Page Features
    <div class="row text-center">
        {foreach $projectArticles as $projectArticle}
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Feature Label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>-->
</div>
