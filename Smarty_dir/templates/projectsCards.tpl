<!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista Progetti</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Cards Row -->
    <div class="row text-center masonry-container">
        {foreach $projectsCards as $projectCard}
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img class="media-object cardImage" src="{$projectCard.image}" alt="">
                    <div class="caption">
                        <h3>{$projectCard.title}</h3>
                        <p>{$projectCard.description}</p>
                        <p>
                            <a href="index.php?controller=Project&task=getProjectView&projectId={$projectCard.id}" class="btn btn-primary">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
    <hr>
</div>
