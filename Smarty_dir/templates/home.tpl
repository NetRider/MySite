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

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Ultimi Articoli</h3>
        </div>
    </div>

    <hr>

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
                            <a href="index.php?controller=Article&task=getArticleView&Id={$articleCard.id}" class="btn btn-success stretchButton">Leggi!</a>
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

    <hr>

    <div class="row text-center">
        {foreach $homeProjects as $homeProject}
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img class="img-responsive" src="{$homeProject.image}" alt="">
                    <div class="caption">
                        <h3>{$homeProject.title}</h3>
                        <p>{$homeProject.description}</p>
                        <p>
                            <a href="index.php?controller=Article&task=getProjectView&Id={$homeProject.id}" class="btn btn-success stretchButton">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
</div>
